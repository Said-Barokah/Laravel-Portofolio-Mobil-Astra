<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceAdvisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_advisors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100); // Changed 'nama_sa' to 'sa_name'
            $table->string('phone_number', 13); // Changed 'tlp_sa' to 'phone_number_sa'
            $table->string('photo',255)->nullable();// Use binary to store images
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
        Schema::dropIfExists('service_advisors');
    }
}

