<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertifiedPencapaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certified_pencapaians', function (Blueprint $table) {
            $table->id();
            $table->string('certified_member_id');
            $table->string('nama');
            $table->string('jenis_pencapaian');
            $table->string('lama');
            $table->string('nilai');
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
        Schema::dropIfExists('certified_pencapaians');
    }
}
