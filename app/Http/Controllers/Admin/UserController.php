<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function index() //menampilkan hal. data admin
	{
		return view('admin.page.user'); //struktur folder di folder views
		/*
    	syntax
    	return view('namafolder.namafile');
    	*/
	}
}
