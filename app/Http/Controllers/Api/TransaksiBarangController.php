<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TransaksiBarang;
use App\Barang;
use App\CartTransaksi;
use Carbon\Carbon;
use Auth;
use DB;
use Illuminate\Support\Facades\Validator;
class TransaksiBarangController extends Controller
{
	public function proses() //belanja yang masih di proses oleh admin
	{
		if(!$user = Auth::user()) {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Invalid Token'
                ]);
        }

        $data = TransaksiBarang::where('status', '0')
            ->select('id', 'transaksi_code', 'penerima', 'nohp', 'alamat', 'kecamatan', 'kelurahan', 'rt', 'rw', 'total')
            ->with('items:id,nama,jenis,harga,jumlah,subtotal,transaksi_id')
            ->orderBy('created_at', 'desc')
            ->get();
        	if (sizeof($data) == 0) {
	            return response()->json([
                	'status' 	=> false, 
                	'message' 	=> 'Belum ada transaksi'
            	]);
	        }

            // return $data;
        return response()->json([
                	'status' 	=> true, 
                	'message' 	=> 'Transaksi barang oleh '.$user->name.' yang masih diproses admin',
                	'data'		=> $data
            	]);
	}

	public function riwayat() //belanja yang telah selesai (riwayat)
	{
		if(!$user = Auth::user()) {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Invalid Token'
                ]);
        }

        $data = TransaksiBarang::where('status', '1')
            ->select('id', 'transaksi_code', 'penerima', 'nohp', 'alamat', 'kecamatan', 'kelurahan', 'rt', 'rw', 'total')
            ->with('items:id,nama,jenis,harga,jumlah,subtotal,transaksi_id')
            ->orderBy('created_at', 'desc')
            ->get();
        
           	if (sizeof($data) == 0) {
	            return response()->json([
                	'status' 	=> false, 
                	'message' 	=> 'Belum ada riwayat transaksi'
            	]);
	        }
        return response()->json([
                	'status' 	=> true, 
                	'message' 	=> 'Riwayat transaksi barang oleh '.$user->name,
                	'data'		=> $data
            	]);
	}

	public function batal() // belanja yang di batalkan
	{
		if(!$user = Auth::user()) {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Invalid Token'
                ]);
        }

        $data = TransaksiBarang::where('status', 'batal')
            ->select('id', 'transaksi_code', 'penerima', 'nohp', 'alamat', 'kecamatan', 'kelurahan', 'rt', 'rw', 'total', 'keterangan')
            ->with('items:id,nama,jenis,harga,jumlah,subtotal,transaksi_id')
            ->orderBy('created_at', 'desc')
            ->get();

            if (sizeof($data) == 0) {
	            return response()->json([
                	'status' 	=> false, 
                	'message' 	=> 'Belum ada transaksi yang dibatalkan'
            	]);
	        }
        return response()->json([
                	'status' 	=> true, 
                	'message' 	=> 'Transaksi barang oleh '.$user->name.' yang masih dibatalkan oleh admin',
                	'data'		=> $data
            	]);
	}

	public function checkout(Request $request, $id) //checkout semua keranjang
	{
		if(!$user = Auth::user()) {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Invalid Token'
                ]);
        }

        $validator = Validator::make($request->all(), [
            'nama_penerima' => 'required|string',
            'nohp'          => 'required|string',
            'alamat'        => 'required|string',
            'alamat_id'     => 'required|numeric',
            'kecamatan'     => 'required|string',
            'kelurahan'     => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'keterangan'    => 'string'

        ]);

        if($validator->fails()) {
                $message = $validator->messages()->first();
                return response()->json([
                    'status' => false,
                    'messsage' => $message
                ]);
        }

        $time = Carbon::now();
    	$transaksi_code = 'INV-GLG'.$time->format('Y').$time->format('m').$time->format('d').$time->format('H').$time->format('i').$time->format('s').$user->id;

        $data = TransaksiBarang::find($id);
        	if ($data == null) {
	            return response()->json([
                	'status' 	=> false, 
                	'message' 	=> 'Belum ada keranjang'
            	]);
	        }
	        
	        if ($data->user_id != $user->id) {
	            return response()->json([
	                'status' => false, 
	                'message' => 'Transaksi barang ini bukan milik Anda.'
	            ]);
	        }

        $data->transaksi_code = $transaksi_code;
        $data->penerima = $request->get('nama_penerima');
        $data->nohp = $request->get('nohp');
        $data->alamat = $request->get('alamat');
        $data->alamat_id = $request->get('alamat_id');
        $data->kecamatan = $request->get('kecamatan');
        $data->kelurahan = $request->get('kelurahan');
        $data->rt 	= $request->get('rt');
        $data->rw 	= $request->get('rw');
        $data->keterangan = $request->get('keterangan');
        $data->status = '0'; // belum verif (setelah checkout)
        $data->save();

        return response()->json([
                'status' => true, 
                'message' => 'Berhasil mengirim permintaan pembelian barang dengan kode transaksi '.$data->transaksi_code.'. Segera diproses. '
            ]);
	}

	public function cart() // keranjang dan itemsnya
	{
		if(!$user = Auth::user()) {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Invalid Token'
                ]);
        }
        $transaksi = TransaksiBarang::where('user_id', $user->id)
        		->where('status', null)
        		->first();

        	if($transaksi == null) {
        		return response()->json([
                	'status' 	=> false, 
                	'message' 	=> 'Belum ada keranjang'
            	]);
        	}

        $data = DB::table('cart_transaksis')
        		->select('cart_transaksis.id as id_item', 'cart_transaksis.jumlah', 'cart_transaksis.harga as harga_satuan', 'cart_transaksis.nama', 'cart_transaksis.jenis', 'cart_transaksis.subtotal', 'barangs.gambar', 'barangs.min_beli')
        		->join('transaksi_barangs', 'cart_transaksis.transaksi_id', '=', 'transaksi_barangs.id')
                ->join('barangs', 'cart_transaksis.barang_id', '=', 'barangs.id')
        		->where('transaksi_barangs.user_id', $user->id)
        		->where('transaksi_barangs.status', null)
        		->orderBy('cart_transaksis.created_at', 'desc')
        		->get();
        	// return $data;

        return response()->json([
                'status' 	=> true, 
                'message' 	=> 'keranjang dan items nya.',
                'id_transaski'		=> $transaksi->id,
                'total'		=> $transaksi->total,
                'data'		=> $data,
                
            ]);
	}

	public function edit(Request $request, $id) //edit item keranjang
	{
		if(!$user = Auth::user()) {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Invalid Token'
                ]);
        }

        $validator = Validator::make($request->all(), [
                'jumlah' 			=> 'required|numeric',
            ]);

        if($validator->fails()) {
                $message = $validator->messages()->first();
                return response()->json([
                    'status' => false,
                    'messsage' => $message
                ]);
        }

		$cart = CartTransaksi::find($id);
		if ($cart == null) {
            return response()->json([
                'status' => false, 
                'message' => 'Id item tidak ditemukan'
            ]);
        }

		$barang = Barang::find($cart->barang_id);
		if ($barang == null) {
            return response()->json([
                'status' => false, 
                'message' => 'Id barang tidak ditemukan atau mungkin telah dihapus, hilangkan item ini dari keranjang Anda'
            ]);
        }
        	//cek satuan barang
        	if($barang->jenis == 'alat') {
        		$satuan = 'unit';
        	} else {
        		$satuan = 'kg';
        	}
        	//end cek satuan barang
        if($barang->min_beli > $request->get('jumlah')) { //cek minimal pembelian
        	return response()->json([
                'status' => false, 
                'message' => 'Minimal pembelian '.$barang->min_beli.' '.$satuan
            ]);
        }

        //cek stok barang
        if($request->get('jumlah') > $barang->stok) {
        	return response()->json([
                'status' => false, 
                'message' => 'Stok '. $barang->jenis.' tidak cukup. stok tersedia '.$barang->stok.' '.$satuan
            ]);
        }

        $subtotal = $barang->harga * $request->get('jumlah');

        	$transaksi = TransaksiBarang::find($cart->transaksi_id);
        	$transaksi->total = ($transaksi->total - $cart->subtotal) + $subtotal;
        	$transaksi->save();

        $cart->nama = $barang->nama;
        $cart->jumlah = $request->get('jumlah');
        $cart->subtotal = $subtotal;
        $cart->save();

        return response()->json([
                'status' => true, 
                'message' => 'jumlah '.$barang->jenis.' diubah.'
            ]);


	}

	public function delete($id) //hapus item di keranjang
	{
		if(!$user = Auth::user()) {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Invalid Token'
                ]);
        }

        $item = CartTransaksi::find($id);
        if ($item == null) {
            return response()->json([
                'status' => false, 
                'message' => 'Id item tidak ditemukan'
            ]);
        }

        $transaksi = TransaksiBarang::find($item->transaksi_id);
        $transaksi->total = $transaksi->total - $item->subtotal;
        $transaksi->save(); //update transaksi TOTAL

        $item->delete(); //hapus item

        if ($transaksi){
		    $json=[
			    'status' 	=> true,
			    'message'	=> 'item dihapus'
			];
		} else {
		    $json=[
		    	'status'	=> false,
		    	'message'	=> 'hapus item gagal'
		  	];
		 }
	  	
	  	return response()->json($json);
	}

    public function addcart(Request $request, $id) //menambahkan barang ke keranjang
    {
    	if(!$user = Auth::user()) {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Invalid Token'
                ]);
        }

        $validator = Validator::make($request->all(), [
                'jumlah' 			=> 'required|numeric',
            ]);

        if($validator->fails()) {
                $message = $validator->messages()->first();
                return response()->json([
                    'status' => false,
                    'messsage' => $message
                ]);
        }

        $barang = Barang::find($id);
        if ($barang == null) {
            return response()->json([
                'status' => false, 
                'message' => 'Id barang tidak ditemukan'
            ]);
        }

        //cek Cart jika barang yang di input sudah dalam keranjang
        $cekCart = CartTransaksi::where('barang_id', $id)
                ->whereHas('tbarangs', function($query) {
                    $query->where('status', null);
                })
                ->first();
        if(!empty($cekCart)) {

                $jml = $cekCart->jumlah + $request->get('jumlah'); //jumlah barang keseluruhan
                $subtotal = $jml * $barang->harga;
            if($barang->stok < $jml) {
                return response()->json([
                    'status' => false, 
                    'message' => 'Barang ini telah ada dikeranjang, jumlah yang Anda inginkan melebihi stok yang tersedia'
                ]);
            }
            $cekCart->jumlah = $jml;
            $cekCart->subtotal = $subtotal;
            $cekCart->save();
        }

        	//cek satuan barang
        	if($barang->jenis == 'alat') {
        		$satuan = 'unit';
        	} else {
        		$satuan = 'kg';
        	}
        	//end cek satuan barang

        if($barang->min_beli > $request->get('jumlah')) { //cek minimal pembelian
        	return response()->json([
                'status' => false, 
                'message' => 'Minimal pembelian '.$barang->min_beli.' '.$satuan
            ]);
        }

        if($barang->stok < $request->get('jumlah')) { //cek stok
        	return response()->json([
                'status' => false, 
                'message' => 'Stok '. $barang->jenis.' tidak cukup. stok tersedia '.$barang->stok.' '.$satuan
            ]);
        }

        //cek Cart
        $data = TransaksiBarang::where('status', null)
        		->where('user_id', $user->id)
        		->first();

        if ($data == null) {
        	$data = new TransaksiBarang;
        	$data->jenis_bayar = 'cod';
        	$data->user_id = $user->id;
        		$subtotal = $barang->harga * $request->get('jumlah');
        	$data->total = $subtotal; 
        	$data->save();
        	$transaksi_id = $data->id;
        } else {
        	//update TransasksiBarang TOTAL
        	$subtotal = $barang->harga * $request->get('jumlah');
        	$data->total = $data->total + $subtotal; 
        	$data->save();

        	// define transaksi id untuk Cart
        	$transaksi_id = $data->id;
        }
        	$cart = new CartTransaksi;
        	$cart->nama = $barang->nama;
        	$cart->jenis = $barang->jenis;
        	$cart->harga = $barang->harga;
        	$cart->jumlah = $request->get('jumlah');
        	$cart->subtotal = $cart->jumlah*$cart->harga;
        	$cart->transaksi_id = $transaksi_id;
        	$cart->barang_id = $id;
        	$cart->save();
        //end cek Cart

        
        	
        return response()->json([
                'status' => true, 
                'message' => $barang->jenis.' ditambahkan.'
            ]);
    }
}
