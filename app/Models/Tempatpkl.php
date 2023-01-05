<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tempatpkl extends Model
{
    protected $table='tempatpkl';
    protected $fillable=[
        'kode_perusahaan',
        'nama',
        'nama_pimpinan',
        'alamat',
        'no_telp',
    ];
}
