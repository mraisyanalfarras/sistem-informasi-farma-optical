<?php

namespace App\Http\Controllers;

use App\Models\Lensa;
use Illuminate\Http\Request;

class LensaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $lensas = Lensa::all();
            return view('admin.lensas.index', compact('lensas')); // For Web
            // return response()->json($lensas); // For API
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to load lensa data: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.lensas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lensa' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|string',
            'material' => 'nullable|string',
            'jenis' => 'required|string|max:50',
            'stok' => 'required|integer',
        ]);

        try {
            $lensa = Lensa::create($validated);
            return response()->json(['message' => 'Lensa data successfully added', 'data' => $lensa]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to add lensa data: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $lensa = Lensa::findOrFail($id);
            return response()->json($lensa);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Lensa data not found: ' . $e->getMessage()], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lensa $lensa)
    {
        return view('admin.lensas.edit', compact('lensa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_lensa' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|string',
            'material' => 'nullable|string',
            'jenis' => 'required|string|max:50',
            'stok' => 'required|integer',
        ]);

        try {
            $lensa = Lensa::findOrFail($id);
            $lensa->update($validated);
            return response()->json(['message' => 'Lensa data successfully updated', 'data' => $lensa]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update lensa data: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $lensa = Lensa::findOrFail($id);
            $lensa->delete();
            return response()->json(['message' => 'Lensa data successfully deleted']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete lensa data: ' . $e->getMessage()], 500);
        }
    }
}
