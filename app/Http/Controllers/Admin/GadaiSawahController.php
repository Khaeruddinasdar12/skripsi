<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GadaiSawah;

class GadaiSawahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function sedanggadai() //menampilkan hal. data yang sedang menggadai sawahnya
    {
        $data = GadaiSawah::where('status', 'gadai')
            ->with('admins:id,name')
            ->with('sawahs', 'sawahs.alamats:id,tipe,nama_kota', 'sawahs.users:id,name')
            ->get();

        // return $data; // uncomment ini untuk melihat data 
        return view('admin.page.sedang-tergadai', ['data' => $data]); //struktur folder di folder views

    }

    public function daftargadai() //menampilkan hal. data mendaftarkan sawah untuk digadai 
    {
        $data = GadaiSawah::where('status', null)
            ->with('admins:id,name')
            ->with('sawahs', 'sawahs.alamats:id,tipe,nama_kota', 'sawahs.users:id,name')
            ->get();

        // return $data; // uncomment ini untuk melihat data 
        return view('admin.page.gadai-unverif', ['data' => $data]); //struktur folder di folder views

    }

    public function riwayatgadai() //menampilkan hal. data riwayat gadai sawah
    {
        $data = GadaiSawah::where('status', 'selesai')
            ->with('admins:id,name')
            ->with('sawahs', 'sawahs.alamats:id,tipe,nama_kota', 'sawahs.users:id,name')
            ->get();

        // return $data; // uncomment ini untuk melihat data 
        return view('admin.page.riwayat-gadai', ['data' => $data]); //struktur folder di folder views

    }
}
