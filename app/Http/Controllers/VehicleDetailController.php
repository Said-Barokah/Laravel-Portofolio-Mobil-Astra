<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\VehicleColor;
use App\Models\VehicleDetail;
use Illuminate\Http\RedirectResponse;
use App\Models\Vehicle;
use App\Models\Color;
use Mockery\Generator\StringManipulation\Pass\Pass;

class VehicleDetailController extends Controller
{
    public function index(){
        $vehicleDetails = VehicleDetail::paginate(10);
        return view('vehicleDetail.index', compact('vehicleDetails'));
    }

    public function create(){
        $vehicleColors = VehicleColor::join('vehicles', 'vehicle_color.vehicle_id', '=', 'vehicles.id')
                                       ->orderBy('vehicles.name', 'asc')->get();
        return view('vehicleColor.create', compact('vehicleColors'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'vehicle_color_id' => 'required|integer',
            'chassis_number' => 'required|string|max:255',
            'engine_number' => 'required|string|max:255',
            'license_plate' => 'nullable|string|max:255'
        ]);

        VehicleDetail::create([
            'vehicle_color_id' => $validatedData['vehicle_color_id'],
            'chassis_number' => $validatedData['chassis_number'],
            'engine_number' => $validatedData['engine_number'],
            'license_plate' => $request->license_plate ? $validatedData['license_plate'] : null
        ]);

        return redirect()->route('vehicleDetail.index')->with('success', 'Kendaraan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Ambil data customer berdasarkan ID
        $vehicleDetail = vehicleDetail::findOrFail($id);
        $vehicleColors = VehicleColor::all();

        // Tampilkan form edit dan kirim data customer ke view
        return view('vehicleDetail.Edit', compact('vehicleDetail','vehicleColors'));
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
            'vehicle_color_id' => 'required|integer',
            'chassis_number' => 'required|string|max:255',
            'engine_number' => 'required|string|max:255',
            'license_plate' => 'nullable|string|max:255'
        ]);

        // Ambil data customer berdasarkan ID
        $photoPath = null;
        $vehicleDetail = VehicleDetail::findOrFail($id);

        // Update data customer dengan input yang baru
        $vehicleDetail->vehicle_color_id = $validatedData['vehicle_color_id'];
        $vehicleDetail->chassis_number = $validatedData['chassis_number'];
        $vehicleDetail->engine_number = $validatedData['engine_number'];
        $vehicleDetail->license_plate = $request->license_plate ? $validatedData['license_plate'] : null;


        // Simpan perubahan data customer
        $vehicleDetail->save();

        // Redirect setelah berhasil update
        return redirect()->route('vehicleDetail.index')->with('success', 'Data customer berhasil diperbarui.');
    }

    public function destroy(){

    }
}

