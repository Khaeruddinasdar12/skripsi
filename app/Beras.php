<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beras extends Model
{
    protected $table = 'beras';
    protected $fillable = [
        'nama', 'harga', 'admin_by', 'min_beli', 'stok', 'deskripsi', 'gambar',
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'admin_by');
    }
}
