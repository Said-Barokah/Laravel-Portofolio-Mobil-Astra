<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKodePromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->integer('discount_id')->unsigned(); // Changed 'id_diskon' to 'discount_id'
            $table->string('promo_code', 25); // Changed 'kode_promo' to 'promo_code'
            $table->date('start_date'); // Changed 'tanggal_mulai' to 'start_date'
            $table->date('end_date'); // Changed 'tanggal_berakhir' to 'end_date'
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kode_promos');
    }
}

