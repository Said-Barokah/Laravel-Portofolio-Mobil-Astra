<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicles'; // Nama tabel yang sesuai

    protected $fillable = [
        'name',
        'stock',
        'price',
        'type_id',
        'photo',
        'transmission',
        'machine_type',
        'displacement',
        'max_torque',
    ];

    public function vehicleSales()
    {
        return $this->hasMany(VehicleSales::class, 'vehicle_id');
    }

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class, 'type_id');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'vehicle_color', 'vehicle_id', 'color_id')->withPivot('photo');;
    }



}
