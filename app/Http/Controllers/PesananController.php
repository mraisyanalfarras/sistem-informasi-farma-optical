<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Pasien;
use App\Models\Lensa;
use App\Models\Frame;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{

    public function searchPasien(Request $request)
    {
        $search = $request->input('q');
        $pasiens = Pasien::where('nama_pasien', 'LIKE', "%{$search}%")
            ->orderBy('nama_pasien')
            ->get(['id', 'nama_pasien']);

        return response()->json($pasiens);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10); // Default to 10 if not set
        $pesanans = Pesanan::paginate($perPage);

        return view('admin.pesanan.index', compact('pesanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pasiens = Pasien::orderBy('nama_pasien')->get();
        $lensas = Lensa::where('stok', '>', 0)->orderBy('nama_lensa')->get();
        $frames = Frame::where('jumlah', '>', 0)->orderBy('name_frame')->get();
        
        return view('admin.pesanan.create', compact('pasiens', 'lensas', 'frames'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            // Validasi input
            $validated = $request->validate([
                'pasien_id' => 'required|exists:pasiens,id',
                'lensa_id' => 'required|exists:lensas,id',
                'frame_id' => 'required|exists:frames,id',
                'jumlah' => 'required|integer|min:1',
                'catatan' => 'nullable|string|max:1000',
                'tgl_pesan' => 'required|date',
                'tgl_selesai' => 'nullable|date|after_or_equal:tgl_pesan',
                'status' => 'required|in:pending,proses,selesai,diambil'
            ]);

            // Cek stok
            $lensa = Lensa::findOrFail($validated['lensa_id']);
            $frame = Frame::findOrFail($validated['frame_id']);

            if ($lensa->stok < $validated['jumlah'] || $frame->jumlah < $validated['jumlah']) {
                DB::rollback();
                return back()
                    ->withInput()
                    ->with('error', 'Stok tidak mencukupi');
            }

            // Hitung total harga
            $total_harga = ($lensa->harga_lensa + $frame->harga_frame) * $validated['jumlah'];

            // Buat pesanan baru
            $pesanan = new Pesanan();
            $pesanan->pasien_id = $validated['pasien_id'];
            $pesanan->lensa_id = $validated['lensa_id'];
            $pesanan->frame_id = $validated['frame_id'];
            $pesanan->jumlah = $validated['jumlah'];
            $pesanan->total_harga = $total_harga;
            $pesanan->status = $validated['status'];
            $pesanan->catatan = $validated['catatan'];
            $pesanan->tgl_pesan = $validated['tgl_pesan'];
            $pesanan->tgl_selesai = $validated['tgl_selesai'];
            $pesanan->save();

            // Update stok
            $lensa->decrement('stok', $validated['jumlah']);
            $frame->decrement('jumlah', $validated['jumlah']);

            DB::commit();

            return redirect()
                ->route('pesanan.index')
                ->with('success', 'Pesanan berhasil dibuat');

        } catch (\Exception $e) {
            DB::rollback();
            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat membuat pesanan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesanan $pesanan)
    {
        $pesanan->load(['pasien', 'lensa', 'frame']);
        return view('admin.pesanan.show', compact('pesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        $pasiens = Pasien::orderBy('nama_pasien')->get();
        $lensas = Lensa::where('stok', '>', 0)
            ->orWhere('id', $pesanan->lensa_id)
            ->orderBy('nama_lensa')
            ->get();
        $frames = Frame::where('jumlah', '>', 0)
            ->orWhere('id', $pesanan->frame_id)
            ->orderBy('name_frame')
            ->get();

        return view('admin.pesanan.edit', compact('pesanan', 'pasiens', 'lensas', 'frames'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,proses,selesai,diambil',
            'catatan' => 'nullable|string|max:1000',
            'tgl_selesai' => 'nullable|date'
        ]);

        try {
            $pesanan->update($validated);

            return redirect()
                ->route('pesanan.index')
                ->with('success', 'Pesanan berhasil diperbarui');

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui pesanan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        try {
            DB::beginTransaction();

            $lensa = Lensa::findOrFail($pesanan->lensa_id);
            $frame = Frame::findOrFail($pesanan->frame_id);
            
            $lensa->increment('stok', $pesanan->jumlah);
            $frame->increment('jumlah', $pesanan->jumlah);

            $pesanan->delete();

            DB::commit();

            return redirect()
                ->route('pesanan.index')
                ->with('success', 'Pesanan berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollback();
            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menghapus pesanan: ' . $e->getMessage());
        }
        
    }
}
