<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use Illuminate\Http\RedirectResponse;



class SalesController extends Controller
{
    public function index(){
        $sales = Sales::paginate(10);
        return view('sales.index', compact('sales'));
    }

    public function create(){
        return view('sales.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'min:9',

            // 'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            if ($photo->isValid()) {
                $photoPath = $photo->store('photos', 'public');
            } else {
                return back()->withErrors(['photo' => 'Foto tidak valid, silakan coba lagi.']);
            }
        }

        Sales::create([
            'name' => $validatedData['name'],
            'phone_number' => $validatedData['phone_number'],
            'photo' => $photoPath,
        ]);

        return redirect()->route('sales.index')->with('success', 'Kendaraan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Ambil data customer berdasarkan ID
        $sales = Sales::findOrFail($id);

        // Tampilkan form edit dan kirim data customer ke view
        return view('sales.edit', compact('sales'));
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
            'name' => 'required|string|max:255',
            'phone_number' => 'min:9',

            // 'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Ambil data customer berdasarkan ID
        $sales = Sales::findOrFail($id);
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $sales->photo = $path;
        }

        // Update data customer dengan input yang baru
        $sales->name = $validatedData['name'];
        $sales->phone_number = $validatedData['phone_number'];


        // Simpan perubahan data customer
        $sales->save();

        // Redirect setelah berhasil update
        return redirect()->route('sales.index')->with('success', 'Data customer berhasil diperbarui.');
    }
}
