<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LensaController extends Controller
{
    public function index(Request $request)
    {
        // Get entries per page from request, default to 10 if not specified
        $perPage = $request->get('per_page', 10);

        // Fetch lenses using query builder and paginate
        $lensas = DB::table('lensas')->paginate($perPage);
        return view('admin.lensas.index', compact('lensas'));
    }

    public function create()
    {
        return view('admin.lensas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lensa' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'material' => 'nullable|string|max:255',
            'harga_lensa' => 'required|integer|min:0',
            'jenis' => 'required|string|max:50',
            'stok' => 'required|integer|min:0',
        ]);

        // Insert the new lens into the database
        DB::table('lensas')->insert([
            'nama_lensa' => $request->nama_lensa,
            'deskripsi' => $request->deskripsi,
            'material' => $request->material,
            'harga_lensa' => $request->harga_lensa,
            'jenis' => $request->jenis,
            'stok' => $request->stok,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('lensas.index')->with('success', 'Lensa created successfully.');
    }

    public function edit($id)
    {
        // Fetch the lens by ID
        $lensa = DB::table('lensas')->where('id', $id)->first();

        if (!$lensa) {
            return redirect()->route('lensas.index')->with('error', 'Lensa not found.');
        }

        return view('admin.lensas.edit', compact('lensa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lensa' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'material' => 'nullable|string|max:255',
            'harga_lensa' => 'required|integer|min:0',
            'jenis' => 'required|string|max:50',
            'stok' => 'required|integer|min:0',
        ]);

        // Update the lens
        DB::table('lensas')->where('id', $id)->update([
            'nama_lensa' => $request->nama_lensa,
            'deskripsi' => $request->deskripsi,
            'material' => $request->material,
            'harga_lensa' => $request->harga_lensa,
            'jenis' => $request->jenis,
            'stok' => $request->stok,
            'updated_at' => now(),
        ]);

        return redirect()->route('lensas.index')->with('success', 'Lensa updated successfully.');
    }

    public function destroy($id)
    {
        // Delete the lens by ID
        DB::table('lensas')->where('id', $id)->delete();

        return redirect()->route('lensas.index')->with('success', 'Lensa deleted successfully.');
    }
}
