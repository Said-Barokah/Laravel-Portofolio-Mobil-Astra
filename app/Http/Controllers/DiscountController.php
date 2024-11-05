<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Discount;
use App\Models\VehicleType;
use App\Models\PromoCode;

class DiscountController extends Controller
{
    // Menampilkan daftar semua kendaraan
    public function index()
    {
        $discounts = Discount::paginate(10);
        return view('discount.Index', compact('discounts'));
    }

    // Menampilkan form untuk membuat kendaraan baru
    public function create()
    {
        return view('discount.Create'); // Pass the colors to the view
    }


    // Menyimpan kendaraan baru ke database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|',
            'type' => 'required|string|',
            'amount' => 'required|integer|',
        ]);

        // Temukan kendaraan yang akan diperbarui
        // Perbarui data kendaraan
        Discount::create([
            'name' => $validatedData['name'],
            'type' => $validatedData['type'],
            'amount' => $validatedData['amount'],
        ]);

        return redirect()->route('discount.index')->with('success', 'Diskon berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit kendaraan
    public function edit($id)
    {
        $discount = Discount::findOrFail($id);
        return view('discount.Edit', compact(['discount']));
    }

    // Memperbarui data kendaraan
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|',
            'type' => 'required|string|',
            'amount' => 'required|integer|',
        ]);

        // Temukan kendaraan yang akan diperbarui
        $discount = Discount::findOrFail($id);
        // Perbarui data kendaraan
        $discount->update([
            'name' => $validatedData['name'],
            'type' => $validatedData['type'],
            'amount' => $validatedData['amount'],
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('discount.index')->with('success', 'Discount berhasil diperbarui.');
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
