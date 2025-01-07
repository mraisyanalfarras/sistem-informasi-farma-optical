<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasienRequest;
use App\Http\Resources\PasienResource;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua pasien yang terbaru
        $pasiens = Pasien::latest()->get();
        // Mengembalikan data dalam bentuk resource collection
        return PasienResource::collection($pasiens);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PasienRequest $request)
    {
        // Menyimpan data pasien baru
        $pasien = Pasien::create($request->validated());
        // Mengembalikan pasien yang telah dibuat dalam bentuk resource
        return PasienResource::make($pasien);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasien $pasien)
    {
        // Menampilkan data pasien tertentu dalam bentuk resource
        return PasienResource::make($pasien);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PasienRequest $request, Pasien $pasien)
    {
        // Memperbarui data pasien
        $pasien->update($request->validated());
        // Mengembalikan data pasien yang telah diperbarui dalam bentuk resource
        return PasienResource::make($pasien);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
        // Menghapus data pasien
        $pasien->delete();
        // Mengembalikan response dengan status no content (204)
        return response()->noContent();
    }
}
