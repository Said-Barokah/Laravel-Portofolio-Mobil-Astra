<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->decimal('phone_number_cust', 13, 0); // Changed 'tlp_cust' to 'phone_number_cust'
            $table->string('address_cust', 100); // Changed 'alamat_cust' to 'address_cust'
            $table->string('photo_cust')->nullable(); // Assuming the image is stored as a path to the file
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
        Schema::dropIfExists('customers');
    }
}
