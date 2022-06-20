<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertifiedMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certified_members', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('password');
            $table->string('telp');
            $table->string('alamat');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('jabatan');
            $table->string('bidang_ilmu');
            $table->string('instansi');
            $table->string('certified_cv');
            $table->string('certified_status');
            $table->string('foto');
            $table->string('upload');
            $table->string('status');
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
        Schema::dropIfExists('certified_members');
    }
}
