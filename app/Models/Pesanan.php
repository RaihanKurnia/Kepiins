<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = "pesanans";
    protected $primaryKey = 'id_pesanan'; 
    protected $fillable = 
    ['id_pesanan',
    'tanggal_pemesanan',
    'customer_idcustomer',
    'jumlah_order',
    'barang_idbarang',
    'note',
    'tanggal_pengiriman'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_idcustomer');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class,'barang_idbarang','idbarang');
    }
}
