<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\TransaksiBarang;
use App\Barang;

class TransaksiPupukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() //menampilkan hal. data transaksi pupuk
    {
        //mengurutkan dari terbaru ke terlama (descending)
        $data = TransaksiBarang::whereHas('barangs', function ($query) {
                    $query->where('jenis', 'pupuk')->where('status', '0');
                })
            ->with('users:id,name,email,nohp', 'barangs:id,nama,gambar')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $jml = TransaksiBarang::whereHas('barangs', function ($query) {
                    $query->where('jenis', 'pupuk')->where('status', '0');
                })
            ->count();

        // return $data; //uncomment ini untuk melihat data

        return view('', ['data' => $data, 'jml' => $jml]);
    }

    public function riwayat() //menampilkan hal. data riwayat transaksi pupuk
    {
        //mengurutkan dari terbaru ke terlama (descending)
        $data = TransaksiBarang::whereHas('barangs', function ($query) {
                    $query->where('jenis', 'pupuk')->where('status', '1');
                })
            ->with('users:id,name,email,nohp', 'barangs:id,nama,gambar', 'admins:id,name')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $jml = TransaksiBarang::whereHas('barangs', function ($query) {
                    $query->where('jenis', 'pupuk')->where('status', '1');
                })
            ->count();

        // return $data; //uncomment ini untuk melihat data

        return view('', ['data' => $data, 'jml' => $jml]);
    }

    public function status($id) // mengubah status pembelian pupuk menjadi riwayat
    {
        $data = TransaksiBarang::findOrFail($id);
        // if ($data->jenis_bayar == 'tf') {
        //     if ($data->bukti == null) {
        //         return redirect()->back()->with('error', 'Pembeli belum mengirim bukti transfer');
        //     }
        // }
            $jml = $data->jumlah; // jumlah pesanan pupuk yang dipesan
            $pupuk = Barang::findOrFail($data->barang_id);
            if($alat->jenis != 'pupuk') {
                return redirect()->back()->with('error', 'Oops ! Ngapain bre ?');
            }
            $stok = $pupuk->stok;

            if ($jml > $stok) {
                return redirect()->back()->with('error', 'Stok pupuk '.$pupuk->nama.' tidak cukup. stok tersedia '.$pupuk->stok);
            }
            $pupuk->stok = $pupuk->stok - $jml;
            $pupuk->save();
        $data->status   = '1';
        $data->admin_id = Auth::guard('admin')->user()->id;
        $data->save();

        return redirect()->back()->with('success', 'Transaksi pupuk '.$pupuk->nama.' dengan jumlah '.$jml.' kg berhasil');
    }

    public function delete($id) // menghapus data transaksi pupuk
    {
        $data = TransaksiBarang::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Pesanan pupuk dihapus');
    }

    public function deleteBySuperadmin($id) // menghapus data transaksi pupuk (riwayat Transaksi by superadmin)
    {
        $data = TransaksiBarang::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Riwayat transaksi pupuk telah dihapus');
    }
}
