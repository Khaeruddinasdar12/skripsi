<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Beras;
use Auth;
class BerasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() //menampilkan hal. data beras
    {
        $data = Beras::;
    	return view(''); //struktur folder di folder views
    	/*
    	syntax
    	return view('namafolder.namafile');
    	*/
    }

    public function store(Request $request) //menambah data beras
    {
        $validasi = $this->validate($request, [
            'nama'      => 'required|string',
            'harga'     => 'required|numeric',
            'min_beli'  => 'required|numeric',
            'stok'      => 'required|numeric',
            'deskripsi' => 'required|string',
            'gambar'    => 'image|mimes:jpeg,png,jpg|max:3072'
        ]);

        $data = new Sawah;
        $data->nama         = $request->get('nama');
        $data->harga        = $request->get('harga');
        $data->min_beli     = $request->get('min_beli');
        $data->stok         = $request->get('stok');
        $data->deskripsi    = $request->get('deskripsi');
        $data->admin_by     = Auth::guard('admin')->user()->id;

        $gambar = $request->file('gambar');
        if($gambar) {
            $gambar_path = $gambar->store('gambar', 'public');
            $data->gambar = $gambar_path;
        }
        $data->save();
        return redirect()->back()->with('success', 'Berhasil menghapus data petani');
    }

    public function update(Request $request, $id) //mengubah atau suplly data beras
    {
        $validasi = $this->validate($request, [
            'nama'      => 'required|string',
            'harga'     => 'required|numeric',
            'min_beli'  => 'required|numeric',
            'stok'      => 'required|numeric',
            'deskripsi' => 'required|string',
            'gambar'    => 'image|mimes:jpeg,png,jpg|max:3072'
        ]);

        $data = Sawah::findOrFail($id);
        $data->nama         = $request->get('nama');
        $data->harga        = $request->get('harga');
        $data->min_beli     = $request->get('min_beli');
        $data->stok         = $request->get('stok');
        $data->deskripsi    = $request->get('deskripsi');
        $data->admin_by     = Auth::guard('admin')->user()->id;

        $gambar = $request->file('gambar');
        if($gambar) {
            if($data->gambar && file_exists(storage_path('app/public/' . $data->gambar))) { 
                \Storage::delete('public/'. $data->gambar);
            }
            $gambar_path = $gambar->store('gambar', 'public');
            $data->gambar = $gambar_path;
        }
        $data->save();
        return redirect()->back()->with('success', 'Berhasil mengubah data beras');
    }

    public function delete($id)
    {
        $data = Beras::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data beras');
    }

    public function transaksi() //menampilkan hal. data transaksi beras
    {
    	return view(''); //struktur folder di folder views
    	/*
    	syntax
    	return view('namafolder.namafile');
    	*/
    }
}
