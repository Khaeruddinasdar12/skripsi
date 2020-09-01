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
        // untuk card (jumlah transaksi)
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
        //end untuk card

        //untuk chartJS (jumlah riwayat transaksi)
            $rmt = TransaksiSawah::where('jenis', 'mt')
            ->where('status', 'selesai')
            ->count(); //jumlah riwayat modal tanam

            $rgs = TransaksiSawah::where('jenis', 'gs')
                ->where('status', 'selesai')
                ->count(); //jumlah riwayat gadai sawah

            $ralat = TransaksiBarang::whereHas('barangs', function ($query) {
                        $query->where('jenis', 'alat')->where('status', '1');
                    })
                ->count(); //jumlah riwayat transaksi alat

            $rbibit = TransaksiBarang::whereHas('barangs', function ($query) {
                        $query->where('jenis', 'bibit')->where('status', '1');
                    })
                ->count(); //jumlah riwayat transaksi bibit

            $rpupuk = TransaksiBarang::whereHas('barangs', function ($query) {
                $query->where('jenis', 'pupuk')->where('status', '1');
                })
                ->count(); //jumlah riwayat transaksi pupuk

            $rberas = TransaksiBarang::whereHas('barangs', function ($query) {
                    $query->where('jenis', 'beras')->where('status', '1');
                })
                ->count(); //jumlah riwayat transaksi beras

            $rgabah = TransaksiGabah::where('status', '1')
                ->count(); //jumlah riwayat transaki gabah
        //end untuk chartJS

        return view('admin.home', [
            //variabel untuk card
        	'jmlmt' => $jmlmt,
        	'jmlgs'=> $jmlgs,
        	'jmlalat' => $jmlalat,
        	'jmlbibit' => $jmlbibit,
        	'jmlpupuk' => $jmlpupuk,
        	'jmlberas' => $jmlberas,
        	'jmlgabah' => $jmlgabah,
            // end variabel untuk card

            //variabel untuk chartJS
            'rmt' => $rmt,
            'rgs'=> $rgs,
            'ralat' => $ralat,
            'rbibit' => $rbibit,
            'rpupuk' => $rpupuk,
            'rberas' => $rberas,
            'rgabah' => $rgabah 
            //end variabel untuk chartJS 
        ]);
    }
}
