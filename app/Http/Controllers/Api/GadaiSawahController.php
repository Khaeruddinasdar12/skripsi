<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use App\Sawah;
use App\GadaiSawah;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
class GadaiSawahController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
    	try {
         if (! $user = JWTAuth::parseToken()->authenticate()) {
	            return response()->json(['user_not_found'], 404);
	        }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
                return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
                return response()->json(['token_absent'], $e->getStatusCode());
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

        $sawah = GadaiSawah::create([
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
