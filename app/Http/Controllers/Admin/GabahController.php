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
        //mengurutkan dari terbaru ke terlama (descending)
        $data = Gabah::with('admins:id,name')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        $jml = Gabah::count();

        return $data; // uncomment ini untuk melihat data

    	return view('', ['data' => $data, 'jml' => $jml]); //struktur folder di folder views
    	/*
    	syntax
    	return view('namafolder.namafile');
    	*/
    }

    public function store(Request $request) //menambah data gabah
    {
        $validasi = $this->validate($request, [
            'nama'          => 'required|string',
            'harga'         => 'required|numeric'
        ]);

        $user = Gabah::create([
            'nama'  => $request->get('nama'), 
            'harga' => $request->get('harga'), //per KG
            'admin_id'  => Auth::guard('admin')->user()->id
            ]);

        return redirect()->back()->with('success', 'Berhasil menambah data gabah');
    }

    public function update(Request $request, $id) //mengubah data gabah
    {
        $validasi = $this->validate($request, [
            'nama'          => 'required|string',
            'harga'         => 'required|numeric'
        ]);


        $gabah = Gabah::findOrFail($id);
        $gabah->nama    = $request->get('nama');
        $gabah->harga   = $request->get('harga');
        $gabah->admin_id= Auth::guard('admin')->user()->id;
        $gabah->save();

        return redirect()->back()->with('success', 'Berhasil mengubah data gabah');
    }

    public function delete($id) //menghapus data gabah
    {
        $data = Gabah::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Berhasil mengahapus data gabah');
    }
}
