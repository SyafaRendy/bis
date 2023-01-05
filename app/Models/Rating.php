<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table='kesanpesan';
    protected $fillable=[
        'nisn',
        'id_perusahaan',
        'kesan',
        'pesan',
        'rating',
    ];
    
    public function tempatpkl(){
        return $this->belongsTo(Tempatpkl::class, 'id_perusahaan', 'kode_perusahaan');
        }
}
