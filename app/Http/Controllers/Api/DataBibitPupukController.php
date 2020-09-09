<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Barang;
class DataBibitPupukController extends Controller
{
    public function index() //menampilkan daftar Pupuk (tanpa header)
	{
		$data = Barang::select('id', 'nama', 'harga', 'min_beli', 'stok', 'keterangan', 'gambar')
			->where('jenis', 'pupuk')
			->orWhere('jenis', 'bibit')
			->paginate(8);
		return response()->json([
                    'status' => true,
                    'message' => 'Semua data bibit-pupuk (per 8 data)',
                    'data'	=> $data
                ]);
	}
}
