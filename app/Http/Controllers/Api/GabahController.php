<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\TransaksiGabah;
use App\Gabah;
use Auth;
class GabahController extends Controller
{
	public function index()
	{
		$data = Gabah::select('id', 'nama', 'harga')->get();
		return response()->json([
                    'status' => true,
                    'message' => 'Semua data gabah',
                    'data'	=> $data
                ]);
	}

    public function store(Request $request, $id)
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
                'jumlah' 		=> 'required|string',
                'alamat_lengkap'=> 'required|string',
                'kecamatan' 	=> 'required|string',
                'kelurahan'		=> 'required|string',
            ]);

        if($validator->fails()) {
                $message = $validator->messages()->first();
                return response()->json([
                    'status' => false,
                    'messsage' => $message
                ]);
        }

        $gabah = Gabah::find($id);
        if ($gabah == null) {
            return response()->json([
                'status' => false, 
                'message' => 'Id gabah tidak ditemukan'
            ]);
        }


        $sawah = TransaksiGabah::create([
                'jumlah' 	=> $request->get('jumlah'),
                'harga' 	=> $gabah->harga,
                'alamat' 	=> $request->get('alamat_lengkap'),
                'kecamatan' => $request->get('kecamatan'),
                'kelurahan' => $request->get('kelurahan'),
                'status'	=> '0',
                'jenis_bayar' => 'cod',
                'gabah_id'	=> $gabah->id,
                'user_id'	=> $user->id,

            ]);

        return response()->json([
                    'status' => true,
                    'message' => 'Berhasil mengirim permintaan pembelian gabah ! segera diproses.'
                ]);
    }
}
