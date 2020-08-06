<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ALat;
class AlatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() //menampilkan hal. data alat
    {
        //mengurutkan dari terbaru ke terlama (descending)
        $data   = Alat::orderBy('created_at', 'desc')->paginate(10);
        $jml    = Alat::count();
        // return $data; // uncomment ini untuk melihat data

    	return view('', ['data' => $data, 'jml' => $jml]); //struktur folder di folder views
    	/*
    	syntax
    	return view('namafolder.namafile');
    	*/
    }

    public function store(Request $request) //menambah data alat
    {
        $validasi = $this->validate($request, [
            'nama'          => 'required|string',
            'harga'         => 'required|numeric',
            'stok'          => 'required|numeric'
        ]);

        $alat = Alat::create([
            'nama'  => $request->get('nama'), 
            'stok'  => $request->get('stok'),
            'harga' => $request->get('harga'),
            'admin_id'  => Auth::guard('admin')->user()->id
            ]);

        return redirect()->back()->with('success', 'Berhasil menambah data alat');
    }

    public function update(Request $request, $id) //mengubah data alat
    {
        $validasi = $this->validate($request, [
            'nama'          => 'required|string',
            'harga'         => 'required|numeric',
            'stok'          => 'required|numeric'
        ]);

        $alat = Alat::findOrFail($id);
        $alat->nama    = $request->get('nama');
        $alat->stok    = $request->get('stok');
        $alat->harga   = $request->get('harga');
        $alat->admin_id= Auth::guard('admin')->user()->id;
        $alat->save();

        return redirect()->back()->with('success', 'Berhasil mengubah data alat');
    }

    public function delete($id) //menghapus data alat
    {
        $data = ALat::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Berhasil mengahapus data alat');
    }
}
