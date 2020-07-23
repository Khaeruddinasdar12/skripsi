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

    public function index() //menampilkan hal. data gadai sawah yang belum terverifikasi
    {
        $id = 1;
        $data = GadaiSawah::where('admin_verified', $id)
            ->with('users:id,name')
            ->with('admins:id,name')
            ->with('sawahs:id,kecamatan')
            ->get();

        return $data;
        return view('admin.page.gadai-sawah'); //struktur folder di folder views

    }
}
