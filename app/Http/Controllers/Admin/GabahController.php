<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gabah;
class GabahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() //menampilkan hal. data gabah
    {
        $data = Gabah::paginate(10);
    	return view('', ['data' => $data]); //struktur folder di folder views
    	/*
    	syntax
    	return view('namafolder.namafile');
    	*/
    }

    public function store(Request $request) //menambah data gabah
    {
        $validasi = $this->validate($request, [
            'name'          => 'required|string',
            'tempat_lahir'  => 'required|string'
        ]);

        $user = Gabah::create([
            'jenis'  => $request->get('jenis'), 
            'harga' => $request->get('harga'), //per KG
            'admin_by'  => Auth::guard('admin')->user()->id
            ]);

        return redirect()->back()->with('success', 'Berhasil menambah data gabah');
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
