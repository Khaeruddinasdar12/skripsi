<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sawah;
use App\GadaiSawah;
use Auth;
use Illuminate\Support\Facades\Validator;
class SawahController extends Controller
{
    public function index() // daftar sawah petani berdasarkan id yang login
    { 
        if(!$user = Auth::user()) {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Invalid Token'
                ]);
        }

        if($user->petani_verified == '0') {
        	return response()->json([
                'status' => false, 
                'message' => 'Akun petani belum diverifikasi'
            ]);
        }

        $data = \App\User::find($user->id)->sawahs()->get();
        return response()->json([
                'status'    => true, 
                'message'   => 'Daftar sawah yang dimiliki User yang sedang login',
                'data'      => $data
            ]);
    }

    public function store(Request $request) // mendaftarkan sawah si petani
    { 
        if(!$user = Auth::user()) {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Invalid Token'
                ]);
        }

        if($user->petani_verified == '0') {
            return response()->json([
                'status' => false, 
                'message' => 'Akun petani belum diverifikasi'
            ]);
        }

        $validator = Validator::make($request->all(), [
                'nama'      => 'required|string',
                'alamat_id' => 'required|numeric',
                'kecamatan' => 'required|string',
                'kelurahan' => 'required|string',
                'alamat_lengkap' =>'required|string',
                'luas_sawah' => 'required|string',
                'jenis_bibit'=> 'required|string',
                'jenis_pupuk'=> 'required|string',
                'periode_tanam' => 'required|string',
            ]);

        if($validator->fails()) {
                $message = $validator->messages()->first();
                return response()->json([
                    'status' => false,
                    'message' => $message
                ]);
        }
        $cek = Sawah::where('created_by', $user->id)->get();
        foreach ($cek as $ceks) {
            if($request->get('nama') == $ceks->nama) {
                return response()->json([
                    'status' => false,
                    'message' => 'nama sawah sudah ada'
                ]);
            }
        }
        $sawah = Sawah::create([
                'nama'      => $request->get('nama'),
                'titik_koordinat' => $request->get('titik_koordinat'),
                'alamat_id' => $request->get('alamat_id'), // id kota atau kabupaten dari tabel kotas
                'kelurahan' => $request->get('kelurahan'),
                'alamat' => $request->get('alamat_lengkap'),
                'kecamatan' => $request->get('kecamatan'),
                'created_by' => $user->id, //id user yang sedang login
                'luas_sawah' => $request->get('luas_sawah'), 
                'jenis_bibit' => $request->get('jenis_bibit'),
                'jenis_pupuk' => $request->get('jenis_pupuk'),
                'periode_tanam' => $request->get('periode_tanam'),
            ]);

        return response()->json([
                    'status' => true,
                    'message' => 'Berhasil mendaftarkan sawah'
                ]);

    }

    public function update(Request $request,$id) // mengedit sawah petani
    {
        if(!$user = Auth::user()) {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Invalid Token'
                ]);
        }

        if($user->petani_verified == '0') {
            return response()->json([
                'status' => false, 
                'message' => 'Akun petani belum diverifikasi'
            ]);
        }

        $sawah = Sawah::find($id);

        if ($sawah == null) {
            return response()->json([
                'status' => false, 
                'message' => 'Id sawah tidak ditemukan'
            ]);
        }

        if ($sawah->created_by != $user->id) {
            return response()->json([
                'status' => false, 
                'message' => 'Data sawah ini bukan milik Anda'
            ]);
        }

        $validator = Validator::make($request->all(), [
                'alamat_id' => 'required|numeric',
                'kecamatan' => 'required|string',
                'kelurahan' => 'required|string',
                'alamat_lengkap' =>'required|string',
                'luas_sawah' => 'required|string',
                'jenis_bibit'=> 'required|string',
                'jenis_pupuk'=> 'required|string',
                'periode_tanam' => 'required|string',
            ]);

        if($validator->fails()) {
                $message = $validator->messages()->first();
                return response()->json([
                    'status' => false,
                    'message' => $message
                ]);
        }

        $sawah->titik_koordinat = $request->get('titik_koordinat');
        $sawah->alamat_id       = $request->get('alamat_id');
        $sawah->kelurahan       = $request->get('kelurahan');
        $sawah->alamat          = $request->get('alamat_lengkap');
        $sawah->kecamatan       = $request->get('kecamatan');
        $sawah->luas_sawah      = $request->get('luas_sawah');
        $sawah->jenis_bibit     = $request->get('jenis_bibit');
        $sawah->jenis_pupuk     = $request->get('jenis_pupuk');
        $sawah->periode_tanam   = $request->get('periode_tanam');
        $sawah->save();

        return response()->json([
                    'status' => true,
                    'message' => 'Berhasil mengubah data sawah'
                ]);


    }

    public function delete($id) //menghapus sawah petani
    {
        if(!$user = Auth::user()) {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Invalid Token'
                ]);
        }

        $cek_gadai = GadaiSawah::where('sawah_id', $id)->get();
        if($cek_gadai != null) {
            foreach ($$cek_gadai as $hps) {
                if($hps->status == 'gadai') {
                    return response()->json([
                        'status' => false,
                        'message' => 'Tidak dapat menghapus, Sawah ini sedang digadai'
                    ]);
                }
            }

            $cek_gadai->delete(); //delete data di tabel gadai_sawahs
        }

        $sawah = Sawah::find($id);
        if ($sawah == null) {
            return response()->json([
                'status' => false, 
                'message' => 'Id sawah tidak ditemukan'
            ]);
        }

        $sawah->delete(); //delete data di table sawahs
            return response()->json([
                'status' => true, 
                'message' => 'Berhasil menghapus sawah'
            ]);

    }

}
