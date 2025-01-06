@extends('admin.app')

@section('title', 'Edit Pesanan')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-gradient-primary text-white py-4">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-white p-3 me-3">
                            <i class="fas fa-shopping-cart text-primary fa-2x"></i>
                        </div>
                        <div>
                            <h4 class="card-title mb-0">Edit Pesanan</h4>
                            <p class="mb-0 opacity-8">Silakan perbarui form di bawah ini dengan benar</p>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4">
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                            <i class="fas fa-exclamation-circle fa-2x me-3"></i>
                            <div>
                                <strong>Error!</strong> {{ session('error') }}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card shadow-sm mb-4">
                                    <div class="card-header bg-light py-3">
                                        <h6 class="mb-0"><i class="fas fa-user me-2"></i>Informasi Pasien</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-floating mb-3">
                                            <select name="pasien_id" class="form-select select2 @error('pasien_id') is-invalid @enderror" id="pasienSelect" required>
                                                <option value="">Cari Pasien...</option>
                                                @foreach($pasiens as $pasien)
                                                    <option value="{{ $pasien->id }}" {{ old('pasien_id', $pesanan->pasien_id) == $pasien->id ? 'selected' : '' }}>
                                                        {{ $pasien->nama_pasien }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="pasienSelect">Pasien</label>
                                            @error('pasien_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="card shadow-sm mb-4">
                                    <div class="card-header bg-light py-3">
                                        <h6 class="mb-0"><i class="fas fa-glasses me-2"></i>Produk</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-floating mb-3">
                                            <select name="frame_id" id="frame_id" class="form-select @error('frame_id') is-invalid @enderror" required>
                                                <option value="">Pilih Frame</option>
                                                @foreach($frames as $frame)
                                                    <option value="{{ $frame->id }}" data-harga="{{ $frame->harga_frame }}" {{ old('frame_id', $pesanan->frame_id) == $frame->id ? 'selected' : '' }}>
                                                        {{ $frame->name_frame }} - Rp {{ number_format($frame->harga_frame, 0, ',', '.') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="frame_id">Frame</label>
                                            @error('frame_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3">
                                            <select name="lensa_id" id="lensa_id" class="form-select @error('lensa_id') is-invalid @enderror" required>
                                                <option value="">Pilih Lensa</option>
                                                @foreach($lensas as $lensa)
                                                    <option value="{{ $lensa->id }}" data-harga="{{ $lensa->harga_lensa }}" {{ old('lensa_id', $pesanan->lensa_id) == $lensa->id ? 'selected' : '' }}>
                                                        {{ $lensa->nama_lensa }} - Rp {{ number_format($lensa->harga_lensa, 0, ',', '.') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="lensa_id">Lensa</label>
                                            @error('lensa_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-floating">
                                            <input type="number" name="jumlah" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah', $pesanan->jumlah) }}" min="1" required>
                                            <label for="jumlah">Jumlah</label>
                                            @error('jumlah')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card shadow-sm mb-4">
                                    <div class="card-header bg-light py-3">
                                        <h6 class="mb-0"><i class="fas fa-calendar-alt me-2"></i>Informasi Pesanan</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-floating mb-3">
                                            <input type="date" name="tgl_pesan" class="form-control @error('tgl_pesan') is-invalid @enderror" value="{{ old('tgl_pesan', $pesanan->tgl_pesan) }}" required>
                                            <label>Tanggal Pesan</label>
                                            @error('tgl_pesan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="date" name="tgl_selesai" class="form-control @error('tgl_selesai') is-invalid @enderror" value="{{ old('tgl_selesai', $pesanan->tgl_selesai) }}">
                                            <label>Tanggal Selesai</label>
                                            @error('tgl_selesai')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3">
                                            <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                                <option value="">Pilih Status</option>
                                                <option value="pending" {{ old('status', $pesanan->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="proses" {{ old('status', $pesanan->status) == 'proses' ? 'selected' : '' }}>Proses</option>
                                                <option value="selesai" {{ old('status', $pesanan->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                                <option value="diambil" {{ old('status', $pesanan->status) == 'diambil' ? 'selected' : '' }}>Diambil</option>
                                            </select>
                                            <label>Status</label>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-floating">
                                            <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" style="height: 120px">{{ old('catatan', $pesanan->catatan) }}</textarea>
                                            <label>Catatan</label>
                                            @error('catatan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow-sm mb-4">
                                    <div class="card-header bg-light py-3">
                                        <h6 class="mb-0"><i class="fas fa-money-bill me-2"></i>Total Harga</h6>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" id="total_harga" class="form-control form-control-lg text-end fw-bold" readonly value="{{ old('total_harga', $pesanan->total_harga ? number_format($pesanan->total_harga, 0, ',', '.') : '') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-4">
                            <a href="{{ route('pesanan.index') }}" class="btn btn-light btn-lg">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-save me-2"></i>Update Pesanan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const frameSelect = document.getElementById('frame_id');
    const lensaSelect = document.getElementById('lensa_id');
    const jumlahInput = document.getElementById('jumlah');
    const totalHargaInput = document.getElementById('total_harga');

    function formatRupiah(angka) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(angka);
    }

    function hitungTotal() {
        const frameOption = frameSelect.options[frameSelect.selectedIndex];
        const lensaOption = lensaSelect.options[lensaSelect.selectedIndex];
        const jumlah = parseInt(jumlahInput.value) || 1;

        if (frameOption && lensaOption && frameOption.value && lensaOption.value) {
            const hargaFrame = parseInt(frameOption.dataset.harga) || 0;
            const hargaLensa = parseInt(lensaOption.dataset.harga) || 0;
            const total = (hargaFrame + hargaLensa) * jumlah;
            totalHargaInput.value = formatRupiah(total);
        }
    }

    if (frameSelect.value && lensaSelect.value) {
        hitungTotal();
    }

    frameSelect.addEventListener('change', hitungTotal);
    lensaSelect.addEventListener('change', hitungTotal);
    jumlahInput.addEventListener('change', hitungTotal);
    jumlahInput.addEventListener('keyup', hitungTotal);
});
</script>

@endsection
