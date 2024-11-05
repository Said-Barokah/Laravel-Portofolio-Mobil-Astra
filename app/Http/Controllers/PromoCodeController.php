<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Discount;
use App\Models\VehicleType;
use App\Models\PromoCode;

class PromoCodeController extends Controller
{
    // Menampilkan daftar semua kendaraan
    public function index()
    {
        $promoCodes = PromoCode::with(relations: ['discount'])->paginate(10);
        return view('promo.Index', compact('promoCodes'));
    }

    // Menampilkan form untuk membuat kendaraan baru
    public function create()
    {
        $discounts = Discount::all(); // Fetch all colors from the 'colors' table
        return view('promo.Create', compact(var_name: 'discounts')); // Pass the colors to the view
    }


    // Menyimpan kendaraan baru ke database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'discount_id' => 'required|integer|',
            'promo_code' => 'required|string|max:30',
            'start_date' => 'required|date|',
            'end_date' => 'required|date|',
        ]);

        // Temukan kendaraan yang akan diperbarui
        // Perbarui data kendaraan
        PromoCode::create([
            'discount_id' => $validatedData['discount_id'],
            'promo_code' => $validatedData['promo_code'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
        ]);

        return redirect()->route('promoCode.index')->with('success', 'Promo berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit kendaraan
    public function edit($id)
    {
        $promoCode = PromoCode::findOrFail($id);
        $discounts = Discount::all();
        return view('promo.Edit', compact(['promoCode','discounts']));
    }

    // Memperbarui data kendaraan
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'discount_id' => 'required|integer|',
            'promo_code' => 'required|string|max:30',
            'start_date' => 'required|date|',
            'end_date' => 'required|date|',
        ]);

        // Temukan kendaraan yang akan diperbarui
        $promoCode = PromoCode::findOrFail($id);
        // Perbarui data kendaraan
        $promoCode->update([
            'discount_id' => $validatedData['discount_id'],
            'promo_code' => $validatedData['promo_code'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('promoCode.index')->with('success', 'Promo Kode berhasil diperbarui.');
    }

    // Menghapus kendaraan dari database
    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return redirect()->route('vehicle.index')->with('success', 'Kendaraan berhasil dihapus.');
    }

    // Menampilkan detail kendaraan berdasarkan ID
    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.show', compact('vehicle'));
    }
}
