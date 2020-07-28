<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Kota;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function konsumen() //menampilkan hal. data user konsumen
    {
        $data = User::where('role', 'konsumen')->paginate(10); //semua data konsumen
        $jml = User::where('role', 'konsumen')->count(); // menghitung jumlah konsumen

        $kota = Kota::select('id', 'tipe', 'nama_kota')->where('provinsi_id', 28)->get();
        // return $data; // uncomment ini untuk melihat data user 

        return view('admin.page.user', ['data' => $data, 'kota' => $kota, 'jml' => $jml]);
    }

    public function verified() //menampilkan hal. data user petani terverifikasi
    {
        $data = User::where('role', 'petani')->where('petani_verified', '1')->paginate(10);
        $jml = User::where('role', 'petani')->where('petani_verified', '1')->count(); // menghitung jumlah petani terverifikasi

        $kota = Kota::select('id', 'tipe', 'nama_kota')->where('provinsi_id', 28)->get();
        // return $data; // uncomment ini untuk melihat data user 

        return view('admin.page.petani-verif', ['data' => $data, 'kota' => $kota, 'jml' => $jml]);
    }

    public function unverified() //menampilkan hal. data user petani belum terverifikasi
    {
        $data = User::where('role', 'petani')->where('petani_verified', '0')->paginate(10);
        $jml = User::where('role', 'petani')->where('petani_verified', '0')->count(); // menghitung jumlah petani belum terverifikasi

        $kota = Kota::select('id', 'tipe', 'nama_kota')->where('provinsi_id', 28)->get();
        // return $data; // uncomment ini untuk melihat data user 

        return view('admin.page.petani-unverif', ['data' => $data, 'kota' => $kota, 'jml' => $jml]);
    }

    public function buttonverified($id) // mengubah status user menjadi verified
    {
        $data = User::findOrFail($id);
        $data->petani_verified     = '1';
        $data->verified_by         = Auth::guard('admin')->user()->id;
        $data->save();

        return redirect()->back()->with('success', 'Berhasil memverifikasi data user');
    }
    public function update(Request $request, $id) // admin mengupdate 
    {
        $validasi = $this->validate($request, [
            'name'          => 'required|string',
            'tempat_lahir'  => 'required|string',
            'tanggal_lahir' => 'required',
            'alamat_lengkap' => 'required|string',
            'kecamatan'     => 'required|string',
            'kelurahan'     => 'required|string',
            'nohp'          => 'required|string',
            'kota_id'       => 'required|numeric',
            'rt'            => 'required|string',
            'rw'            => 'required|string',
            'jkel'          => 'required'
        ]);

        $data = User::findOrFail($id);
        $data->name         = $request->get('name');
        $data->tempat_lahir = $request->get('tempat_lahir');
        $data->alamat       = $request->get('alamat_lengkap');
        $data->kecamatan    = $request->get('kecamatan');
        $data->nohp         = $request->get('nohp');
        $data->alamat_id    = $request->get('kota_id');
        $data->tanggal_lahir = $request->get('tanggal_lahir');
        $data->rt           = $request->get('rt');
        $data->rw           = $request->get('rw');
        $data->jkel         = $request->get('jkel');
        $data->kelurahan    = $request->get('kelurahan');
        $data->save();

        return redirect()->back()->with('success', 'Berhasil mengubah data petani');
    }

    public function delete()
    {
        $data = User::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data petani');
    }
}
