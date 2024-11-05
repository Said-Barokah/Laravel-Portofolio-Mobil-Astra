<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100); // Changed 'nama_admin' to 'admin_name'
            $table->string('phone_number', 13); // Changed 'tlp_admin' to 'phone_number_admin'
            $table->string('photo',255)->nullable(); // Changed 'foto_admin' to 'photo_admin' and added 'nullable()'
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
        Schema::dropIfExists('admins');
    }
}

