<?php

namespace App\Http\Controllers;

use App\Models\frame;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrameController extends Controller
{
    /**
     * Menampilkan daftar frame
     */
    public function index()
    {
        $frames = Frame::all();
        return view('admin.frames.index', compact('frames')); // For Web
        return response()->json($frames);
    }

    /**
     * Menampilkan form untuk membuat frame baru
     */
    public function create()
    {
        return view('admin.frames.create');
    }

    /**
     * Menyimpan frame baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_frame' => 'required|string|max:255',
            'perusahaan' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'merek' => 'required|string|max:255',
            'jumlah' => 'nullable|string',
        ]);

        Frame::create($request->all());

        return redirect()->route('frames.index')
            ->with('success', 'Data frame berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail frame
     */
    public function show(Frame $frame)
    {
        return response()->json($frame);
    }

    /**
     * Menampilkan form untuk mengedit frame
     */
    public function edit(Frame $frame)
    {
        return view('admin.frames.edit', compact('frame'));
    }

    /**
     * Mengupdate data frame di database
     */
    public function update(Request $request, Frame $frame)
    {
        $validated = $request->validate([
            'name_frame' => 'required|string|max:255',
            'perusahaan' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'merek' => 'required|string|max:255',
            'jumlah' => 'nullable|string',
        ]);

        $frame->update($validated);

        return redirect()->route('frames.index')
            ->with('success', 'Data frame berhasil diperbarui.');
    }

    /**
     * Menghapus frame dari database
     */
    public function destroy(Frame $frame)
    {
        $frame->delete();

        return redirect()->route('frames.index')
            ->with('success', 'Data frame berhasil dihapus.');
    }
}

