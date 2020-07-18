<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GabahController extends Controller
{
    public function index() //menampilkan hal. data gabah
    {
    	return view(''); //struktur folder di folder views
    	/*
    	syntax
    	return view('namafolder.namafile');
    	*/
    }

    public function transaksi() // menampilkan hal. data transaksi gabah
    {
    	return view(''); //struktur folder di folder views
    	/*
    	syntax
    	return view('namafolder.namafile');
    	*/
    }
}
