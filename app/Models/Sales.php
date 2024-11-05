<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;


class Sales extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'sales';
    protected $fillable = [
        'name',
        'phone_number',
        'photo',
    ];

    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
}
