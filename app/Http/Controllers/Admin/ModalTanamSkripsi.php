<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TransaksiLahan;
class ModalTanamSkripsi extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function daftar(Request $request) //menampilkan hal. data mendaftarkan sawah untuk digadai sebagai modal tanam
    {
        //mengurutkan dari terbaru ke terlama (descending)
        if($request->get('search') != '') {
            $data = TransaksiLahan::where('jenis', 'mt')
            ->where('status', null)
            ->with('users:id,name')
            ->whereHas('users',function ($query) use ($request) {
                $query->where('name', 'like', '%'.$request->get('search').'%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        } else {
            $data = TransaksiLahan::where('jenis', 'mt')
            ->where('status', null)
            ->with('users:id,name')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        }
        
        $jml = TransaksiLahan::where('jenis', 'mt')
            ->where('status', null)->count();

        // return $data; // uncomment ini untuk melihat data 
        return view('admin.page.modal.daftar', ['data' => $data, 'jml' => $jml]);
    }

    public function sedanggadai(Request $request) //menampilkan hal. data yang sedang menggadai sawahnya sebagai modal tanam
    {
        //mengurutkan dari terbaru ke terlama (descending)
        if($request->get('search') != '') {
            $data = TransaksiLahan::where('jenis', 'mt')
                ->where('status', 'gadai')
                ->with('admins:id,name')
                ->with('users:id,name')
                ->whereHas('users',function ($query) use ($request) {
                    $query->where('name', 'like', '%'.$request->get('search').'%');
                })
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        } else {
            $data = TransaksiLahan::where('jenis', 'mt')
                ->where('status', 'gadai')
                ->with('admins:id,name')
                ->with('users:id,name')
                ->orderBy('status_at', 'desc')
                ->paginate(10);
        }
        $jml = TransaksiLahan::where('jenis', 'mt')
            ->where('status', 'gadai')
            ->count();

        // return $data; // uncomment ini untuk melihat data 
        return view('admin.page.modal.sedang-tergadai', ['data' => $data, 'jml' => $jml]);
    }

    public function riwayatgadai(Request $request) //menampilkan hal. data riwayat gadai sawah sebagai modal tanam
    {
        //mengurutkan dari terbaru ke terlama (descending)
        if($request->get('search') != '') {
            $data = TransaksiLahan::where('jenis', 'mt')
                ->where('status', 'selesai')
                ->with('users:id,name')
                ->with('admins:id,name')
                ->whereHas('users',function ($query) use ($request) {
                    $query->where('name', 'like', '%'.$request->get('search').'%');
                })
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        } else {
            $data = TransaksiLahan::where('jenis', 'mt')
                ->where('status', 'selesai')
                ->with('admins:id,name')
                ->with('users:id,name')
                ->orderBy('status_at', 'desc')
                ->paginate(10);
        }
        $jml = TransaksiLahan::where('jenis', 'mt')
            ->where('status', 'selesai')
            ->count();

        // return $data; // uncomment ini untuk melihat data 
        return view('admin.page.modal.riwayat-modal', ['data' => $data, 'jml' => $jml]);
    }
}
