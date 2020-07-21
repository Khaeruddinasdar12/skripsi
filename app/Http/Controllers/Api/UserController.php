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
                'tanggal_lahir' => 'required|date', // yyyy-mm-dd
                'kota_id' => 'required|numeric',
                'alamat_lengkap' =>'required|string',
                'kecamatan' => 'required|string',
                'kelurahan' => 'required|string',
                'rt' => 'required|string',
                'rw' => 'required|string',
                'nohp' => 'required|string',
                'role' => 'required|string',
                'jkel' => 'required|string',
                
            ]);

            if($validator->fails()){
                return response()->json([
                    'status' => false,
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
                'jkel' => $request->get('jkel'),
            ]);

            $token = JWTAuth::fromUser($user);
            return response()->json([
                    'status' => true,
                    'message' => 'Berhasil daftar',
                    'data' => $user,
                    'token' => $token
                ]);
        }

        public function update(Request $request) // edit profile
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
                'name'          => 'required|string',
                'tempat_lahir'  => 'required|string',
                'tanggal_lahir' => 'required|date', // yyyy-mm-dd
                'alamat_lengkap'=> 'required|string',
                'kecamatan'     => 'required|string',
                'kelurahan'     => 'required|string',
                'nohp'          => 'required|string',
                'kota_id'       => 'required|numeric',
                'rt'            => 'required|string',
                'rw'            => 'required|string',
                'jkel'          => 'required|string',
            ]);

                if($validator->fails()) {
                        return response()->json([
                            'status' => false,
                            'message' => 'Ada kesalahan saat edit user',
                            'data' => $validator->errors()
                        ]);
                }
                
                $data = User::find($user->id);
                if ($data == null) {
                    return response()->json([
                        'status' => false, 
                        'message' => 'Id user tidak ditemukan'
                    ]);
                }
                $data->name         = $request->get('name');
                $data->tempat_lahir = $request->get('tempat_lahir');
                $data->alamat       = $request->get('alamat_lengkap');
                $data->kecamatan    = $request->get('kecamatan');
                $data->nohp         = $request->get('nohp');
                $data->alamat_id    = $request->get('kota_id');
                $data->tanggal_lahir= $request->get('tanggal_lahir');
                $data->rt           = $request->get('rt');
                $data->rw           = $request->get('rw');
                $data->jkel         = $request->get('jkel'); // L atau P
                $data->kelurahan    = $request->get('kelurahan');
            $data->save();
            return response()->json([
                    'status' => true,
                    'message' => 'Berhasil mengubah data'
            ]);
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

            return response()->json([
                    'status' => true,
                    'message' => 'Data user yang sedang login',
                    'data' => $user
            ]);
        }
}
