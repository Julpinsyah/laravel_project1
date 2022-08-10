<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    use HasFactory;
    protected $table  = 'tb_berita';

    protected $fillable = [
        'judul', 'gambar', 'tanggal', 'tentang', 'deskripsi', 'aktif'
    ];
}
