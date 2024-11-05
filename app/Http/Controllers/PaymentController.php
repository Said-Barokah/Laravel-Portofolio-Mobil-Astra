<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Booking;
use App\Models\PromoCode;
use App\Models\Admin;
use App\Models\PaymentMethod;
use App\Models\ServiceAdvisor; // Model SA diubah menjadi ServiceAdvisor
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    // Menampilkan daftar semua pembayaran
    public function index()

    {

        $payments = Payment::with(['admin', 'serviceAdvisor', 'sales', 'booking', 'promoCode','paymentMethod'])->paginate(10);

        return view('payment.index', compact('payments'));
    }

    // Menampilkan form untuk membuat pembayaran baru
    public function create()
    {
        $serviceAdvisors = ServiceAdvisor::all();
        $sales = Sales::all();
        $promoCodes = PromoCode::where('start_date', '<=', now())
                                ->where('end_date', '>=', now())
                                ->get();

        $bookings = Booking::where('status', 'confirmed')->get();
        $paymentMethodes = PaymentMethod::all();

        return view('payment.create', compact(
            'serviceAdvisors',
            'sales',
            'bookings',
            'promoCodes',
            'paymentMethodes'
        ));
    }

    // Menyimpan data pembayaran baru
    public function store(Request $request)
    {


        // Ambil booking yang dipilih
        $booking = Booking::with('vehicleDetail.vehicle')->findOrFail($request->booking_id);

        // Dapatkan harga kendaraan dari booking
        $bookingPrice = $booking->vehicleDetail->vehicleColor->vehicle->price;

        // Hitung total_payment berdasarkan promo jika ada
        $totalPayment = $bookingPrice;

        // Cek jika ada promo yang dipilih
        if ($request->filled('promo_code_id')) {
            $promoCode = PromoCode::with('discount')->findOrFail($request->promo_code_id);


            // Cek dan terapkan diskon berdasarkan tipe promo (Nominal atau Persentase)
            if ($promoCode->discount->type === 'Nominal') {
                $totalPayment -= $promoCode->discount->amount;
            } elseif ($promoCode->discount->type === 'Persentase') {
                $totalPayment -= ($bookingPrice * $promoCode->discount->amount / 100);
            }
        }

        // Pastikan total_payment tidak negatif
        $totalPayment = max(0, $totalPayment);


        // Gabungkan data pembayaran termasuk admin_id dan total_payment yang dihitung ulang
        // Simpan pembayaran
        Payment::create([
            'service_advisor_id' => intval($request->service_advisor_id),  // Konversi ke integer
            'sales_id' => intval($request->sales_id),                      // Konversi ke integer
            'booking_id' => intval($request->booking_id),                  // Konversi ke integer
            'promo_code_id' => $request->promo_code_id ? intval($request->promo_code_id) : null,        // Konversi ke integer
            'total_payment' => intval($totalPayment),            // Konversi ke integer
            'status' => $request->status,                                  // String tetap string
            'admin_id' => Auth::id(),                                      // Pastikan ini sudah integer
            'payment_method_id' => $request->payment_method_id,                  // String tetap string
        ]);



        return redirect()->route('payment.index')->with('success', 'Pembayaran berhasil ditambahkan.');


    }

    // Menampilkan detail pembayaran tertentu
    public function show($id)
    {
        $payment = Payment::with(['admin', 'serviceAdvisor', 'sales', 'booking', 'promoCode'])->findOrFail($id);
        return view('payments.show', compact('payment'));
    }

    // Menampilkan form untuk mengedit pembayaran
    public function edit($id)
    {

        $payment = Payment::findOrFail($id);  // Ambil data berdasarkan ID
        $serviceAdvisors = ServiceAdvisor::all();
        $sales = Sales::all();
        $bookings = Booking::where('status', 'confirmed')->get();


        $promoCodes = PromoCode::with('discount')->get();
        $paymentMethods = PaymentMethod::all();
        return view('payment.edit', compact('payment', 'serviceAdvisors', 'sales', 'bookings', 'promoCodes', 'paymentMethods'));


    }

    // Mengupdate pembayaran di database
    public function update(Request $request, $id)
    {


        // Ambil data pembayaran berdasarkan ID
        $payment = Payment::findOrFail($id);

        // Ambil booking terkait untuk mendapatkan harga kendaraan
        $booking = Booking::with('vehicleDetail.vehicle')->findOrFail($request->booking_id);
        $bookingPrice = $booking->vehicleDetail->vehicleColor->vehicle->price;

        // Mulai menghitung total payment berdasarkan harga kendaraan
        $totalPayment = $bookingPrice;

        // Jika ada promo, terapkan diskon
        if ($request->filled('promo_code_id')) {
            $promoCode = PromoCode::with('discount')->findOrFail($request->promo_code_id);

            // Cek dan terapkan diskon berdasarkan tipe promo (Nominal atau Persentase)
            if ($promoCode->discount->type === 'Nominal') {
                $totalPayment -= $promoCode->discount->amount;
            } elseif ($promoCode->discount->type === 'Persentase') {
                $totalPayment -= ($bookingPrice * $promoCode->discount->amount / 100);
            }
        }

        // Pastikan total_payment tidak negatif
        $totalPayment = max(0, $totalPayment);

        // Update pembayaran dengan data baru
        $payment->update([
            'service_advisor_id' => intval($request->service_advisor_id),  // Konversi ke integer
            'sales_id' => intval($request->sales_id),                      // Konversi ke integer
            'booking_id' => intval($request->booking_id),                  // Konversi ke integer
            'promo_code_id' => $request->promo_code_id ? intval($request->promo_code_id) : null,  // Konversi ke integer
            'total_payment' => intval($totalPayment),                      // Konversi ke integer
            'status' => $request->status,                                  // String tetap string
            'admin_id' =>  Auth::id(),                    // Konversi ke integer
            'payment_method_id' => $request->payment_method_id,            // String tetap string
                               // Tanggal tetap sama
        ]);

        // Redirect setelah update berhasil
        return redirect()->route('payment.index')->with('success', 'Pembayaran berhasil diperbarui.');
    }


    // Menghapus pembayaran dari database
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil dihapus.');
    }
}
