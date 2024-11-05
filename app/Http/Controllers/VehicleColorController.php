<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\VehicleColor;
use Illuminate\Http\RedirectResponse;
use App\Models\Vehicle;
use App\Models\Color;



class VehicleColorController extends Controller
{
    public function index(){
        $vehicleColors = VehicleColor::paginate(10);
        return view('vehicleColor.index', compact('vehicleColors'));
    }

    public function create(){
        $vehicles = Vehicle::all();
        $colors = Color::all();
        return view('vehicleColor.create', compact('vehicles','colors'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'vehicle_id' => 'required|integer|max:11',
            'color_id' => 'required|integer|max:11',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            if ($photo->isValid()) {
                $photoPath = $photo->store('vehicle', 'public');
            } else {
                return back()->withErrors(['photo' => 'Foto tidak valid, silakan coba lagi.']);
            }
        }

        VehicleColor::create([
            'vehicle_id' => $validatedData['vehicle_id'],
            'color_id' => $validatedData['color_id'],
            'photo' => $photoPath,
        ]);

        return redirect()->route('vehicleColor.index')->with('success', 'Kendaraan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Ambil data customer berdasarkan ID
        $vehicleColor = vehicleColor::findOrFail($id);
        $vehicles = Vehicle::all();
        $colors = Color::all();

        // Tampilkan form edit dan kirim data customer ke view
        return view('vehicleColor.edit', compact('vehicleColor','vehicles','colors'));
    }

    /**
     * Memperbarui data customer di database.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'vehicle_id' => 'required|integer|max:11',
            'color_id' => 'required|integer|max:11',
        ]);

        // Ambil data customer berdasarkan ID
        $vehicleColor = VehicleColor::findOrFail($id);
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $vehicleColor->photo = $path;
        }

        // Update data customer dengan input yang baru
        $vehicleColor->color_id = $validatedData['color_id'];
        $vehicleColor->vehicle_id = $validatedData['vehicle_id'];


        // Simpan perubahan data customer
        $vehicleColor->save();

        // Redirect setelah berhasil update
        return redirect()->route('vehicleColor.index')->with('success', 'Data customer berhasil diperbarui.');
    }
}
