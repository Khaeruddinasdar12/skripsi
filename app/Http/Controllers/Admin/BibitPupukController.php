<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BibitPupukController extends Controller
{
    public function index() //menampilkan hal. data bibit-pupuk
    {
    	return view(''); //struktur folder di folder views
    	/*
    	syntax
    	return view('namafolder.namafile');
    	*/
    }

    public function transaksi() //menampilkan hal. data transaksi bibit-pupuk
    {
    	return view(''); //struktur folder di folder views
    	/*
    	syntax
    	return view('namafolder.namafile');
    	*/
    }
}
