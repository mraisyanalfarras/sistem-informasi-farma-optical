@extends('admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Edit Lensa</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('lensas.update', $lensa->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-4">
                            <label for="nama_lensa" class="form-label fw-bold">Nama Lensa</label>
                            <input type="text" id="nama_lensa" name="nama_lensa" class="form-control @error('nama_lensa') is-invalid @enderror" placeholder="Masukkan nama lensa" value="{{ old('nama_lensa', $lensa->nama_lensa) }}" required>
                            @error('nama_lensa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukkan deskripsi lensa" rows="3">{{ old('deskripsi', $lensa->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="harga" class="form-label fw-bold">Harga</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" id="harga" name="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Masukkan harga" value="{{ old('harga', $lensa->harga) }}" required>
                                        @error('harga')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="stok" class="form-label fw-bold">Stok</label>
                                    <input type="number" id="stok" name="stok" class="form-control @error('stok') is-invalid @enderror" placeholder="Masukkan jumlah stok" value="{{ old('stok', $lensa->stok) }}" required>
                                    @error('stok')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="material" class="form-label fw-bold">Material</label>
                                    <input type="text" id="material" name="material" class="form-control @error('material') is-invalid @enderror" placeholder="Masukkan material lensa" value="{{ old('material', $lensa->material) }}">
                                    @error('material')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis" class="form-label fw-bold">Jenis</label>
                                    <input type="text" id="jenis" name="jenis" class="form-control @error('jenis') is-invalid @enderror" placeholder="Masukkan jenis lensa" value="{{ old('jenis', $lensa->jenis) }}" required>
                                    @error('jenis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Simpan
                            </button>
                            <a href="{{ route('lensas.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
