<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanAksesorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessories_sales', function (Blueprint $table) {
            $table->increments('id');
            $table->date('accessory_date'); // Changed 'tanggal_aksesoris' to 'accessory_date'
            $table->integer('accessory_id')->unsigned(); // Changed 'id_accessory' to 'accessory_id' // Changed 'harga_aksesoris' to 'accessory_price'
            $table->decimal('accessory_quantity', 8, 2); // Changed 'jumlah_aksesoris' to 'accessory_quantity'
            $table->decimal('total_accessory', 8, 2);
            $table->timestamps();

            // foreign key constraint
            $table->foreign('accessory_id')->references('id')->on('accessories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accessories_sales');
    }
}
