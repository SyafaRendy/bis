<?php

namespace App\Models;
use App\Models\Tempatpkl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Siswa extends Model
{
    protected $table='siswa';
    protected $fillable=[
        'nisn',
        'nama',
        'kelas',
        'alamat',
        'no_telp',
        'username',
        'id_perusahaan',
        'nip_pembimbing'
    ];

    public function tempatpkl(){
        return $this->belongsTo(Tempatpkl::class, 'id_perusahaan', 'kode_perusahaan');
        }
        
    public function guru(){
        return $this->belongsTo(Guru::class, 'nip_pembimbing', 'nip');
        }

    
}
