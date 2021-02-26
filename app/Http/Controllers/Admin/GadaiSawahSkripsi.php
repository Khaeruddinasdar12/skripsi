<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TransaksiLahan;
class GadaiSawahSkripsi extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function daftar(Request $request) //menampilkan hal. data mendaftarkan lahan untuk digadai 
    {
        //mengurutkan dari terbaru ke terlama (descending)
        if($request->get('search') != '') {
            $data = TransaksiLahan::where('jenis', 'gs')
            ->where('status', null)
            ->with('users:id,name,foto_ktp,nohp')
            ->whereHas('users', function ($query) use ($request) {
                $query->where('name', 'like', '%'.$request->get('search').'%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        } else {
            $data = TransaksiLahan::where('jenis', 'gs')
            ->where('status', null)
            ->with('users:id,name,foto_ktp,nohp')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        }
        
        $jml = TransaksiLahan::where('jenis', 'gs')
            ->where('status', null)->count();

        // return $data; // uncomment ini untuk melihat data 
        return view('admin.page.gadai.daftar', ['data' => $data, 'jml' => $jml]); //struktur folder di folder views

    }

    public function sedanggadai(Request $request) //menampilkan hal. data yang sedang menggadai sawahnya
    {
        //mengurutkan dari terbaru ke terlama (descending)
        if($request->get('search')) {
            $data = TransaksiLahan::where('jenis', 'gs')
            ->where('status', 'gadai')
            ->with('admins:id,name')
            ->with('users:id,name')
            ->whereHas('users',function ($query) use ($request) {
                $query->where('name', 'like', '%'.$request->get('search').'%');
            })
            ->orderBy('status_at', 'desc')
            ->paginate(10);
        } else {
            $data = TransaksiLahan::where('jenis', 'gs')
            ->where('status', 'gadai')
            ->with('admins:id,name')
            ->with('users:id,name')
            ->orderBy('status_at', 'desc')
            ->paginate(10);
        }
        
        $jml = TransaksiLahan::where('jenis', 'gs')
            ->where('status', 'gadai')
            ->count();

        // return $data; // uncomment ini untuk melihat data 
        return view('admin.page.gadai.sedang-tergadai', ['data' => $data, 'jml' => $jml]); //struktur folder di folder views

    }

    public function riwayatgadai(Request $request) //menampilkan hal. data riwayat gadai sawah
    {
        if($request->get('search') != '') {
            $data = TransaksiLahan::where('jenis', 'gs')
            ->where('status', 'selesai')
            ->with('admins:id,name')
            ->with('users:id,name')
            ->whereHas('users',function ($query) use ($request) {
                $query->where('name', 'like', '%'.$request->get('search').'%');
            })
            ->paginate(10);
        } else {
            $data = TransaksiLahan::where('jenis', 'gs')
            ->where('status', 'selesai')
            ->with('admins:id,name')
            ->with('users:id,name')
            ->orderBy('status_at', 'desc')
            ->paginate(10);
        }
        //mengurutkan dari terbaru ke terlama (descending)
        
        $jml = TransaksiLahan::where('jenis', 'gs')
            ->where('status', 'selesai')
            ->count();

        // return $data; // uncomment ini untuk melihat data 
        return view('admin.page.gadai.riwayat-gadai', ['data' => $data, 'jml' => $jml]); //struktur folder di folder views

    }
}
