<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TransaksiBarang;
class TransaksiBarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$data = TransaksiBarang::where('status', '0')
            ->select('id', 'transaksi_code', 'penerima', 'nohp', 'alamat', 'kecamatan', 'kelurahan', 'rt', 'rw', 'total', 'keterangan')
            ->with('items:id,nama,jenis,harga,jumlah,subtotal,transaksi_id')
            ->orderBy('created_at', 'desc')
            ->get();
            // return $data;
    	return view('admin.page.transaksi', ['data' => $data]);
    }
}
