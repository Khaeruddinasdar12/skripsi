<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GadaiSawah extends Model
{
	protected $table = 'gadai_sawahs';
    protected $fillable = [
        'string', 'harga', 'admin_verified', 'admin_by', 'sawah_id', 'user_by', 'keterangan', 'status',
    ];

    public function sawahs()
    {
        return $this->belongsTo('App\Sawah', 'sawah_id');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_by');
    }

    public function admins()
    {
        return $this->belongsTo('App\Admin', 'admin_by');
    }
}
