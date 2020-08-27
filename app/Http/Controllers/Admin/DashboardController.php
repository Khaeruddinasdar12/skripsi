<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TransaksiSawah;
use App\TransaksiBarang;
use App\TransaksiGabah;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
    	$jmlmt = TransaksiSawah::where('jenis', 'mt')
            ->where('status', 'gadai')
            ->count(); //jumlah sedang modal tanam

        $jmlgs = TransaksiSawah::where('jenis', 'gs')
            ->where('status', 'gadai')
            ->count(); //jumlah sedang gadai sawah

        $jmlalat = TransaksiBarang::whereHas('barangs', function ($query) {
                    $query->where('jenis', 'alat')->where('status', '0');
                })
            ->count(); //jumlah sedang transaksi alat

        $jmlbibit = TransaksiBarang::whereHas('barangs', function ($query) {
		            $query->where('jenis', 'bibit')->where('status', '0');
		        })
            ->count(); //jumlah sedang transaksi bibit

        $jmlpupuk = TransaksiBarang::whereHas('barangs', function ($query) {
            $query->where('jenis', 'pupuk')->where('status', '0');
        	})
            ->count(); //jumlah sedang transaksi pupuk

        $jmlberas = TransaksiBarang::whereHas('barangs', function ($query) {
	            $query->where('jenis', 'beras')->where('status', '0');
	        })
            ->count(); //jumlah sedang transaksi beras

        $jmlgabah = TransaksiGabah::where('status', '0')
            ->count(); //jumlah sedang transaki gabah

        return view('admin.home', [
        	'jmlmt' => $jmlmt,
        	'jmlgs'=> $jmlgs,
        	'jmlalat' => $jmlalat,
        	'jmlbibit' => $jmlbibit,
        	'jmlpupuk' => $jmlpupuk,
        	'jmlberas' => $jmlberas,
        	'jmlgabah' => $jmlgabah 
        ]);
    }
}
