<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;


class AdminController extends Controller
{
    public function home()
    {
        return view('Dashboard');
    }
    public function kendaraan()
    {
        return view('Kendaraan');
    }
    public function index()
    {
        $admins = Admin::paginate((10));
        return view('admin.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'email|nullable',
            'password' => 'min:8|nullable',
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

        Admin::create([
            'name' => $validatedData['name'],
            'email' => $request->email ? $validatedData['email'] : null,
            'password' => $request->password ? $validatedData['password'] : null,
            'phone_number' => $validatedData['phone_number'],
            'photo' => $photoPath,
        ]);

        return redirect()->route('admin.index')->with('success', 'Kendaraan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Ambil data admin berdasarkan ID
        $admin = Admin::findOrFail($id);

        // Tampilkan form edit dan kirim data admin ke view
        return view('admin.edit', compact('admin'));
    }

    /**
     * Memperbarui data admin di database.
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
            'email' => 'required|email|',
            'password' => 'min:8|required',
            'phone_number' => 'min:9',

            // 'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Ambil data admin berdasarkan ID
        $admin = Admin::findOrFail($id);
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $admin->photo = $path;
        }

        // Update data admin dengan input yang baru
        $admin->name = $validatedData['name'];
        $admin->email = $validatedData['email'];
        $admin->password = $validatedData['password'] ? bcrypt($validatedData['password']) : $admin->password;
        $admin->phone_number = $validatedData['phone_number'];


        // Simpan perubahan data admin
        $admin->save();

        // Redirect setelah berhasil update
        return redirect()->route('admin.index')->with('success', 'Data admin berhasil diperbarui.');
    }
}
