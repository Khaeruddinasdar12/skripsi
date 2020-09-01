<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TransaksiBarang;
use App\TransaksiGabah;
use App\TransaksiSawah;
use DB;
use PDF;
use App\Exports\ExcelExport;
use Maatwebsite\Excel\Facades\Excel;

class Laporan extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function pdf(Request $request)
    {
        // return $request;
        $trs = $request->get('transaksi');
        $thn = $request->get('tahun');
        $bln = $request->get('bulan');

        if (!empty($bln)) {
            $arraybln = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"); 
            if(in_array($bln, $arraybln)){
                switch ($bln) {
                    case '1': $blnstr = 'Januari'; break;
                    case '2': $blnstr = 'Februari'; break;
                    case '3': $blnstr = 'Maret'; break;
                    case '4': $blnstr = 'April'; break;
                    case '5': $blnstr = 'Mei'; break;
                    case '6': $blnstr = 'Juni'; break;
                    case '7': $blnstr = 'Juli'; break;
                    case '8': $blnstr = 'Agustus'; break;
                    case '9': $blnstr = 'September'; break;
                    case '10': $blnstr = 'Oktober'; break;
                    case '11': $blnstr = 'November'; break;
                    case '12': $blnstr = 'Desember'; break;
                    default: $blnstr = ''; break;
                }
            } else {
                return redirect()->back()->with('error', 'Masukkan bulan yang valid (angka 1-12)');
            }
        } else {
            $blnstr = '';
        }
        
        if(empty($thn) && !empty($trs)) {
            if(!empty($bln)) {
                return redirect()->back()->with('error', 'Pilih tahun terlebih dahulu');
            }
            if($trs == 'gs' || $trs == 'gabah' || $trs == 'alat' || $trs == 'beras' || $trs == 'bibit' || $trs == 'pupuk') {
                $data = DB::table('transaksi_barangs')
                            ->select('users.name as pembeli', 'transaksi_barangs.jumlah', 'transaksi_barangs.harga', 'transaksi_barangs.created_at', 'barangs.nama', 'barangs.jenis')
                            ->join('barangs', 'transaksi_barangs.barang_id', '=', 'barangs.id')
                            ->join('users', 'transaksi_barangs.user_id', '=', 'users.id')
                            ->where('transaksi_barangs.status', '1')
                            ->where('barangs.jenis', $trs)
                            ->get(); 
            } else {
                if($trs == 'gs') {
                    $data = DB::table('transaksi_sawahs')
                        ->select('users.name as pembeli', 'transaksi_sawahs.periode as jumlah', 'transaksi_sawahs.harga', 'transaksi_sawahs.created_at', 'sawahs.nama', DB::raw('("gadai sawah") as jenis'))
                        ->where('jenis', 'gs')
                        ->where('transaksi_sawahs.status', 'selesai')
                        ->join('sawahs', 'transaksi_sawahs.sawah_id', '=', 'sawahs.id')
                        ->join('users', 'sawahs.created_by', '=', 'users.id')
                        ->get();
                } else if($trs == 'gabah'){
                    $data = DB::table('transaksi_gabahs')
                        ->select('users.name as pembeli', 'transaksi_gabahs.jumlah', 'transaksi_gabahs.harga', 'transaksi_gabahs.created_at', 'gabahs.nama', DB::raw('("gabah") as jenis'))
                        ->join('gabahs', 'transaksi_gabahs.gabah_id', '=', 'gabahs.id')
                        ->join('users', 'transaksi_gabahs.user_id', '=', 'users.id')
                        ->where('transaksi_gabahs.status', '1')
                        ->get();
                } else {
                    return redirect()->back()->with('error', 'jenis transaksi yang Anda masukkan tidak valid');
                }
            }
        } else if (!empty($thn) && empty($trs)) {
            if(!empty($bln)) {
                $barang = DB::table('transaksi_barangs')
                        ->select('users.name as pembeli', 'transaksi_barangs.jumlah', 'transaksi_barangs.harga', 'transaksi_barangs.created_at', 'barangs.nama', 'barangs.jenis')
                        ->join('barangs', 'transaksi_barangs.barang_id', '=', 'barangs.id')
                        ->join('users', 'transaksi_barangs.user_id', '=', 'users.id')
                        ->where('transaksi_barangs.status', '1')
                        ->whereMonth('transaksi_barangs.created_at', $bln)
                        ->whereYear('transaksi_barangs.created_at', $thn)
                        ;
                $sawah = DB::table('transaksi_sawahs')
                        ->select('users.name as pembeli', 'transaksi_sawahs.periode as jumlah', 'transaksi_sawahs.harga', 'transaksi_sawahs.created_at', 'sawahs.nama', DB::raw('("gadai sawah") as jenis'))
                        ->where('jenis', 'gs')
                        ->where('transaksi_sawahs.status', 'selesai')
                        ->join('sawahs', 'transaksi_sawahs.sawah_id', '=', 'sawahs.id')
                        ->join('users', 'sawahs.created_by', '=', 'users.id')
                        ->whereMonth('transaksi_sawahs.created_at', $bln)
                        ->whereYear('transaksi_sawahs.created_at', $thn)
                        ;
                $gabah = DB::table('transaksi_gabahs')
                        ->select('users.name as pembeli', 'transaksi_gabahs.jumlah', 'transaksi_gabahs.harga', 'transaksi_gabahs.created_at', 'gabahs.nama', DB::raw('("gabah") as jenis'))
                        ->join('gabahs', 'transaksi_gabahs.gabah_id', '=', 'gabahs.id')
                        ->join('users', 'transaksi_gabahs.user_id', '=', 'users.id')
                        ->where('transaksi_gabahs.status', '1')
                        ->whereMonth('transaksi_gabahs.created_at', $bln)
                        ->whereYear('transaksi_gabahs.created_at', $thn)
                        ;
            } else {
                $barang = DB::table('transaksi_barangs')
                        ->select('users.name as pembeli', 'transaksi_barangs.jumlah', 'transaksi_barangs.harga', 'transaksi_barangs.created_at', 'barangs.nama', 'barangs.jenis')
                        ->join('barangs', 'transaksi_barangs.barang_id', '=', 'barangs.id')
                        ->join('users', 'transaksi_barangs.user_id', '=', 'users.id')
                        ->where('transaksi_barangs.status', '1')
                        ->whereYear('transaksi_barangs.created_at', $thn)
                        ;
                $sawah = DB::table('transaksi_sawahs')
                        ->select('users.name as pembeli', 'transaksi_sawahs.periode as jumlah', 'transaksi_sawahs.harga', 'transaksi_sawahs.created_at', 'sawahs.nama', DB::raw('("gadai sawah") as jenis'))
                        ->where('jenis', 'gs')
                        ->where('transaksi_sawahs.status', 'selesai')
                        ->join('sawahs', 'transaksi_sawahs.sawah_id', '=', 'sawahs.id')
                        ->join('users', 'sawahs.created_by', '=', 'users.id')
                        ->whereYear('transaksi_sawahs.created_at', $thn)
                        ;
                $gabah = DB::table('transaksi_gabahs')
                        ->select('users.name as pembeli', 'transaksi_gabahs.jumlah', 'transaksi_gabahs.harga', 'transaksi_sawahs.created_at', 'gabahs.nama', DB::raw('("gabah") as jenis'))
                        ->join('gabahs', 'transaksi_gabahs.gabah_id', '=', 'gabahs.id')
                        ->join('users', 'transaksi_gabahs.user_id', '=', 'users.id')
                        ->where('transaksi_gabahs.status', '1')
                        ->whereYear('transaksi_gabahs.created_at', $thn)
                        ;
            }
            $data = $barang->union($sawah)->union($gabah)->get();
            // return $data;
            
        } else if (!empty($thn) && !empty($trs)) {
            if($trs == 'gs' || $trs == 'gabah' || $trs == 'alat' || $trs == 'beras' || $trs == 'bibit' || $trs == 'pupuk') {
                    if(!empty($bln)) {
                        $arraybln = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"); 
                        if(in_array($bln, $arraybln)){
                            // return $bln;
                            if($trs == 'gs') {
                            $data = DB::table('transaksi_sawahs')
                            ->select('users.name as pembeli', 'transaksi_sawahs.periode as jumlah', 'transaksi_sawahs.harga', 'transaksi_sawahs.created_at', 'sawahs.nama', DB::raw('("gadai sawah") as jenis'))
                            ->where('jenis', 'gs')
                            ->where('transaksi_sawahs.status', 'selesai')
                            ->join('sawahs', 'transaksi_sawahs.sawah_id', '=', 'sawahs.id')
                            ->join('users', 'sawahs.created_by', '=', 'users.id')
                            ->whereMonth('transaksi_sawahs.created_at', $bln)
                            ->whereYear('transaksi_sawahs.created_at', $thn)
                            ->get();
                        } else if($trs == 'gabah') {
                            $data = DB::table('transaksi_gabahs')
                            ->select('users.name as pembeli', 'transaksi_gabahs.jumlah', 'transaksi_gabahs.harga', 'transaksi_gabahs.created_at', 'gabahs.nama', DB::raw('("gabah") as jenis'))
                            ->join('gabahs', 'transaksi_gabahs.gabah_id', '=', 'gabahs.id')
                            ->join('users', 'transaksi_gabahs.user_id', '=', 'users.id')
                            ->where('transaksi_gabahs.status', '1')
                            ->whereMonth('transaksi_gabahs.created_at', $bln)
                            ->whereYear('transaksi_gabahs.created_at', $thn)
                            ->get();
                        } else {
                            $data = DB::table('transaksi_barangs')
                            ->select('users.name as pembeli', 'transaksi_barangs.jumlah', 'transaksi_barangs.harga', 'transaksi_barangs.created_at', 'barangs.nama', 'barangs.jenis')
                            ->join('barangs', 'transaksi_barangs.barang_id', '=', 'barangs.id')
                            ->join('users', 'transaksi_barangs.user_id', '=', 'users.id')
                            ->where('transaksi_barangs.status', '1')
                            ->where('barangs.jenis', $trs)
                            ->whereMonth('transaksi_barangs.created_at', $bln)
                            ->whereYear('transaksi_barangs.created_at', $thn)
                            ->get(); 
                        }
                                
                    } else {
                        return redirect()->back()->with('error', 'Masukkan bulan yang valid (angka 1-12)');
                    }

                        
                    } else {
                        if($trs == 'gs') {
                            $data = DB::table('transaksi_sawahs')
                            ->select('users.name as pembeli', 'transaksi_sawahs.periode as jumlah', 'transaksi_sawahs.harga', 'transaksi_sawahs.created_at', 'sawahs.nama', DB::raw('("gadai sawah") as jenis'))
                            ->where('jenis', 'gs')
                            ->where('transaksi_sawahs.status', 'selesai')
                            ->join('sawahs', 'transaksi_sawahs.sawah_id', '=', 'sawahs.id')
                            ->join('users', 'sawahs.created_by', '=', 'users.id')
                            ->whereYear('transaksi_sawahs.created_at', $thn)
                            ->get();
                        } else if($trs == 'gabah'){
                            $data = DB::table('transaksi_gabahs')
                            ->select('users.name as pembeli', 'transaksi_gabahs.jumlah', 'transaksi_gabahs.harga', 'transaksi_gabahs.created_at', 'gabahs.nama', DB::raw('("gabah") as jenis'))
                            ->join('gabahs', 'transaksi_gabahs.gabah_id', '=', 'gabahs.id')
                            ->join('users', 'transaksi_gabahs.user_id', '=', 'users.id')
                            ->where('transaksi_gabahs.status', '1')
                            ->whereYear('transaksi_gabahs.created_at', $thn)
                            ->get();
                        } else {
                            $data = DB::table('transaksi_barangs')
                            ->select('users.name as pembeli', 'transaksi_barangs.jumlah', 'transaksi_barangs.harga', 'transaksi_barangs.created_at', 'barangs.nama', 'barangs.jenis')
                            ->join('barangs', 'transaksi_barangs.barang_id', '=', 'barangs.id')
                            ->join('users', 'transaksi_barangs.user_id', '=', 'users.id')
                            ->where('transaksi_barangs.status', '1')
                            ->where('barangs.jenis', $trs)
                            ->whereYear('transaksi_barangs.created_at', $thn)
                            ->get(); 
                        } 
                    } // jika kosong
            } else {
                return redirect()->back()->with('error', 'jenis transaksi yang Anda masukkan tidak valid');
            }
        } else {
            if(!empty($bln)) {
                return redirect()->back()->with('error', 'Pilih tahun terlebih dahulu');
            }
            $barang     = DB::table('transaksi_barangs')
                        ->select('users.name as pembeli', 'transaksi_barangs.jumlah', 'transaksi_barangs.harga', 'transaksi_barangs.created_at', 'barangs.nama', 'barangs.jenis')
                        ->join('barangs', 'transaksi_barangs.barang_id', '=', 'barangs.id')
                        ->join('users', 'transaksi_barangs.user_id', '=', 'users.id')
                        ->where('transaksi_barangs.status', '1');

            $sawah     = DB::table('transaksi_sawahs')
                        ->select('users.name as pembeli', 'transaksi_sawahs.periode as jumlah', 'transaksi_sawahs.harga', 'transaksi_sawahs.created_at', 'sawahs.nama', DB::raw('("gadai sawah") as jenis'))
                        ->where('jenis', 'gs')
                        ->where('transaksi_sawahs.status', 'selesai')
                        ->join('sawahs', 'transaksi_sawahs.sawah_id', '=', 'sawahs.id')
                        ->join('users', 'sawahs.created_by', '=', 'users.id');

            $gabah     = DB::table('transaksi_gabahs')
                        ->select('users.name as pembeli', 'transaksi_gabahs.jumlah', 'transaksi_gabahs.harga', 'transaksi_gabahs.created_at', 'gabahs.nama', DB::raw('("gabah") as jenis'))
                        ->join('gabahs', 'transaksi_gabahs.gabah_id', '=', 'gabahs.id')
                        ->join('users', 'transaksi_gabahs.user_id', '=', 'users.id')
                        ->where('transaksi_gabahs.status', '1');

            $data = $barang->union($sawah)->union($gabah)->get();   
        }
        // return $data;
        return Excel::download(new ExcelExport($data), 'siswa.xlsx');
        // return $data;
        $pdf = PDF::loadView('pdf', [
            'data' => $data,
            'thn'   => $thn,
            'bln'   => $blnstr
        ]);  
        return $pdf->download('galung-app.pdf');

        return view('pdf', [
            'data' => $data,
            'thn'  => $thn,
            'bln'  => $blnstr
        ]);
    }

    public function index(Request $request) // menampilkan halaman
    {
        $jml = $request->get('jumlah');
        $trs = $request->get('transaksi');
        $thn = $request->get('tahun');
        $bln = $request->get('bulan');
        $tahungabah = DB::table('transaksi_gabahs')
                    ->where('status', '1')
                    ->selectRaw('YEAR(created_at) as year')
                    ->distinct();
        $tahunbarang = DB::table('transaksi_barangs')
                    ->where('status', '1')
                    ->selectRaw('YEAR(created_at) as year')
                    ->distinct();
        $tahunsawah = DB::table('transaksi_sawahs')
                    ->where('status', 'selesai')
                    ->selectRaw('YEAR(created_at) as year')
                    ->distinct();
        $tahun = $tahungabah->union($tahunbarang)->union($tahunsawah)->distinct()->get();

        if(empty($thn) && !empty($trs)) {
            if(!empty($bln)) {
                return redirect()->back()->with('error', 'Pilih tahun terlebih dahulu');
            }
                if(!empty($jml)) {
                    if($jml < 100) {
                        $jml = $jml;
                    } else {
                        $jml = 100;
                    }   
                } else {
                    $jml = 100;
                }

            if($trs == 'gs' || $trs == 'gabah' || $trs == 'alat' || $trs == 'beras' || $trs == 'bibit' || $trs == 'pupuk') {
                $data = DB::table('transaksi_barangs')
                            ->select('users.name as pembeli', 'transaksi_barangs.jumlah', 'transaksi_barangs.harga', 'barangs.nama', 'barangs.jenis')
                            ->join('barangs', 'transaksi_barangs.barang_id', '=', 'barangs.id')
                            ->join('users', 'transaksi_barangs.user_id', '=', 'users.id')
                            ->where('transaksi_barangs.status', '1')
                            ->where('barangs.jenis', $trs)
                            ->paginate($jml); 
            } else {
                if($trs == 'gs') {
                    $data = DB::table('transaksi_sawahs')
                        ->select('users.name as pembeli', 'transaksi_sawahs.periode as jumlah', 'transaksi_sawahs.harga', 'sawahs.nama', DB::raw('("gadai sawah") as jenis'))
                        ->where('jenis', 'gs')
                        ->where('transaksi_sawahs.status', 'selesai')
                        ->join('sawahs', 'transaksi_sawahs.sawah_id', '=', 'sawahs.id')
                        ->join('users', 'sawahs.created_by', '=', 'users.id')
                        ->paginate($jml);
                } else if($trs == 'gabah'){
                    $data = DB::table('transaksi_gabahs')
                        ->select('users.name as pembeli', 'transaksi_gabahs.jumlah', 'transaksi_gabahs.harga', 'gabahs.nama', DB::raw('("gabah") as jenis'))
                        ->join('gabahs', 'transaksi_gabahs.gabah_id', '=', 'gabahs.id')
                        ->join('users', 'transaksi_gabahs.user_id', '=', 'users.id')
                        ->where('transaksi_gabahs.status', '1')
                        ->paginate($jml);
                } else {
                    return redirect()->back()->with('error', 'jenis transaksi yang Anda masukkan tidak valid');
                }
            }
        } else if (!empty($thn) && empty($trs)) {
            if(!empty($bln)) {
                $barang = DB::table('transaksi_barangs')
                        ->select('users.name as pembeli', 'transaksi_barangs.jumlah', 'transaksi_barangs.harga', 'barangs.nama', 'barangs.jenis')
                        ->join('barangs', 'transaksi_barangs.barang_id', '=', 'barangs.id')
                        ->join('users', 'transaksi_barangs.user_id', '=', 'users.id')
                        ->where('transaksi_barangs.status', '1')
                        ->whereMonth('transaksi_barangs.created_at', $bln)
                        ->whereYear('transaksi_barangs.created_at', $thn)
                        ;
                $sawah = DB::table('transaksi_sawahs')
                        ->select('users.name as pembeli', 'transaksi_sawahs.periode as jumlah', 'transaksi_sawahs.harga', 'sawahs.nama', DB::raw('("gadai sawah") as jenis'))
                        ->where('jenis', 'gs')
                        ->where('transaksi_sawahs.status', 'selesai')
                        ->join('sawahs', 'transaksi_sawahs.sawah_id', '=', 'sawahs.id')
                        ->join('users', 'sawahs.created_by', '=', 'users.id')
                        ->whereMonth('transaksi_sawahs.created_at', $bln)
                        ->whereYear('transaksi_sawahs.created_at', $thn)
                        ;
                $gabah = DB::table('transaksi_gabahs')
                        ->select('users.name as pembeli', 'transaksi_gabahs.jumlah', 'transaksi_gabahs.harga', 'gabahs.nama', DB::raw('("gabah") as jenis'))
                        ->join('gabahs', 'transaksi_gabahs.gabah_id', '=', 'gabahs.id')
                        ->join('users', 'transaksi_gabahs.user_id', '=', 'users.id')
                        ->where('transaksi_gabahs.status', '1')
                        ->whereMonth('transaksi_gabahs.created_at', $bln)
                        ->whereYear('transaksi_gabahs.created_at', $thn)
                        ;
            } else {
                $barang = DB::table('transaksi_barangs')
                        ->select('users.name as pembeli', 'transaksi_barangs.jumlah', 'transaksi_barangs.harga', 'barangs.nama', 'barangs.jenis')
                        ->join('barangs', 'transaksi_barangs.barang_id', '=', 'barangs.id')
                        ->join('users', 'transaksi_barangs.user_id', '=', 'users.id')
                        ->where('transaksi_barangs.status', '1')
                        ->whereYear('transaksi_barangs.created_at', $thn)
                        ;
                $sawah = DB::table('transaksi_sawahs')
                        ->select('users.name as pembeli', 'transaksi_sawahs.periode as jumlah', 'transaksi_sawahs.harga', 'sawahs.nama', DB::raw('("gadai sawah") as jenis'))
                        ->where('jenis', 'gs')
                        ->where('transaksi_sawahs.status', 'selesai')
                        ->join('sawahs', 'transaksi_sawahs.sawah_id', '=', 'sawahs.id')
                        ->join('users', 'sawahs.created_by', '=', 'users.id')
                        ->whereYear('transaksi_sawahs.created_at', $thn)
                        ;
                $gabah = DB::table('transaksi_gabahs')
                        ->select('users.name as pembeli', 'transaksi_gabahs.jumlah', 'transaksi_gabahs.harga', 'gabahs.nama', DB::raw('("gabah") as jenis'))
                        ->join('gabahs', 'transaksi_gabahs.gabah_id', '=', 'gabahs.id')
                        ->join('users', 'transaksi_gabahs.user_id', '=', 'users.id')
                        ->where('transaksi_gabahs.status', '1')
                        ->whereYear('transaksi_gabahs.created_at', $thn)
                        ;
            }
            
            if(!empty($jml)) {
                    if($jml < 100) {
                        $jml = $jml;
                    } else {
                        $jml = 100;
                    }   
            } else {
                    $jml = 100;
            }
            $data = $barang->union($sawah)->union($gabah)->paginate($jml);
            // return $data;
            
        } else if (!empty($thn) && !empty($trs)) {
                if(!empty($jml)) {
                    if($jml < 100) {
                        $jml = $jml;
                    } else {
                        $jml = 100;
                    }   
                } else {
                    $jml = 100;
                }

            if($trs == 'gs' || $trs == 'gabah' || $trs == 'alat' || $trs == 'beras' || $trs == 'bibit' || $trs == 'pupuk') {
                    if(!empty($bln)) {
                        $arraybln = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12");
                        // if($bln == '1' || $bln == '2' || $bln == '3' || $bln == '4' || $bln == '5' || $bln == '6' || $bln == '7' || $bln == '8' || $bln == '9' || $bln == '10' || $bln == '11' || $bln == '12') 
                        if(in_array($bln, $arraybln)){
                            // return $bln;
                            if($trs == 'gs') {
                            $data = DB::table('transaksi_sawahs')
                            ->select('users.name as pembeli', 'transaksi_sawahs.periode as jumlah', 'transaksi_sawahs.harga', 'sawahs.nama', DB::raw('("gadai sawah") as jenis'))
                            ->where('jenis', 'gs')
                            ->where('transaksi_sawahs.status', 'selesai')
                            ->join('sawahs', 'transaksi_sawahs.sawah_id', '=', 'sawahs.id')
                            ->join('users', 'sawahs.created_by', '=', 'users.id')
                            ->whereMonth('transaksi_sawahs.created_at', $bln)
                            ->whereYear('transaksi_sawahs.created_at', $thn)
                            ->paginate($jml);
                        } else if($trs == 'gabah') {
                            $data = DB::table('transaksi_gabahs')
                            ->select('users.name as pembeli', 'transaksi_gabahs.jumlah', 'transaksi_gabahs.harga', 'gabahs.nama', DB::raw('("gabah") as jenis'))
                            ->join('gabahs', 'transaksi_gabahs.gabah_id', '=', 'gabahs.id')
                            ->join('users', 'transaksi_gabahs.user_id', '=', 'users.id')
                            ->where('transaksi_gabahs.status', '1')
                            ->whereMonth('transaksi_gabahs.created_at', $bln)
                            ->whereYear('transaksi_gabahs.created_at', $thn)
                            ->paginate($jml);
                        } else {
                            $data = DB::table('transaksi_barangs')
                            ->select('users.name as pembeli', 'transaksi_barangs.jumlah', 'transaksi_barangs.harga', 'barangs.nama', 'barangs.jenis')
                            ->join('barangs', 'transaksi_barangs.barang_id', '=', 'barangs.id')
                            ->join('users', 'transaksi_barangs.user_id', '=', 'users.id')
                            ->where('transaksi_barangs.status', '1')
                            ->where('barangs.jenis', $trs)
                            ->whereMonth('transaksi_barangs.created_at', $bln)
                            ->whereYear('transaksi_barangs.created_at', $thn)
                            ->paginate($jml); 
                        }
                                
                    } else {
                        return redirect()->back()->with('error', 'Masukkan bulan yang valid (angka 1-12)');
                    }

                        
                    } else {
                        if($trs == 'gs') {
                            $data = DB::table('transaksi_sawahs')
                            ->select('users.name as pembeli', 'transaksi_sawahs.periode as jumlah', 'transaksi_sawahs.harga', 'sawahs.nama', DB::raw('("gadai sawah") as jenis'))
                            ->where('jenis', 'gs')
                            ->where('transaksi_sawahs.status', 'selesai')
                            ->join('sawahs', 'transaksi_sawahs.sawah_id', '=', 'sawahs.id')
                            ->join('users', 'sawahs.created_by', '=', 'users.id')
                            ->whereYear('transaksi_sawahs.created_at', $thn)
                            ->paginate($jml);
                        } else if($trs == 'gabah'){
                            $data = DB::table('transaksi_gabahs')
                            ->select('users.name as pembeli', 'transaksi_gabahs.jumlah', 'transaksi_gabahs.harga', 'gabahs.nama', DB::raw('("gabah") as jenis'))
                            ->join('gabahs', 'transaksi_gabahs.gabah_id', '=', 'gabahs.id')
                            ->join('users', 'transaksi_gabahs.user_id', '=', 'users.id')
                            ->where('transaksi_gabahs.status', '1')
                            ->whereYear('transaksi_gabahs.created_at', $thn)
                            ->paginate($jml);
                        } else {
                            $data = DB::table('transaksi_barangs')
                            ->select('users.name as pembeli', 'transaksi_barangs.jumlah', 'transaksi_barangs.harga', 'barangs.nama', 'barangs.jenis')
                            ->join('barangs', 'transaksi_barangs.barang_id', '=', 'barangs.id')
                            ->join('users', 'transaksi_barangs.user_id', '=', 'users.id')
                            ->where('transaksi_barangs.status', '1')
                            ->where('barangs.jenis', $trs)
                            ->whereYear('transaksi_barangs.created_at', $thn)
                            ->paginate($jml); 
                        } 
                    } // jika kosong
            } else {
                return redirect()->back()->with('error', 'jenis transaksi yang Anda masukkan tidak valid');
            }
        } else {
            $barang     = DB::table('transaksi_barangs')
                        ->select('users.name as pembeli', 'transaksi_barangs.jumlah', 'transaksi_barangs.harga', 'barangs.nama', 'barangs.jenis')
                        ->join('barangs', 'transaksi_barangs.barang_id', '=', 'barangs.id')
                        ->join('users', 'transaksi_barangs.user_id', '=', 'users.id')
                        ->where('transaksi_barangs.status', '1');

            $sawah     = DB::table('transaksi_sawahs')
                        ->select('users.name as pembeli', 'transaksi_sawahs.periode as jumlah', 'transaksi_sawahs.harga', 'sawahs.nama', DB::raw('("gadai sawah") as jenis'))
                        ->where('jenis', 'gs')
                        ->where('transaksi_sawahs.status', 'selesai')
                        ->join('sawahs', 'transaksi_sawahs.sawah_id', '=', 'sawahs.id')
                        ->join('users', 'sawahs.created_by', '=', 'users.id');

            $gabah     = DB::table('transaksi_gabahs')
                        ->select('users.name as pembeli', 'transaksi_gabahs.jumlah', 'transaksi_gabahs.harga', 'gabahs.nama', DB::raw('("gabah") as jenis'))
                        ->join('gabahs', 'transaksi_gabahs.gabah_id', '=', 'gabahs.id')
                        ->join('users', 'transaksi_gabahs.user_id', '=', 'users.id')
                        ->where('transaksi_gabahs.status', '1');
            if(!empty($jml)) {
                if($jml < 100) {
                    $jml = $jml;
                } else {
                    $jml = 100;
                }   
            } else {
                $jml = 100;
            }
            $data = $barang->union($sawah)->union($gabah)->paginate($jml);   
        }
    	// return $data;
    	return view('admin.page.laporan', [
            'data' => $data, 
            'tahun' => $tahun
        ]);
    }

}
