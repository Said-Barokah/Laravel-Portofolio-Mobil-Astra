<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;


class Admin extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'admins';

    protected $fillable = [
        'name', 'email', 'password','phone_number'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}