<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowonganKerja extends Model
{
    public $table = "lowongan_kerja";    
    protected $guarded = ['id'];

    use HasFactory;
}
