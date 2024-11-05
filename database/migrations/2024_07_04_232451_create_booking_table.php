<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned(); // Changed 'id_cust' to 'customer_id'
            $table->string('license_plate', 10); // Changed 'nopol' to 'license_plate'
            $table->string('engine_number', 25); // Changed 'nomesin' to 'engine_number'
            $table->string('vehicle_type', 50); // Changed 'type_kendaraan' to 'vehicle_type'
            $table->string('customer_request', 100); // Changed 'cust_request' to 'customer_request'
            $table->string('status')->nullable(); // Assuming the status is a string and nullable
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}

