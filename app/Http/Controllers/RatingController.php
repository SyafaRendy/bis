<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    //Fuction ini berfungsi untuk membuat data rating tempat PKL
    public function create(Request $request){
        $rating=new Rating();
        $rating->nisn=$request->nisn;
        $rating->id_perusahaan=$request->id_perusahaan;
        $rating->kesan=$request->kesan;
        $rating->pesan=$request->pesan;
        $rating->rating=$request->rating;
        $rating->save();

        return response()->json($rating, 200);
    }

    
    //Fuction ini berfungsi untuk mengambil data rating tempat PKL dengan parameter nisn
    public function index(Request $request, $nisn){
        $rating = Rating::where('nisn', $nisn)->get();

        return response()->json($rating, 200);
    }

    //Fuction ini berfungsi untuk mengambil semua data rating tempat PKL
    public function getRating(){
        $rating = Rating::with('tempatpkl')->get();

        return response()->json($rating, 200);
    }
}
