<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurnal;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ImageStoreRequest;

class JurnalController extends Controller
{

    //Function ini berfungsi untuk membuat jurnal siswa PKL
    public function create (Request $request){
        $jurnal=new jurnal();
        $jurnal->nisn=$request->nisn;
        $jurnal->tanggal=$request->tanggal;
        $jurnal->kegiatan=$request->kegiatan;
        $jurnal->dokumentasi=$request->file('dokumentasi')->store('dokumentasi');
        $jurnal->save();

        return response()->json($jurnal, 200);
    }


    //Function ini berfungsi untuk mengupdate data jurnal PKL siswa
    // public function update(Request $request, $id){

    //     $jurnal= jurnal::find($id);
    //     $jurnal->kegiatan = $request->input('kegiatan');
    //     $jurnal->save();

    // return response()->json([
    //     'message' => 'Successfully updated jurnal!'
    // ], 200);

    // }


    //Fuction ini berfungsi untuk menghapus data jurnal siswa PKL
    public function delete($id){
        $jurnal= jurnal::find($id);
        $jurnal->delete();

        return response()->json([
            'message' => 'Successfully delete jurnal!'
        ], 200);
    }

   
    //Fuction ini untuk mengambil satu data jurnal dengan parameter id
    public function detail($id){
        $jurnal= jurnal::find($id);
        return response()->json($jurnal, 200);
    }


    //Fuction ini berfungsi untuk mengambil data jurnal siswa PKL dengan parameter $nisn34
    public function index(Request $request, $nisn){
        $jurnal = Jurnal::where('nisn', $nisn)->get();
        return response()->json($jurnal, 200);
       
    }


    //Function ini berfungsi untuk mengupdate data jurnal PKL siswa
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kegiatan' => 'required',
        ]);
    
        if ($validator->fails()) {
            // Jika validasi gagal, kembalikan response dengan status 422 dan pesan error
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 422);
        }
    
        // Update data di database
        $jurnal = Jurnal::findOrFail($id);
        $jurnal->kegiatan = $request->input('kegiatan');
        $jurnal->save();
    
        // Kembalikan response dengan status 200 dan pesan sukses
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diupdate'
        ], 200);

    }
}