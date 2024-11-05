<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sales;
use Illuminate\Http\RedirectResponse;



class SalesManController extends Controller
{
    public function index(){
        $sales = Sales::all();
        return view('Sales', compact('sales'));
    }

    public function create(){
        return view('CreateSales');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the file upload
        if ($request->hasFile('photo')) {
            $filePath = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $filePath;
        }

        // Create the sale record
        Sales::create($validated);

        return redirect()->route('sales-man.index')->with('success', 'Sale data has been saved successfully.');
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
