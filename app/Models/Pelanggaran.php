<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;
    protected $table = "pelanggarans";
    protected $fillable = 
    ['idpelanggaran',
    'bukti_pelanggaran',
    'waktu_pelanggaran',
    'pegawai_idbpegawai',
    'jenis_pelanggaran_idjenis_pelanggaran',
    'tanggal_pengiriman'];

}

