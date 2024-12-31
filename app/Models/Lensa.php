<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lensa extends Model
{
    use HasFactory;

    protected $table = 'lensas';

    protected $fillable = [
        'nama_lensa',
        'deskripsi',
        'harga',
        'material', 
        'jenis',
        'stok'
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'stok' => 'integer'
    ];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }
    
}
