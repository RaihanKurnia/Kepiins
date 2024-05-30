<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelanggaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggarans', function (Blueprint $table) {
            $table->id('idpelanggaran');
            $table->string('bukti_pelanggaran')->nullable();
            $table->timestamp('waktu_pelanggaran')->nullable();
            $table->unsignedBigInteger('pegawai_idbpegawai');
            $table->unsignedBigInteger('jenis_pelanggaran_idjenis_pelanggaran');
            $table->timestamps();

            $table->foreign('pegawai_idbpegawai')->references('idpegawai')->on('pegawais')->onDelete('cascade');
            $table->foreign('jenis_pelanggaran_idjenis_pelanggaran')->references('idjenis_pelanggaran')->on('jenis_pelanggarans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelanggarans');
    }
}
