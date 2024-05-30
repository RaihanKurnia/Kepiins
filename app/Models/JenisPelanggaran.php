<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPelanggaran extends Model
{
    use HasFactory;
    protected $table = "jenis_pelanggarans";
    protected $fillable = 
    ['idjenis_pelanggaran',
    'nama_pelanggaran',
    'bobot_pelanggaran'];
}
