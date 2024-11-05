<?php
// app/Models/PromoCode.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{


    protected $fillable = ['discount_id','start_date','end_date','promo_code'];
    // Relationship with Discount
    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }
}
