<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        
    ];

    /**
     * Aturan validasi untuk model Customer
     * 
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:customers,email',
        'address' => 'required|string'
    ];
}
