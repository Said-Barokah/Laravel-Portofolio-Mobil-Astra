<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\VehicleDetail;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Menampilkan daftar booking
    public function index()
    {
        $bookings = Booking::with('customer', 'vehicleDetail')->paginate(10);
        return view('booking.index', compact('bookings'));
    }

    // Menampilkan form untuk menambah booking baru
    public function create()
    {
        // Jika ada data relasi lain seperti customer atau vehicle_detail yang dibutuhkan, dapat dimuat di sini
        $customers = Customer::all();
        $vehicleDetails = VehicleDetail::all();
        return view('booking.create', compact('customers', 'vehicleDetails'));

    }

    // Menyimpan booking baru ke database
    public function store(Request $request)
    {

        Booking::create([
            'customer_id' => $request->customer_id,
            'vehichel_detail_id' => $request->vehicle_detail_id,
            'status' => $request->status,
        ]);

        return redirect()->route('booking.index')->with('success', 'Booking berhasil ditambahkan.');
    }

    // Menampilkan detail booking
    public function show(Booking $booking)
    {
        return view('booking.show', compact('booking'));
    }

    // Menampilkan form edit booking
    public function edit($id)
    {
        // Ambil data booking berdasarkan id
        $booking = Booking::where('id', $id)->firstOrFail();

        // Ambil daftar customers dan vehicleDetails
        $customers = Customer::all();
        $vehicleDetails = VehicleDetail::with('Vehicle')->get();

        return view('booking.edit', compact('booking', 'customers', 'vehicleDetails'));
    }




    // Memperbarui data booking yang ada di database
    public function update(Request $request, $id)
    {

        $booking = Booking::where('id', $id)->firstOrFail();

        // Update data booking
        $booking->customer_id = $request->input('customer_id');
        $booking->vehicle_detail_id = $request->input('vehicle_detail_id');
        $booking->status = $request->input('status');

        // Simpan perubahan
        $booking->save();

        // Redirect ke halaman yang sesuai setelah update berhasil, misalnya halaman list booking
        return redirect()->route('booking.index')->with('success', 'Booking berhasil diperbarui.');
    }

    // Menghapus booking dari database
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('booking.index')->with('success', 'Booking berhasil dihapus.');
    }
}
