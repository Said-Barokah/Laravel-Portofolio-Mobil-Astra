<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleSales extends Model
{
    use HasFactory;

    protected $table = 'vehicle_sales';

    protected $fillable = [
        'date',
        'vehicle_id',
        'quantity',
        'total_price',
        // tambahkan kolom lain yang ada pada tabel vehicle_sales
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    // Jika diperlukan, definisikan relasi dengan model lain di sini
}
