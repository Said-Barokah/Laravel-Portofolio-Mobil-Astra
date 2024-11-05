<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleDetail extends Model
{
    // Nama tabel di database
    protected $table = 'vehicle_details';

    // Field yang dapat diisi secara massal
    protected $fillable = [
         'chassis_number', 'engine_number', 'license_plate', 'vehicle_color_id'
    ];


    public function vehicleColor()
    {
        return $this->belongsTo(VehicleColor::class);
    }

    // Aksesori untuk memformat nomor sasis
    public function getFormattedChassisNumberAttribute()
    {
        return strtoupper($this->chassis_number); // Mengubah nomor sasis menjadi huruf kapital
    }

    // Aksesori untuk memformat nomor mesin
    public function getFormattedEngineNumberAttribute()
    {
        return strtoupper($this->engine_number); // Mengubah nomor mesin menjadi huruf kapital
    }
}
