<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;


class Customer extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'customers';

    protected $fillable = [
        'name', 'email','phone_number_cust', 'address_cust','photo_cust', 'point'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
