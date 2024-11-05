<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceAdvisor;
use Illuminate\Http\RedirectResponse;


class ServiceAdvisorController extends Controller
{
    public function index(){
        $serviceAdvisors = ServiceAdvisor::paginate(10);
        return view('serviceAdvisor.index', compact('serviceAdvisors'));
    }

    public function create(){
        return view('serviceAdvisor.create');
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

        ServiceAdvisor::create([
            'name' => $validatedData['name'],
            'phone_number' => $validatedData['phone_number'],
            'photo' => $photoPath,
        ]);

        return redirect()->route('serviceAdvisor.index')->with('success', 'Kendaraan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Ambil data customer berdasarkan ID
        $serviceAdvisor = ServiceAdvisor::findOrFail($id);

        // Tampilkan form edit dan kirim data customer ke view
        return view('serviceAdvisor.edit', compact('serviceAdvisor'));
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
        $serviceAdvisor = ServiceAdvisor::findOrFail($id);
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $serviceAdvisor->photo = $path;
        }

        // Update data customer dengan input yang baru
        $serviceAdvisor->name = $validatedData['name'];
        $serviceAdvisor->phone_number = $validatedData['phone_number'];


        // Simpan perubahan data customer
        $serviceAdvisor->save();

        // Redirect setelah berhasil update
        return redirect()->route('serviceAdvisor.index')->with('success', 'Data customer berhasil diperbarui.');
    }
}
