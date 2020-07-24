<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GadaiSawah;
use Auth;

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
            ->paginate(10);
        $jml = GadaiSawah::where('status', 'gadai')
            ->with('admins:id,name')
            ->with('sawahs', 'sawahs.alamats:id,tipe,nama_kota', 'sawahs.users:id,name')
            ->count();

        // return $data; // uncomment ini untuk melihat data 
        return view('admin.page.sedang-tergadai', ['data' => $data, 'jml' => $jml]); //struktur folder di folder views

    }

    public function daftargadai() //menampilkan hal. data mendaftarkan sawah untuk digadai 
    {
        $data = GadaiSawah::where('status', null)
            ->with('admins:id,name')
            ->with('sawahs', 'sawahs.alamats:id,tipe,nama_kota', 'sawahs.users:id,name')
            ->paginate(10);
        $jml = GadaiSawah::where('status', null)
            ->with('admins:id,name')
            ->with('sawahs', 'sawahs.alamats:id,tipe,nama_kota', 'sawahs.users:id,name')
            ->count();

        // return $data; // uncomment ini untuk melihat data 
        return view('admin.page.gadai-unverif', ['data' => $data, 'jml' => $jml]); //struktur folder di folder views

    }

    public function riwayatgadai() //menampilkan hal. data riwayat gadai sawah
    {
        $data = GadaiSawah::where('status', 'selesai')
            ->with('admins:id,name')
            ->with('sawahs', 'sawahs.alamats:id,tipe,nama_kota', 'sawahs.users:id,name')
            ->paginate(10);
        $jml = GadaiSawah::where('status', 'selesai')
            ->with('admins:id,name')
            ->with('sawahs', 'sawahs.alamats:id,tipe,nama_kota', 'sawahs.users:id,name')
            ->count();

        // return $data; // uncomment ini untuk melihat data 
        return view('admin.page.riwayat-gadai', ['data' => $data, 'jml' => $jml]); //struktur folder di folder views

    }

    public function gadaistatus($id) //ganti status dari null (daftar gadai) menjadi sedang gadai 
    {
        $data = GadaiSawah::findOrFail($id);
        $data->status = 'gadai';
        $data->admin_by = Auth::guard('admin')->user()->id;
        $data->save();
        // return 'Gadai Done';
        return redirect()->back()->with('success', 'Berhasil ! Sawah ini sekarang sedang digadai');
    }

    public function selesaistatus($id) //ganti status dari null (daftar gadai) menjadi sedang gadai 
    {
        $data = GadaiSawah::findOrFail($id);
        $data->status = 'selesai';
        $data->admin_by = Auth::guard('admin')->user()->id;
        $data->save();
        // return 'Data Berpindah ke Riwayat';
        return redirect()->back()->with('success', 'Berhasil ! Waktu gadai sawah ini telah berakhir silakan lihat datanya pada tab Riwayat Gadai');
    }
}
