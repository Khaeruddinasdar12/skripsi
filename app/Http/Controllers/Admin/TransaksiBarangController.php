<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TransaksiBarang;
use App\CartTransaksi;
class TransaksiBarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$data = CartTransaksi::select('id', 'jumlah', 'barang_id')
    				->where('transaksi_id', 1)
    				->get();
    	return $data;
    	$data = TransaksiBarang::where('status', '0')
            ->select('id', 'transaksi_code', 'penerima', 'nohp', 'alamat', 'kecamatan', 'kelurahan', 'rt', 'rw', 'total', 'keterangan', 'user_id')
            ->with('users:id,name,nohp')
            ->with('items:id,nama,jenis,harga,jumlah,subtotal,transaksi_id')
            ->orderBy('created_at', 'desc')
            ->get();
            // return $data;
    	return view('admin.page.transaksi', ['data' => $data]);
    }

    public function status($id) // mengubah status pembelian menjadi riwayat
    {
        $data = TransaksiBarang::findOrFail($id);
        // if ($data->jenis_bayar == 'tf') {
        //     if ($data->bukti == null) {
        //         return redirect()->back()->with('error', 'Pembeli belum mengirim bukti transfer');
        //     }
        // }

        $jml = $data->jumlah; // jumlah pesanan beras yang dipesan
        $beras = Barang::findOrFail($data->barang_id);
        if ($alat->jenis != 'beras') {
            return redirect()->back()->with('error', 'Oops ! Ngapain bre ?');
        }

        $stok = $beras->stok;

        if ($jml > $stok) {
            return redirect()->back()->with('error', 'Stok beras ' . $beras->nama . ' tidak cukup. stok tersedia ' . $beras->stok);
        }
        $beras->stok = $beras->stok - $jml;
        $beras->save();
        $data->status   = '1';
        $data->admin_id = Auth::guard('admin')->user()->id;
        $data->save();

        return redirect()->back()->with('success', 'Transaksi beras ' . $beras->nama . ' dengan jumlah ' . $jml . ' kg berhasil');
    }
}
