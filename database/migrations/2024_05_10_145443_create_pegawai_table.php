<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('pegawais', function (Blueprint $table) {
            $table->bigIncrements('idpegawai');
            $table->string('nama_pegawai' );
            $table->string('alamat')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('jenjang_pendidikan')->nullable();
            $table->string('foto')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('password');
            $table->string('email' )->unique();
            $table->enum('role', ['Super Admin','Pegawai','HRD','Manager']);
            $table->rememberToken () ;
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
        Schema::dropIfExists('pegawais');
    }
}
