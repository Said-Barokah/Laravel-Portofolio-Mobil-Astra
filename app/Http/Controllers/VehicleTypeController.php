<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleType; // Model warna Anda
use Illuminate\Support\Facades\Log;

class VehicleTypeController extends Controller
{


    public function index(){
        $vehicleTypes = VehicleType::paginate(10);
        return view('vehicleType.Index',compact('vehicleTypes'));
    }

    public function edit($id){
        $vehicleType = VehicleType::findOrFail($id);
        return view('vehicleType.edit', compact('vehicleType'));
    }
    public function create(){
        $vehicleType = VehicleType::all();
        return view('vehicleType.create', compact('vehicleType'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'type' => 'required|string|max:255',
            'description' => 'nullable|string|',
        ]);
        $vehicleType = new VehicleType();
        $vehicleType->type = $validatedData['type'];
        $vehicleType->description = $request->description ? $validatedData['description'] : null;
        $vehicleType->save();
        return redirect()->route('vehicleType.index')->with('success', 'Data customer berhasil disimpan.');

    }
    public function update(Request $request,$id){
        $validatedData = $request->validate([
            'type' => 'required|string|max:255',
            'description' => 'nullable|string|',
        ]);

        // Ambil data customer berdasarkan ID
        $vehicleType = VehicleType::findOrFail($id);

        // Update data customer dengan input yang baru
        $vehicleType->type = $validatedData['type'];
        $vehicleType->description = $request->description ? $validatedData['description'] : null;
        // Simpan perubahan data customer
        $vehicleType->save();

        // Redirect setelah berhasil update
        return redirect()->route('vehicleType.index')->with('success', 'Data customer berhasil diperbarui.');
    }
    public function storeJson(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
        ]);

        $vehicleType = VehicleType::create([
            'type' => $request->type,
        ]);

        return response()->json([
            'success' => true,
            'vehicleType' => $vehicleType
        ]);
    }


}
