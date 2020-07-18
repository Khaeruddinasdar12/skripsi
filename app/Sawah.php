<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sawah extends Model
{
	protected $table = 'sawahs';

    protected $fillable = [
        'titik_koordinat', 'alamat_id', 'kecamatan', 'kelurahan', 'alamat', 'created_by', 'luas_sawah', 'jenis_bibit', 'jenis_pupuk', 'periode_tanam',
    ];
}
