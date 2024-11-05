<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;


class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::paginate(10);;
        return view('customer.index', compact('customers'));
    }

    public function create(){
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'email|nullable',
            'password' => 'min:8|nullable',
            'phone_number_cust' => 'min:9',
            'address_cust' => 'string|max:100',

            // 'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo_cust')) {
            $photo = $request->file('photo_cust');
            if ($photo->isValid()) {
                $photoPath = $photo->store('photos', 'public');
            } else {
                return back()->withErrors(['photo_cust' => 'Foto tidak valid, silakan coba lagi.']);
            }
        }

        Customer::create([
            'name' => $validatedData['name'],
            'email' => $request->email ? $validatedData['email'] : null,
            'password' => $request->password ? $validatedData['password'] : null,
            'phone_number_cust' => $validatedData['phone_number_cust'],
            'photo_cust' => $photoPath,
            'address_cust' => $validatedData['address_cust'],
            'point' => 0,
        ]);

        return redirect()->route('customer.index')->with('success', 'Kendaraan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Ambil data customer berdasarkan ID
        $customer = Customer::findOrFail($id);

        // Tampilkan form edit dan kirim data customer ke view
        return view('customer.edit', compact('customer'));
    }

    /**
     * Memperbarui data customer di database.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'email|nullable',
            'password' => 'min:8|nullable',
            'phone_number_cust' => 'min:9',
            'address_cust' => 'string|max:100',

            // 'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Ambil data customer berdasarkan ID
        $customer = Customer::findOrFail($id);
        if ($request->hasFile('photo_cust')) {
            $path = $request->file('photo_cust')->store('photos', 'public');
            $customer->photo_cust = $path;
        }

        // Update data customer dengan input yang baru
        $customer->name = $validatedData['name'];
        $customer->email = $validatedData['email'] ? :null;
        $customer->password = $validatedData['password'] ? bcrypt($validatedData['password']) : $customer->password;
        $customer->phone_number_cust = $validatedData['phone_number_cust'];
        $customer->address_cust = $validatedData['address_cust'];


        // Simpan perubahan data customer
        $customer->save();

        // Redirect setelah berhasil update
        return redirect()->route('customer.index')->with('success', 'Data customer berhasil diperbarui.');
    }
}
