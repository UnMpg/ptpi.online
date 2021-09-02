<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique()->nullable();
            $table->string('nama')->nullable();
            $table->string('kontak')->unique()->nullable();
            $table->string('jenis_instansi')->nullable();
            $table->string('nama_instansi')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('participants');
    }
}
