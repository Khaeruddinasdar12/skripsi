<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Alat;

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

        return view('admin.page.alat', ['data' => $data, 'jml' => $jml]); //struktur folder di folder views
    }

    public function store(Request $request) //menambah data alat
    {
        $validasi = $this->validate($request, [
            'nama'          => 'required|string',
            'harga'         => 'required|numeric',
            'stok'          => 'required|numeric',
            'keterangan'    => 'string',
            'gambar'        => 'image|mimes:jpeg,png,jpg|max:3072'
        ]);

        $data = new Alat;
        $data->nama         = $request->get('nama');
        $data->harga        = $request->get('harga');
        $data->stok         = $request->get('stok');
        $data->keterangan   = $request->get('keterangan'); //boleh kosong
        $data->admin_id     = Auth::guard('admin')->user()->id;

        $gambar = $request->file('gambar');
        if ($gambar) {
            $gambar_path = $gambar->store('gambar', 'public');
            $data->gambar = $gambar_path;
        }
        $data->save();

        return redirect()->back()->with('success', 'Berhasil menambah data alat');
    }

    public function update(Request $request, $id) //mengubah data alat
    {
        $validasi = $this->validate($request, [
            'nama'          => 'required|string',
            'harga'         => 'required|numeric',
            'keterangan'    => 'string',
            'stok'          => 'required|numeric'
        ]);

        $data = Alat::findOrFail($id);
        $data->nama         = $request->get('nama');
        $data->harga        = $request->get('harga');
        $data->stok         = $request->get('stok');
        $data->keterangan   = $request->get('keterangan'); //boleh kosong
        $data->admin_id     = Auth::guard('admin')->user()->id;

        $gambar = $request->file('gambar');
        if ($gambar) {
            if ($data->gambar && file_exists(storage_path('app/public/' . $data->gambar))) {
                \Storage::delete('public/' . $data->gambar);
            }
            $gambar_path = $gambar->store('gambar', 'public');
            $data->gambar = $gambar_path;
        }
        $data->save();

        return redirect()->back()->with('success', 'Berhasil mengubah data alat');
    }

    public function delete($id) //menghapus data alat
    {
        $data = Alat::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Berhasil mengahapus data alat');
    }
}
