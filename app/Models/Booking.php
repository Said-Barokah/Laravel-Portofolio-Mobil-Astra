<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // Nama tabel di database
    protected $table = 'bookings';

    // Field yang dapat diisi secara massal
    protected $fillable = [
        'customer_id', 'vehicle_detail_id', 'status'
    ];

    // Relasi ke model Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relasi ke model VehicleDetail
    public function vehicleDetail()
    {
        return $this->belongsTo(VehicleDetail::class, 'vehicle_detail_id');
    }

    // Aksesori untuk menampilkan status
    public function getStatusAttribute($value)
    {
        return ucfirst($value); // Mengubah huruf pertama status menjadi kapital
    }
}
