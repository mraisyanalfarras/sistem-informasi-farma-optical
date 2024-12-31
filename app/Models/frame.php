<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frame extends Model
{
    use HasFactory;

    protected $table = 'frames';

    protected $fillable = [
        'name_frame',
        'perusahaan',
        'jenis', 
        'harga_frame',
        'merek',
        'jumlah'
    ];

    protected $casts = [
        'harga_frame' => 'integer',
        'jumlah' => 'string'
    ];

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }
}
