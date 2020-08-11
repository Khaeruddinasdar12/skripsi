<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ModalTanam;
use Auth;
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

    public function store(Request $request) //menambah data modal tanam
    {
 		$data = new ModalTanam;
    }
}
