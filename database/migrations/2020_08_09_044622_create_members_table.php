<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('kontak')->nullable();
            $table->string('alamat')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('bidang_ilmu')->nullable();
            $table->string('instansi')->nullable();
            $table->string('jenis_usaha')->nullable();
            $table->enum('member_type', array('perorangan', 'korporasi'));
            $table->string('member_cv')->nullable();
            $table->enum('member_role', array('superadmin', 'admin', 'member'));
            $table->boolean('active')->default(0);
            $table->boolean('archived')->default(0);
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
        Schema::dropIfExists('members');
    }
}
