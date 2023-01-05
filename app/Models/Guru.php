<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table='gurupembimbing';
    protected $fillable=[
        'nip',
        'nama',
        'no_telp',
        'username',
    ];
}
