<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LensaRequest;
use App\Http\Resources\LensaResource;
use App\Models\Lensa;
use Illuminate\Http\Request;

class LensaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data lensa yang terbaru
        $lensas = Lensa::latest()->get();
        // Mengembalikan data dalam bentuk resource collection
        return LensaResource::collection($lensas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LensaRequest $request)
    {
        // Menyimpan data lensa baru
        $lensa = Lensa::create($request->validated());
        // Mengembalikan data lensa yang telah dibuat dalam bentuk resource
        return LensaResource::make($lensa);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lensa $lensa)
    {
        // Menampilkan data lensa tertentu dalam bentuk resource
        return LensaResource::make($lensa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LensaRequest $request, Lensa $lensa)
    {
        // Memperbarui data lensa
        $lensa->update($request->validated());
        // Mengembalikan data lensa yang telah diperbarui dalam bentuk resource
        return LensaResource::make($lensa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lensa $lensa)
    {
        // Menghapus data lensa
        $lensa->delete();
        // Mengembalikan response dengan status no content (204)
        return response()->noContent();
    }
}
