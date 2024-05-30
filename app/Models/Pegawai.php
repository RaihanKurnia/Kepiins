<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = "pegawais";
    protected $fillable = 
    [ 'idpegawai',
    'nama_pegawai',
    'alamat',
    'tanggal_lahir',
    'nomor_telepon',
    'jenjang_pendidikan',
    'foto',
    'jabatan',
    'password',
    'email', 
    'role'];

    public function customers()
    {
        return $this->hasMany(Customer::class,'idpegawai_input');
    }

    
}
