<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertifiedPendidikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certified_pendidikans', function (Blueprint $table) {
            $table->id();
            $table->string('certified_member_id');
            $table->string('jenjang');
            $table->string('universitas');
            $table->string('jurusan');
            $table->string('ipk');
            $table->string('lama_studi');
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
        Schema::dropIfExists('certified_pendidikans');
    }
}
