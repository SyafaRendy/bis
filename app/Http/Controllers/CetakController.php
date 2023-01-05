<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use PDF;
use Illuminate\Http\Request;
use App\Models\Siswa;
class CetakController extends Controller
{   
    //Fuction ini untuk mengambil data jurnal dan siswa dengan parameter nisn
    public function index(Request $request, $nisn){
        //Perintah di dalam $jurnal berfungsi untuk mengambil data jurnal dengan parameter nisn siswa
        $jurnal = Jurnal::where('nisn', $nisn)->get();
        
        //Perintah di dalam $siswa berfungsi mengambil data siswa secara mendetail dengan parameter nisn
        $siswa = Siswa::with('tempatpkl')->with('guru')->where('nisn', $nisn)->first();

        // Kirim respons dengan data user
        return response()->json([
            'datasiswa' => $siswa,
            'datajurnal' => $jurnal,
        ],200);

    }

}
