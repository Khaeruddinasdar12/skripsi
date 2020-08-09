<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiGabah extends Model
{
    protected $table = 'transaksi_gabahs';

    protected $fillable = [
        'jumlah', 'harga', 'alamat', 'kecamatan', 'kelurahan', 'keterangan', 'jenis_bayar', 'bukti', 'status', 'gabah_id', 'user_id', 'admin_id',
    ];

    public function admins()
    {
        return $this->belongsTo('App\Admin', 'admin_id');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function gabahs()
    {
        return $this->belongsTo('App\Gabah', 'gabah_id');
    }
}
