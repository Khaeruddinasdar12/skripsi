<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\TransaksiBarang;
use App\Barang;

class TransaksiBibitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() //menampilkan hal. data transaksi bibit
    {
        //mengurutkan dari terbaru ke terlama (descending)
        $data = TransaksiBarang::whereHas('barangs', function ($query) {
                    $query->where('jenis', 'bibit')->where('status', '0');
                })
            ->with('users:id,name,email,nohp', 'barangs:id,nama,gambar')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $jml = TransaksiBarang::whereHas('barangs', function ($query) {
                    $query->where('jenis', 'bibit')->where('status', '0');
                })
            ->count();

        // return $data; //uncomment ini untuk melihat data

        return view('', ['data' => $data, 'jml' => $jml]);
    }

    public function riwayat() //menampilkan hal. data riwayat transaksi bibit
    {
        //mengurutkan dari terbaru ke terlama (descending)
        $data = TransaksiBarang::whereHas('barangs', function ($query) {
                    $query->where('jenis', 'bibit')->where('status', '1');
                })
            ->with('users:id,name,email,nohp', 'barangs:id,nama,gambar', 'admins:id,name')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $jml = TransaksiBarang::whereHas('barangs', function ($query) {
                    $query->where('jenis', 'bibit')->where('status', '1');
                })
            ->count();

        // return $data; //uncomment ini untuk melihat data

        return view('', ['data' => $data, 'jml' => $jml]);
    }

    public function status($id) // mengubah status pembelian bibit menjadi riwayat
    {
        $data = TransaksiBarang::findOrFail($id);
        // if ($data->jenis_bayar == 'tf') {
        //     if ($data->bukti == null) {
        //         return redirect()->back()->with('error', 'Pembeli belum mengirim bukti transfer');
        //     }
        // }
            $jml = $data->jumlah; // jumlah pesanan bibit yang dipesan
            $bibit = Barang::findOrFail($data->barang_id);
            if($alat->jenis != 'bibit') {
                return redirect()->back()->with('error', 'Oops ! Ngapain bre ?');
            }
            $stok = $bibit->stok;

            if ($jml > $stok) {
                return redirect()->back()->with('error', 'Stok bibit '.$bibit->nama.' tidak cukup. stok tersedia '.$bibit->stok);
            }
            $bibit->stok = $bibit->stok - $jml;
            $bibit->save();
        $data->status   = '1';
        $data->admin_id = Auth::guard('admin')->user()->id;
        $data->save();

        return redirect()->back()->with('success', 'Transaksi bibit '.$bibit->nama.' dengan jumlah '.$jml.' kg berhasil');
    }

    public function delete($id) // menghapus data transaksi bibit
    {
        $data = TransaksiBarang::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Pesanan bibit dihapus');
    }

    public function deleteBySuperadmin($id) // menghapus data transaksi bibit (riwayat Transaksi by superadmin)
    {
        $data = TransaksiBarang::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Riwayat transaksi bibit telah dihapus');
    }
}
