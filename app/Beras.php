<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beras extends Model
{
    protected $table = 'beras';
    protected $fillable = [
        'nama', 'harga', 'admin_by', 'min_beli', 'stok', 'deskripsi', 'gambar',
    ];

    public function admins()
    {
        return $this->belongsTo('App\Admin', 'admin_by');
    }
}
