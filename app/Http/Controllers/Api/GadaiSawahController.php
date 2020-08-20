<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sawah;
use App\TransaksiSawah;
use Auth;
use Illuminate\Support\Facades\Validator;
class GadaiSawahController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
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
                'periode' 	=> 'required|string',
                'harga'		=> 'required|numeric',
                'sawah_id' 	=> 'required|numeric',
            ]);

        if($validator->fails()) {
                $message = $validator->messages()->first();
                return response()->json([
                    'status' => false,
                    'messsage' => $message
                ]);
        }
        $sawah_id = $request->get('sawah_id');
        $ceksawah = Sawah::find($sawah_id);
        if ($sawah == null) {
            return response()->json([
                'status' => false, 
                'message' => 'Id sawah tidak ditemukan'
            ]);
        }
        
        if($ceksawah->created_by != $user->id) {
            return response()->json([
                'status' => false, 
                'message' => 'Data sawah ini bukan milik Anda'
            ]);
        } 

        $cektransaksi = TransaksiSawah::where('sawah_id', $sawah_id)
                        ->where(function ($query) {
                            $query->where('status', null)
                                  ->orWhere('status', 'gadai');
                        })
                    ->first();
                    // return $cektransaksi;
        if($cektransaksi != null) {
            $jenistransaksi = $cektransaksi->jenis;
            if ($jenistransaksi == 'gs') {
                $jenis = 'Gadai Sawah';
            } else {
                $jenis = 'Modal Tanam';
            }

            $status = $cektransaksi->status;
            $msgstatus = 'default';
            if($status == null) {
                $msgstatus = 'Daftar';
            } else if($status == 'gadai') {
                $msgstatus = 'Gadai';
            }
            return response()->json([
                'status' => false, 
                'message' => 'Sawah ini masih dalam Transaksi '.$jenis. ' dengan status '.$msgstatus
            ]);
        }

        TransaksiSawah::create([
                'jenis'     => 'gs',
                'periode' 	=> $request->get('periode'),
                'harga' 	=> $request->get('harga'),
                'sawah_id' 	=> $request->get('sawah_id'),
            ]);

        return response()->json([
                    'status' => true,
                    'message' => 'Berhasil memohon permintaan gadai sawah, data segera diproses admin'
                ]);
    }
}
