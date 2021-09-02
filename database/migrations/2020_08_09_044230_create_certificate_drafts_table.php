<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificateDraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate_drafts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('nama');
            $table->unsignedInteger('certificate_id');
            $table->boolean('download');

            $table->foreign('certificate_id')->references('id')->on('certificates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificate_drafts');
    }
}
