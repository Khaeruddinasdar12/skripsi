<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GadaiSawahController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index() //menampilkan hal. data gadai sawah
    {
    	return view(''); //struktur folder di folder views
    	/*
    	syntax
    	return view('namafolder.namafile');
    	*/
    }
}
