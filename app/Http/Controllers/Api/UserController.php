<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
     public function authenticate(Request $request)
        {
            $credentials = $request->only('email', 'password');

            try {
                if (! $token = JWTAuth::attempt($credentials)) {
                    return response()->json(['error' => 'invalid_credentials'], 400);
                }
            } catch (JWTException $e) {
                return response()->json(['error' => 'could_not_create_token'], 500);
            }

            $user = User::where('email', $request->get('email'))->first();
            return response()->json([
                    'status' => true,
                    'message' => 'Berhasil login',
                    'data' => $user,
                    'token' => $token
                ]);
            // return response()->json(compact('token', 'user'));
        }

        public function register(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'tempat_lahir' => 'required|string',
                'alamat_lengkap' =>'required|string',
                'kecamatan' => 'required|string',
                'nohp' => 'required|string',
                'role' => 'required|string',
                'kota_id' => 'required|numeric',
                'rt' => 'required|string',
                'rw' => 'required|string',
                'kelurahan' => 'required|string'
            ]);

            if($validator->fails()){
                return response()->json([
                    'status' => false,
                    'code' => 401,
                    'message' => 'Ada Kesalahan Registrasi',
                    'data' => $validator->errors()
                ]);
                    // return response()->json($validator->errors()->toJson(), 400);
            }

            $user = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'tempat_lahir' => $request->get('tempat_lahir'),
                'alamat' => $request->get('alamat_lengkap'),
                'kecamatan' => $request->get('kecamatan'),
                'nohp' => $request->get('nohp'),
                'role' => $request->get('role'), //konsumen atau petani
                'alamat_id' => $request->get('kota_id'),
                'tanggal_lahir' => $request->get('tanggal_lahir'),
                'rt' => $request->get('rt'),
                'rw' => $request->get('rw'),
                'kelurahan' => $request->get('kelurahan'),
            ]);

            $token = JWTAuth::fromUser($user);

            return response()->json(compact('user','token'),200);
        }

        public function getAuthenticatedUser()
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


            return response()->json(compact('user'));
        }
}
