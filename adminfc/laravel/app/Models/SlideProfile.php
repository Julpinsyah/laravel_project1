<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlideProfile extends Model
{
    use HasFactory;
    protected $table = 'tb_slideprofil';
    protected $guarded = ['id'];
}
