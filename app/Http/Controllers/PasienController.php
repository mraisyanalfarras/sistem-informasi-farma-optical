<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10); // Default to 10 if not set
        $pasiens = Pasien::paginate($perPage);
        return view('admin.pasiens.index', compact('pasiens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pasiens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pasien' => 'required|string',
            'ttl' => 'required|date',
            'usia' => 'required|integer', 
            'sex' => 'required|in:L,P',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'diagnosa' => 'required|string',
            'od_sph' => 'nullable|string',
            'od_cyl' => 'nullable|string',
            'od_axis' => 'nullable|string', 
            'os_sph' => 'nullable|string',
            'os_cyl' => 'nullable|string',
            'os_axis' => 'nullable|string',
            'pd' => 'nullable|string',
            'tgl_pemeriksaan' => 'required|date',
            'tgl_pengambilan' => 'nullable|date'
        ]);

        try {
            $pasien = Pasien::create($validated);
            return redirect()->route('pasiens.index')
                           ->with('success', 'Data pasien berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menambahkan data pasien: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasien $pasien)
    {
        return view('admin.pasiens.show', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasien $pasien)
    {
        return view('admin.pasiens.edit', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {
        $validated = $request->validate([
            'nama_pasien' => 'required|string',
            'ttl' => 'required|date',
            'usia' => 'required|integer',
            'sex' => 'required|in:L,P',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'diagnosa' => 'required|string',
            'od_sph' => 'nullable|string',
            'od_cyl' => 'nullable|string',
            'od_axis' => 'nullable|string',
            'os_sph' => 'nullable|string',
            'os_cyl' => 'nullable|string',
            'os_axis' => 'nullable|string',
            'pd' => 'nullable|string',
            'tgl_pemeriksaan' => 'required|date',
            'tgl_pengambilan' => 'nullable|date'
        ]);

        try {
            $pasien->update($validated);
            return redirect()->route('pasiens.index')
                           ->with('success', 'Data pasien berhasil diperbarui');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memperbarui data pasien: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
        try {
            $pasien->delete();
            return redirect()->route('pasiens.index')
                           ->with('success', 'Data pasien berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus data pasien: ' . $e->getMessage());
        }
    }
}
