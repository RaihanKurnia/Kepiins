<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id('id_pesanan');
            $table->timestamp('tanggal_pemesanan')->nullable();
            $table->enum('status_app_pesanan', ['0', '1','2'])->default('0');
            $table->unsignedBigInteger('customer_idcustomer');
            $table->timestamp('tanggal_pesanan')->nullable();
            $table->string('pengiriman_idpengiriman')->nullable();
            $table->integer('jumlah_order')->default('0');
            $table->unsignedBigInteger('barang_idbarang');
            $table->string('note')->nullable();
            $table->timestamp('tanggal_pengiriman')->nullable();
            $table->timestamps();
            
            $table->foreign('customer_idcustomer')->references('idcustomer')->on('customers')->onDelete('cascade');
            $table->foreign('barang_idbarang')->references('idbarang')->on('barangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
}
