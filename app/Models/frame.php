<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class frame extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_frame',
        'perusahaan',
        'jenis',
        'merek',
        'jumlah',
    ];
}
