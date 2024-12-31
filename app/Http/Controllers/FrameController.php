<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrameController extends Controller
{
    public function index(Request $request)
    {
        // Get entries per page from request, default to 10 if not specified
        $perPage = $request->get('per_page', 10);

        // Fetch frames using query builder and paginate
        $frames = DB::table('frames')->paginate($perPage);
        return view('admin.frames.index', compact('frames'));
    }

    public function create()
    {
        return view('admin.frames.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_frame' => 'required|string|max:255',
            'perusahaan' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'harga_frame' => 'required|integer|min:0',
            'merek' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:0',
        ]);

        try {
            // Insert the new frame into the database
            DB::table('frames')->insert([
                'name_frame' => $request->name_frame,
                'perusahaan' => $request->perusahaan,
                'jenis' => $request->jenis,
                'harga_frame' => $request->harga_frame,
                'merek' => $request->merek,
                'jumlah' => $request->jumlah,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('frames.index')->with('success', 'Frame berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menambahkan frame. ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        // Fetch the frame by ID
        $frame = DB::table('frames')->where('id', $id)->first();

        if (!$frame) {
            return redirect()->route('frames.index')->with('error', 'Frame tidak ditemukan.');
        }

        return view('admin.frames.edit', compact('frame'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_frame' => 'required|string|max:255',
            'perusahaan' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'harga_frame' => 'required|integer|min:0',
            'merek' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:0',
        ]);

        try {
            // Update the frame
            DB::table('frames')->where('id', $id)->update([
                'name_frame' => $request->name_frame,
                'perusahaan' => $request->perusahaan,
                'jenis' => $request->jenis,
                'harga_frame' => $request->harga_frame,
                'merek' => $request->merek,
                'jumlah' => $request->jumlah,
                'updated_at' => now(),
            ]);

            return redirect()->route('frames.index')->with('success', 'Frame berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui frame. ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            // Delete the frame by ID
            DB::table('frames')->where('id', $id)->delete();

            return redirect()->route('frames.index')->with('success', 'Frame berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus frame. ' . $e->getMessage());
        }
    }
}
