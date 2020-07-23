<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
	}

	public function index() //menampilkan hal. data user
	{
		$admin = Admin::all();
		// return $admin; // uncomment ini untuk melihat api data admin
		return view('admin.page.admin', ['admin' => $admin]); //struktur folder di folder views
		/*
    	syntax
    	return view('namafolder.namafile');
    	*/
	}

	public function update($id)  
	{

	}

	public function delete($id)  
	{
		
	}
}
