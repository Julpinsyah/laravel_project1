<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalLatihan extends Model
{
    use HasFactory;
    protected $table = 'tb_jadwallatihan';
    protected $guarded = ['id'];
}
