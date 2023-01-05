<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    //Fungsi untuk register
    public function register(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required|max:25',
            'username' => 'required|max:25',
            'password' => 'required|confirmed',
            'level' => 'required|max:25'
        ]);

        $user = new user([
            'id' => $request->id,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'level' => $request->level
        ]);
        $user->save();
        return response()->json($user, 201);
    }


    //Fungsi untuk login
    public function login(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $login_detail = request(['username', 'password']);

        if (!Auth:: attempt($login_detail)) {
            return response()->json(['error' => 'vincen ganteng'],401);
        }
        
            $user = $request->user();

            $tokenResult = $user->createToken('AccessToken');
            $token = $tokenResult->token;
            $token->save();

            return response()->json([
                'access_token' => 'Bearer'. $tokenResult->accessToken,
                'token' => $token->id,
                'user_id' => $token->user_id,
                'username' => $user->username,
                'level' => $user->level,
            ], 200);
        }


    //Function ini berfungsi untuk mengambil data siswa yang login untuk di tampilkan di profile
    public function showProfileSiswa($username)
    {
        // ambil satu data siswa dengan parameter username
        $siswa = Siswa::with('tempatpkl')->with('guru')->where('username', $username)->first();
        return response()->json($siswa, 200);
    }

    //Fuction ini berfungsi untuk mengambil data siswa yang dibimbing oleh guru pembimbing dengan parameter nip_pembimbing
    public function getsiswa(Request $request, $nip_pembimbing){
        $siswa = Siswa::with('tempatpkl')->where('nip_pembimbing', $nip_pembimbing)->get();
        return response()->json($siswa, 200);
    }

    //Function ini berfungsi untuk mengambil data guru yang login untuk di tampilkan di profile
    public function showProfileGuru($username)
    {
        // ambil satu data guru dengan parameter username
        $guru = Guru::where('username', $username)->first();
        return response()->json($guru, 200);
    } 
}
