<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\TransaksiAlat;
use App\Alat;

class TransaksiAlatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() //menampilkan hal. data transaksi
    {
        //mengurutkan dari terbaru ke terlama (descending)
        $data = TransaksiAlat::where('status', '0')
            ->with('users:id,name,email,nohp', 'alats:id,nama,gambar')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $jml = TransaksiAlat::where('status', '0')
            ->count();

        // return $data; //uncomment ini untuk melihat data

        return view('admin.page.transaksialat', ['data' => $data, 'jml' => $jml]);
    }

    public function riwayat() //menampilkan hal. data riwayat transaksi alat
    {
        //mengurutkan dari terbaru ke terlama (descending)
        $data = TransaksiAlat::where('status', '1')
            ->with('users:id,name,email,nohp', 'alats:id,nama,gambar', 'admins:id,name')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $jml = TransaksiAlat::where('status', '1')
            ->count();

        // return $data; //uncomment ini untuk melihat data

        return view('admin.page.riwayat-alat', ['data' => $data, 'jml' => $jml]);
    }

    public function status($id) // mengubah status pembelian alat menjadi riwayat
    {
        $data = TransaksiALat::findOrFail($id);
        // if ($data->jenis_bayar == 'tf') {
        //     if ($data->bukti == null) {
        //         return redirect()->back()->with('error', 'Pembeli belum mengirim bukti transfer');
        //     }
        // }
        $jml = $data->jumlah; // jumlah pesanan alat yang dipesan
        $alat = Alat::findOrFail($data->alat_id);
        $stok = $alat->stok;

        if ($jml > $stok) {
            return redirect()->back()->with('error', 'Stok alat tani' . $alat->nama . ' tidak cukup. stok tersedia ' . $alat->stok);
        }
        $alat->stok = $alat->stok - $jml;
        $alat->save();


        $data->status   = '1';
        $data->admin_id = Auth::guard('admin')->user()->id;
        $data->save();

        return redirect()->back()->with('success', 'Transaksi alat ' . $alat->nama . ' dengan jumlah ' . $jml . ' unit berhasil');
    }

    public function delete($id) // menghapus data transaksi alat belum verif
    {
        $data = TransaksiAlat::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Pesanan alat tani dihapus');
    }

    public function deleteBySuperadmin($id) // menghapus data transaksi alat (riwayat Transaksi by superadmin)
    {
        $data = TransaksiAlat::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Riwayat transaksi alat telah dihapus');
    }
}
