<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TransaksiSawah;
use App\TransaksiBarang;
use App\TransaksiGabah;
use App\CartTransaksi;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        // untuk card (jumlah transaksi)
        	$jmlmt = TransaksiSawah::where('jenis', 'mt')
                ->where('status', 'gadai')
                ->count(); //jumlah sedang modal tanam

            $jmlgs = TransaksiSawah::where('jenis', 'gs')
                ->where('status', 'gadai')
                ->count(); //jumlah sedang gadai sawah

            $jmlgabah = TransaksiGabah::where('status', '0')
                ->count(); //jumlah sedang transaki gabah 

            $jmlalat = CartTransaksi::whereHas('tbarangs', function ($query) {
                        $query->where('status', '0');
                })
                ->where('jenis', 'alat')
                ->count(); //jumlah sedang transaksi alat
                // return $jmlalat;

            $jmlbibit = CartTransaksi::whereHas('tbarangs', function ($query) {
    		            $query->where('jenis', 'bibit')->where('status', '0');
    		    })
                ->where('jenis', 'bibit')
                ->count(); //jumlah sedang transaksi bibit
                // return$jmlbibit;

            $jmlpupuk = CartTransaksi::whereHas('tbarangs', function ($query) {
                    $query->where('status', '0');
            	})
                ->where('jenis', 'pupuk')
                ->count(); //jumlah sedang transaksi pupuk

            $jmlberas = CartTransaksi::whereHas('tbarangs', function ($query) {
    	            $query->where('status', '0');
    	        })
                ->where('jenis', 'beras')
                ->count(); //jumlah sedang transaksi beras

        // end untuk card

        // untuk chartJS (jumlah riwayat transaksi)
            $rmt = TransaksiSawah::where('jenis', 'mt')
            ->where('status', 'selesai')
            ->count(); //jumlah riwayat modal tanam

            $rgs = TransaksiSawah::where('jenis', 'gs')
                ->where('status', 'selesai')
                ->count(); //jumlah riwayat gadai sawah

            $rgabah = TransaksiGabah::where('status', '1')
                ->count(); //jumlah riwayat transaki gabah

            $ralat = CartTransaksi::whereHas('tbarangs', function ($query) {
                        $query->where('status', '1');
                    })
                ->where('jenis', 'alat')
                ->count(); //jumlah riwayat transaksi alat

            $rbibit = CartTransaksi::whereHas('tbarangs', function ($query) {
                        $query->where('status', '1');
                    })
                ->where('jenis', 'bibit')
                ->count(); //jumlah riwayat transaksi bibit

            $rpupuk = CartTransaksi::whereHas('tbarangs', function ($query) {
                $query->where('status', '1');
                })
                ->where('jenis', 'pupuk')
                ->count(); //jumlah riwayat transaksi pupuk

            $rberas = CartTransaksi::whereHas('tbarangs', function ($query) {
                    $query->where('status', '1');
                })
                ->where('jenis', 'beras')
                ->count(); //jumlah riwayat transaksi beras

        // end untuk chartJS

        return view('admin.home', [
            // variabel untuk card
        	'jmlmt' => $jmlmt,
        	'jmlgs'=> $jmlgs,
        	'jmlalat' => $jmlalat,
        	'jmlbibit' => $jmlbibit,
        	'jmlpupuk' => $jmlpupuk,
        	'jmlberas' => $jmlberas,
        	'jmlgabah' => $jmlgabah,
            // end variabel untuk card

            // variabel untuk chartJS
            'rmt' => $rmt,
            'rgs'=> $rgs,
            'ralat' => $ralat,
            'rbibit' => $rbibit,
            'rpupuk' => $rpupuk,
            'rberas' => $rberas,
            'rgabah' => $rgabah 
            // end variabel untuk chartJS 
        ]);
    }
}
