<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans';

    protected $fillable = [
        'pasien_id',
        'lensa_id', 
        'frame_id',
        'jumlah',
        'total_harga',
        'status',
        'catatan',
        'tgl_pesan',
        'tgl_selesai'
    ];

    protected $casts = [
        'total_harga' => 'decimal:2',
        'tgl_pesan' => 'date',
        'tgl_selesai' => 'date'
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function lensa() 
    {
        return $this->belongsTo(Lensa::class);
    }

    public function frame()
    {
        return $this->belongsTo(Frame::class);
    }
}
