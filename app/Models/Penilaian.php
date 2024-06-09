<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $table = "detail_penilaians";
    protected $primaryKey = 'iddetail_penialaian'; 
    protected $fillable = 
    ['iddetail_penialaian',
    'nilai',
    'tanggal_penilaian',
    'jenis_penilaian',
    'pegawai_idpegawai',
    'periode'];
}
