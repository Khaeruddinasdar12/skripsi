<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $table = 'alats';
    protected $fillable = [
        'nama', 'stok', 'harga', 'keterangan', 'admin_id',
    ];

    public function admins()
    {
        return $this->belongsTo('App\Admin', 'admin_id');
    }
}
