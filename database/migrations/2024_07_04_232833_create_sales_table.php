<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100); // Changed 'nama_sales' to 'sales_name'
            $table->string('phone_number', 13); // Changed 'tlp_sales' to 'phone_number_sales'
            $table->admin('photo',255)->nullable(); // Changed 'foto_sales' to 'photo_sales' and added 'nullable()'
             // Use binary to store images
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
        Schema::dropIfExists('sales');
    }
}
