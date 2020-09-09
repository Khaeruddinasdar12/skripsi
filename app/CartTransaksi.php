<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartTransaksi extends Model
{
    protected $table = 'cart_transaksis';
    protected $fillable = [
        'jumlah', 'barang_id', 'transaksi_id', 'harga'
    ];

    public function barangs()
    {
        return $this->belongsTo('App\Barang', 'barang_id');
    }

    public function tbarangs()
    {
        return $this->belongsTo('App\TransaksiBarang', 'transaksi_id');
    }
}
