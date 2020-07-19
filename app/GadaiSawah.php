<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GadaiSawah extends Model
{
	protected $table = 'gadai_sawahs';
    protected $fillable = [
        'string', 'harga', 'admin_verified', 'admin_by', 'sawah_id', 'user_by', 'keterangan',
    ];
}
