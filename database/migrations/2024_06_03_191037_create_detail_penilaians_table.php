<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penilaians', function (Blueprint $table) {
            $table->id('iddetail_penialaian');
            $table->double('nilai');
            $table->timestamp('tanggal_penilaian')->nullable();
            $table->enum('jenis_penilaian', ['customer', 'tender','pelanggaran'])->nullable();
            $table->bigInteger('pegawai_idpegawai')->nullable();
            $table->bigInteger('periode')->nullable();
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
        Schema::dropIfExists('detail_penilaians');
    }
}
