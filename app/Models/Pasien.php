<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasiens';

    protected $fillable = [
        'nama_pasien',
        'ttl',
        'usia', 
        'sex',
        'alamat',
        'no_hp',
        'diagnosa',
        'od_sph',
        'od_cyl',
        'od_axis',
        'os_sph',
        'os_cyl',
        'os_axis',
        'pd',
        'photo',
        'tgl_pemeriksaan',
        'tgl_pengambilan',
    ];

    protected $casts = [
        'ttl' => 'date',
        'tgl_pemeriksaan' => 'date',
        'tgl_pengambilan' => 'date',
        'usia' => 'integer',
    ];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }
}
