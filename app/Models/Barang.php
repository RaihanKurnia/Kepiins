<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "barangs";
    protected $fillable = 
    ['idbarang',
    'nama_barang',
    'harga',
'deskripsi'];

public function pesanan_1()
{
    return $this->hasMany(Pesanan::class, 'barang_idbarang');
}
}
