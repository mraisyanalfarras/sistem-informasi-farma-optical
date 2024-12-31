@extends('admin.app')

@section('title', 'Tambah Pasien')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg rounded-3">
                <div class="card-header bg-gradient bg-white py-3">
                    <h5 class="card-title mb-0 text-primary fw-bold">
                        <i class="fas fa-user-plus me-2"></i>Tambah Pasien
                    </h5>
                </div>
                <div class="card-body px-4">
                    <form action="{{ route('pasiens.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_pasien" class="form-label">Nama Pasien</label>
                            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" required>
                        </div>
                        <div class="mb-3">
                            <label for="ttl" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="ttl" name="ttl" required>
                        </div>
                        <div class="mb-3">
                            <label for="usia" class="form-label">Usia</label>
                            <input type="number" class="form-control" id="usia" name="usia" required>
                        </div>
                        <div class="mb-3">
                            <label for="sex" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="sex" name="sex" required>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                        </div>
                        <div class="mb-3">
                            <label for="diagnosa" class="form-label">Diagnosa</label>
                            <textarea class="form-control" id="diagnosa" name="diagnosa" rows="3" required></textarea>
                        </div>
                        <!-- Add other fields as necessary -->
                        <div class="mb-3">
                            <label for="tgl_pemeriksaan" class="form-label">Tanggal Pemeriksaan</label>
                            <input type="date" class="form-control" id="tgl_pemeriksaan" name="tgl_pemeriksaan" required>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_pengambilan" class="form-label">Tanggal Pengambilan</label>
                            <input type="date" class="form-control" id="tgl_pengambilan" name="tgl_pengambilan">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('pasiens.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
