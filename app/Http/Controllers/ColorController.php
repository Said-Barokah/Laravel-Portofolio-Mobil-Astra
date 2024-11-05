<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color; // Model warna Anda
use Illuminate\Support\Facades\Log;

class ColorController extends Controller
{
    public function index(){
        $colors = Color::paginate(10);
        return view('Color.Index',compact('colors'));
    }

    public function edit($id){
        $color = Color::findOrFail($id);
        return view('Color.edit', compact('color'));
    }
    public function create(){
        return view('Color.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'hex_code' => 'required|string|',
        ]);
        $Color = new Color();
        $Color->name = $validatedData['name'];
        $Color->hex_code = $validatedData['hex_code'];
        $Color->save();
        return redirect()->route('color.index')->with('success', 'Data customer berhasil disimpan.');

    }
    public function update(Request $request,$id){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'hex_code' => 'required|string|',
        ]);

        // Ambil data customer berdasarkan ID
        $Color = Color::findOrFail($id);

        // Update data customer dengan input yang baru
        $Color->name = $validatedData['name'];
        $Color->hex_code = $validatedData['hex_code'] ;
        // Simpan perubahan data customer
        $Color->save();

        // Redirect setelah berhasil update
        return redirect()->route('color.index')->with('success', 'Data customer berhasil diperbarui.');
    }
    public function storeJson(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'hex_code' => 'required|string|max:7',
            ]);
            $hex_code = $request['hex_code'];
            if (substr($hex_code, 0, 1) !== '#') {
                $hex_code = '#' . $hex_code; // Add # if not present
            }

            $color = Color::create([
                'name' => $request->input('name'),
                'hex_code' =>  $hex_code,
            ]);

            return response()->json(['success' => true, 'color' => $color]);

        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error($e->getMessage());

            return response()->json(['success' => false, 'message' => 'Server error occurred.'], 500);
        }
    }


}
