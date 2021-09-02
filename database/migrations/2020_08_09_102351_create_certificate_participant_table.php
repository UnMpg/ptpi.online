<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificateParticipantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate_participant', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('participant_id');
            $table->unsignedInteger('certificate_id');
            $table->boolean('download')->default(false);
            $table->timestamps();

            $table->foreign('participant_id')->references('id')->on('participants');
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
        Schema::dropIfExists('certificate_participant');
    }
}
