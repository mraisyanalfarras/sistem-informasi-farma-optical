<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Tentukan tabel jika nama tabel tidak sesuai konvensi Laravel
    protected $table = 'roles';

    // Tentukan kolom mana saja yang dapat diisi (mass assignable)
    protected $fillable = ['name'];

    // Tentukan relasi antara Role dan User
    public function users()
    {
        return $this->hasMany(User::class, 'role_id'); // relasi one-to-many ke tabel users
    }
}
