<?php

namespace App\Http\Controllers;
use App\Models\absen;

use Illuminate\Http\Request;

class AbsenController extends Controller
{      
    //Function ini berfungsi untuk membuat data absensi siswa
    public function create(Request $request){
        $absen=new absen();
        $absen->nisn=$request->nisn;
        $absen->tanggal=$request->tanggal;
        $absen->keterangan=$request->keterangan;
        $absen->alasan=$request->alasan;
        $absen->save();
        return response()->json($absen, 200);
    }

    //Fuction ini untuk mengambil data absensi siswa menggunakan parameter $nisn
    public function index(Request $request, $nisn){
        $absen = Absen::where('nisn', $nisn)->get();
        return response()->json($absen, 200);
    }

}
