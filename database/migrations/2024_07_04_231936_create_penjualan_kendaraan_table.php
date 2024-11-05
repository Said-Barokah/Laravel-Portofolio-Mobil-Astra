<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_sales', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date'); // Changed 'tanggal' to 'date'
            $table->integer('vehicle_id')->unsigned(); // Changed 'id_kendaraan' to 'vehicle_id' // Changed 'harga' to 'price'
            $table->decimal('quantity', 50, 2); // Changed 'jumlah' to 'quantity'
            $table->decimal('total_price', 50, 2);
            $table->timestamps();

            $table->foreign('vehicle_id')->references('id')->on('vehicles');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_sales');
    }
}
