<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description', 
        'start_date',
        'end_date',
        'is_active'
    ];

    /**
     * Aturan validasi untuk model Promotion
     * 
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'is_active' => 'boolean'
    ];
}