<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\TransaksiBeras;

class TransaksiBerasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() //menampilkan hal. data transaksi beras
    {
        //mengurutkan dari terbaru ke terlama (descending)
        $data = TransaksiBeras::where('status', '0')
            ->with('users:id,name')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return $data;
    }

    public function riwayat() //menampilkan hal. data riwayat transaksi beras
    {
    }

    public function status($id) // mengubah status pembelian beras menjadi riwayat
    {
    }
}
