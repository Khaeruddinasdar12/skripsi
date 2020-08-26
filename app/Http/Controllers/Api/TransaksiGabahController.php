<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TransaksiGabah;
use Auth;
class TransaksiGabahController extends Controller
{
    public function index() // sedang transaksi gabah user
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

        $data = TransaksiGabah::where('status', '0')
        		->where('user_id', $user->id)
        		->get();

        return response()->json([
                    'status' 	=> true,
                    'message' 	=> 'Sedang transaksi gabah oleh user id '.$user->id,
                    'data'		=> $data
                ]);
    }

    public function riwayat() // riwayat transaksi gabah user
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

        $data = TransaksiGabah::where('status', '1')
        		->where('user_id', $user->id)
        		->get();

        return response()->json([
                    'status' 	=> true,
                    'message' 	=> 'Riwayat transaksi gabah oleh user id '.$user->id,
                    'data'		=> $data
                ]);
    }

    public function batal() // riwayat transaksi gabah user
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

        $data = TransaksiGabah::where('status', 'batal')
        		->where('user_id', $user->id)
        		->get();

        return response()->json([
                    'status' 	=> true,
                    'message' 	=> 'Transaksi gabah yang dibatalkan (user id '.$user->id.')',
                    'data'		=> $data
                ]);
    }
}
