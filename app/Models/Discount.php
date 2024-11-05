<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ['name','type','amount'];

    // Relationship with PromoCode
    public function promoCodes()
    {
        return $this->hasMany(PromoCode::class);
    }
}
