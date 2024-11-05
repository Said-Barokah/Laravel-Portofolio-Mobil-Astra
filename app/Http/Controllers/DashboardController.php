<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class DashboardController extends Controller
{
    // Menampilkan admin dashboard
    public function adminDashboard()
    {
        $user = Auth::guard('admin')->user();
        return view('admin.Dashboard', compact('user'));
    }

    // Menampilkan customer dashboard
    public function customerDashboard()
    {
        $user = Auth::user();
        return view('customer.Dashboard', compact('user'));
    }

    public function home()
    {
        $user = Auth::user();
        return view('Home', compact('user'));
    }


    public function modelShow($id = null)
    {
        // Mendapatkan pengguna yang sedang login
        $user = Auth::user();

        // Mengambil semua kendaraan
        $models = Vehicle::all();

        // Jika ID tidak diberikan, ambil ID dari kendaraan pertama
        if (is_null($id)) {
            $id = $models->first()->id ?? null;
        }

        // Mencari kendaraan berdasarkan ID
        $vehicle = Vehicle::with(['vehicleType', 'colors'])->find($id);

        // Jika kendaraan tidak ditemukan, bisa mengarahkan ke halaman 404 atau redirect
        if (!$vehicle) {
            return redirect()->route('models.index')->withErrors('Vehicle not found.');
        }

        // Mengambil colorId dari query string
        $colorId = request('colorId');

        // Mengambil warna berdasarkan ID, jika tidak ada, ambil warna pertama
        $selectedColor = $vehicle->colors->firstWhere('id', $colorId) ?? $vehicle->colors->first();

        // Jika warna ditemukan
        $photo = $selectedColor->pivot->photo ?? 'default-photo.jpg';

        // Mengirim data ke view
        return view('Model', compact('models', 'user', 'vehicle', 'selectedColor', 'photo'));
    }


    public function services()
    {
        return view('Service');
    }

    public function promo(){

        $currentDate = Carbon::now(); // Mengambil tanggal dan waktu saat ini

        // Mengambil promo yang masih berlaku berdasarkan start_date dan end_date
        $promoCodes = PromoCode::with('discount')
            ->where('start_date', '<=', $currentDate)
            ->where('end_date', '>=', $currentDate)
            ->get();

        // Kirim data ke view 'Promo'
        return view('Promo', ['promoCodes' => $promoCodes]);
    }
}
