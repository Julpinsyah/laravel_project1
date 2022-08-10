<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertandingan extends Model
{
    use HasFactory;
    protected $table = "tb_jadwaltanding";
    protected $fillable = ['idtanding','tanggal','waktu','tanding','tandang','lapangan','lokasi','aktif','map'];
}
