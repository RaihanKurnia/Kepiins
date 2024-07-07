<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('idcustomer');
            $table->string('nama_customer' );
            $table->string('alamat');
            $table->string('nomor_telefon');
            $table->string('email');
            $table->unsignedBigInteger('idpegawai_input');
            $table->enum('status_app_data_customer', ['0', '1','2'])->default('0');
            $table->string('note')->nullable();
            $table->timestamps();
            
            $table->foreign('idpegawai_input')->references('idpegawai')->on('pegawais')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
