<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\TransaksiBeras;
use App\Beras;

class TransaksiBerasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() //menampilkan hal. data transaksi beras
    {
        //mengurutkan dari terbaru ke terlama (descending)
        $data = TransaksiBeras::where('status', '0')
            ->with('users:id,name', 'beras:id,nama')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $jml = TransaksiBeras::where('status', '0')
            ->count();

        // return $data; //uncomment ini untuk melihat data

        return view('admin.page.transaksiberas', ['data' => $data, 'jml' => $jml]);
    }

    public function riwayat() //menampilkan hal. data riwayat transaksi beras
    {
    }

    public function status($id) // mengubah status pembelian beras menjadi riwayat
    {
        $data = TransaksiBeras::findOrFail($id);
        if($data->jenis_bayar == 'tf') {
            if($data->bukti == null) {
                return redirect()->back()->with('error', 'Pembeli belum mengirim bukti transfer');
            }
        }
        $jml = $data->jumlah;
        $beras = Beras::findOrFail($data->beras_id);
        $stok = $beras->stok;

        if($jml > $stok) {
            return redirect()->back()->with('error', 'Stok beras tidak cukup');
        }

        $data->status   = '1';
        $data->admin_id = Auth::guard('admin')->user()->id;
        $data->save();

        return redirect()->back()->with('success', 'Transaksi berhasil');
    }

    public function delete($id)
    {
        $data = TransaksiBeras::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Pesanan dihapus');
    }
}
