<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertifiedPengalamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certified_pengalamen', function (Blueprint $table) {
            $table->id();
            $table->string('certified_member_id');
            $table->string('jabatan');
            $table->string('institusi');
            $table->string('lama_bekerja');
            $table->string('deskripsi_pekerjaan');
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
        Schema::dropIfExists('certified_pengalamen');
    }
}
