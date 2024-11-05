<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleColor extends Model
{
    // Nama tabel di database
    protected $table = 'vehicle_color';

    // Field yang dapat diisi secara massal
    protected $fillable = [
        'vehicle_id', 'color_id', 'photo'
    ];

    // Relasi ke model Vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function Color()
    {
        return $this->belongsTo(Color::class);
    }

}
