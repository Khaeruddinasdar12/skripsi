<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModalTanamController extends Controller
{
    public function index() //menampilkan hal. data modal tanam
    {
    	return view(''); //struktur folder di folder views
    	/*
    	syntax
    	return view('namafolder.namafile');
    	*/
    }
}
