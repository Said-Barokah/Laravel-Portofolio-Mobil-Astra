<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    // Nama tabel di database
    protected $table = 'payments';

    // Field yang dapat diisi secara massal
    protected $fillable = [
        'admin_id', 'service_advisor_id', 'sales_id', 'booking_id', 'promo_code_id', 'payment_date', 'total_payment', 'payment_method_id', 'status'
    ];

    // Relasi ke model Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    // Relasi ke model SA (Sales Advisor)
    public function serviceAdvisor()
    {
        return $this->belongsTo(ServiceAdvisor::class);
    }

    // Relasi ke model Sales
    public function sales()
    {
        return $this->belongsTo(Sales::class);
    }

    // Relasi ke model Booking
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    // Relasi ke model PromoCode
    public function promoCode()
    {
        return $this->belongsTo(PromoCode::class, 'promo_code_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    // Aksesori untuk memformat total pembayaran
    public function getFormattedTotalPaymentAttribute()
    {
        return number_format($this->total_payment, 2); // Format angka dengan 2 desimal
    }


}
