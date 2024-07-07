<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customers";
    protected $primaryKey = 'idcustomer'; 
    protected $fillable = 
    ['nama_customer',
    'alamat',
    'nomor_telefon',
    'email',
    'note',
    'idpegawai_input'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'idpegawai_input', 'idpegawai');
    }

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'customer_idcustomer');
    }
}
