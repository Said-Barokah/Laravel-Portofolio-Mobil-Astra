<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods';

    protected $fillable = [
        'name',
        'description',
    ];

    // Jika kamu tidak ingin menggunakan timestamp, hapus baris ini
    public $timestamps = true;
}
