<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\VehicleType;

class VehicleController extends Controller
{
    // Menampilkan daftar semua kendaraan
    public function index()
    {
        $vehicles = Vehicle::with(['colors'])->paginate(10);
        return view('vehicles.Index', compact('vehicles'));
    }

    // Menampilkan form untuk membuat kendaraan baru
    public function create()
    {
        $colors = Color::all();
        $vehicleTypes = VehicleType::all(); // Fetch all colors from the 'colors' table
        return view('vehicles.create', compact(['colors','vehicleTypes'])); // Pass the colors to the view
    }


    // Menyimpan kendaraan baru ke database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            // 'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type_id' => 'required|exists:vehicle_types,id',
            'transmission' => 'nullable|string|max:100',
            'machine_type' => 'nullable|string|max:100',
            'displacement' => 'nullable|string|max:100',
            'max_torque' => 'nullable|string|max:100',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            if ($photo->isValid()) {
                $photoPath = $photo->store('models', 'public');
            } else {
                return back()->withErrors(['photo' => 'Foto tidak valid, silakan coba lagi.']);
            }
        }

        Vehicle::create([
            'name' => $validatedData['name'],
            'stock' => $validatedData['stock'],
            'price' => $validatedData['price'],
            'type_id' => $validatedData['type_id'],
            'photo' => $photoPath,
            'transmission' => $validatedData['transmission'],
            'machine_type' => $validatedData['machine_type'],
            'displacement' => $validatedData['displacement'],
            'max_torque' => $validatedData['max_torque'],
        ]);

        return redirect()->route('vehicle.index')->with('success', 'Kendaraan berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit kendaraan
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $colors = Color::all();
        $vehicleTypes = VehicleType::all();
        return view('vehicles.Edit', compact(['vehicle','vehicleTypes','colors']));
    }

    // Memperbarui data kendaraan
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            // 'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type_id' => 'required|exists:vehicle_types,id',
            'transmission' => 'nullable|string|max:100',
            'machine_type' => 'nullable|string|max:100',
            'displacement' => 'nullable|string|max:100',
            'max_torque' => 'nullable|string|max:100',
        ]);

        // Temukan kendaraan yang akan diperbarui
        $vehicle = Vehicle::findOrFail($id);

        // Menangani file foto jika ada
        $photoPath = $vehicle->photo; // Path foto yang sudah ada jika tidak ada file baru
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            // Hapus foto lama jika ada
            if ($photoPath && file_exists(storage_path('app/public/models/' . $photoPath))) {
                unlink(storage_path('app/public/models/' . $photoPath));
            }
            // Simpan file baru
            $photoPath = $photo->store('models', 'public');
        }

        // Perbarui data kendaraan
        $vehicle->update([
            'name' => $validatedData['name'],
            'stock' => $validatedData['stock'],
            'price' => $validatedData['price'],
            'type_id' => $validatedData['type_id'],
            'photo' => $photoPath, // Simpan path foto
            'transmission' => $validatedData['transmission'],
            'machine_type' => $validatedData['machine_type'],
            'displacement' => $validatedData['displacement'],
            'max_torque' => $validatedData['max_torque'],
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('vehicle.index')->with('success', 'Kendaraan berhasil diperbarui.');
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
