<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;


class ServiceAdvisor extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'service_advisors';

    protected $fillable = [
        'name', 'phone_number', 'photo',
    ];

    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
}
