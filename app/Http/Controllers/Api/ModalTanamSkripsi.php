<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\TransaksiLahan;
class ModalTanamSkripsi extends Controller
{
    public function store(Request $request)
	{
		if(!$user = Auth::user()) {
			return response()->json([
				'status'    => false,
				'message'   => 'Invalid Token'
			]);
		}

		$validator = Validator::make($request->all(), [
			'jenis_bibit'	=> 'required|string',
			'jenis_pupuk'	=> 'required|string',
			'kecamatan'     => 'required|string',
			'kelurahan'     => 'required|string',
			'alamat'      => 'required|string',
			'luas_lahan'    => 'required|string',
			'sertifikat_tanah'  => 'required|image|mimes:jpeg,png,jpg|max:3072',
			'surat_pajak'   => 'required|image|mimes:jpeg,png,jpg|max:3072',
		]);

		if($validator->fails()) {
			$message = $validator->messages()->first();
			return response()->json([
				'status'   => false,
				'message'  => $message
			]);
		}

		if($user->foto_ktp == '') {
			return response()->json([
				'status'    => false,
				'message'   => 'Lengkapi profil Anda, pastikan KTP Anda sama dengan nama Anda'
			]);
		}

		$sertifikat_tanah = $request->file('sertifikat_tanah');
		if ($sertifikat_tanah) {
			$sertifikat_tanah_path = $sertifikat_tanah->store('gambar', 'public');
		}

		$surat_pajak = $request->file('surat_pajak');
		if ($surat_pajak) {
			$surat_pajak_path = $surat_pajak->store('gambar', 'public');
		}

		// return $request->get('luas_lahan');
		TransaksiLahan::create([
			'jenis'     => 'mt',
			'jenis_bibit' => $request->get('jenis_bibit'),
			'jenis_pupuk' => $request->get('jenis_pupuk'),
			'kecamatan' => $request->get('kecamatan'),
			'kelurahan' => $request->get('kelurahan'),
			'alamat'  => $request->get('alamat'),
			'luas_lahan' => $request->get('luas_lahan'),
			'titik_koordinat' => $request->get('titik_koordinat'),
			'sertifikat_tanah'  => $sertifikat_tanah_path,
			'surat_pajak'     => $surat_pajak_path,
			'user_id'   => $user->id,

		]);

		return response()->json([
			'status' => true,
			'message' => 'Berhasil mengajukan modal tanam'
		]);
	}
}
