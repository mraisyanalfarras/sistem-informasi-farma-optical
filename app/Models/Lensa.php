<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class lensa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lensa',
        'deskripsi',
        'harga',
        'material',
        'jenis',
        'stok'
    ];
}
