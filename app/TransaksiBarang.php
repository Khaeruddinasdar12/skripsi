<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiBarang extends Model
{
    protected $table = 'transaksi_barangs';
    protected $fillable = [
        'jumlah', 'harga', 'alamat', 'kecamatan', 'kelurahan', 'keterangan', 'jenis_bayar', 'bukti', 'status', 'barang_id', 'user_id', 'admin_id',
    ];

    public function admins()
    {
        return $this->belongsTo('App\Admin', 'admin_id');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function barangs()
    {
        return $this->belongsTo('App\Barang', 'barang_id');
    }
}