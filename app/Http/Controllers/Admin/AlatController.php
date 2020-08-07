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
        $gambar = $request->file('gambar');
        if ($gambar) {
            $gambar_path = $gambar->store('gambar', 'public');
            $data->gambar = $gambar_path;
        }

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

<<<<<<< HEAD
        $alat = Alat::findOrFail($id);
        $alat->nama    = $request->get('nama');
        $alat->stok    = $request->get('stok');
        $alat->harga   = $request->get('harga');
        $alat->admin_id = Auth::guard('admin')->user()->id;
        $alat->save();
=======
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
>>>>>>> 5b4ad8da8cd09ed84444ef34cff7e0bf8f8d46eb

        return redirect()->back()->with('success', 'Berhasil mengubah data alat');
    }

    public function delete($id) //menghapus data alat
    {
        $data = Alat::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Berhasil mengahapus data alat');
    }
}
