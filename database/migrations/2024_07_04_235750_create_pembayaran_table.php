<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned(); // Changed 'id_admin' to 'admin_id'
            $table->integer('sa_id')->unsigned(); // Changed 'id_sa' to 'sa_id'
            $table->integer('sales_id')->unsigned(); // Changed 'id_sales' to 'sales_id'
            $table->integer('booking_id')->unsigned(); // Changed 'id_booking' to 'booking_id'
            $table->integer('vehicle_sales_id')->unsigned();
            $table->integer('promo_codes_id')->unsigned();
            $table->date('payment_date'); // Changed 'tgl_pembayaran' to 'payment_date'
            $table->decimal('total_price', 15, 2); // Changed 'total_harga' to 'total_price'
            $table->integer('applied_discount')->default(0); // Changed 'diskon_diterapkan' to 'applied_discount' with a default of 0
            $table->decimal('total_payment', 15, 2); // Changed 'total_bayar' to 'total_payment'
            $table->string('payment_method'); // Changed 'metode_pembayaran' to 'payment_method'
            $table->string('status'); // 'status' remains the same in English
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('sa_id')->references('id')->on('service_advisors');
            $table->foreign('sales_id')->references('id')->on('sales');
            $table->foreign('booking_id')->references('id')->on('bookings');
            $table->foreign('vehicle_sales_id')->references('id')->on('vehicle_sales');
            $table->foreign('promo_codes_id')->references('id')->on('promo_codes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
}
