<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TransaksiBarang;
use App\TransaksiGabah;
use App\TransaksiSawah;
use DB;
class Laporan extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	// $barang 	= TransaksiBarang::orderBy('updated_at', 'desc')->limit(25)->get();
    	// $gabah 		= TransaksiGabah::orderBy('updated_at', 'desc')->limit(25)->get();
    	// $sawah 		= TransaksiSawah::orderBy('updated_at', 'desc')->limit(25)->get();

    	// $data = $barang->union($gabah)->get();
    	
    	// $union = DB::table('transaksi_gabahs')
    	// 			->union($barang)
    	// 			->get();
    	// return $union;
    	return view('admin.page.laporan');
    }
}
