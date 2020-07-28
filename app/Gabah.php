<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gabah extends Model
{
    protected $table = 'gabahs';
    protected $fillable = [
        'jenis', 'harga', 'admin_by',
    ];
}
