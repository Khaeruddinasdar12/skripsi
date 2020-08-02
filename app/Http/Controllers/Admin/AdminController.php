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

	public function store(Request $request)
	{
		$validasi = $this->validate($request, [
			'name'      => 'required|string',
			'email'     => 'required|string|email|max:255|unique:users',
			'password'  => 'required|string|min:8|confirmed',
			'role' 		=> 'required|string'
		]);

		$admin = User::create([
			'name' => $request->get('name'),
			'email' => $request->get('email'),
			'password' => Hash::make($request->get('password')),
			'role' => $request->get('role'),
		]);

		return redirect()->back()->with('success', 'Berhasil menambah data admin');
	}

	public function update(Request $request, $id)
	{
		$validasi = $this->validate($request, [
			'name'      => 'required|string',
			'role' 		=> 'required|string'
		]);

		$admin = Admin::findOrFail($id);
		$admin->name = $request->get('name');
		$admin->role = $request->get('role');
		$admin->save();

		return redirect()->back()->with('success', 'Berhasil mengubah data admin');
	}

	public function delete($id)
	{
	}
}
