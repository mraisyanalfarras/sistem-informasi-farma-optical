@extends('admin.app')

@section('title', 'Tambah Pasien')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="card shadow-lg rounded-3">
                <div class="card-header bg-gradient bg-white py-3">
                    <h5 class="card-title mb-0 text-primary fw-bold">
                        <i class="fas fa-user-plus me-2"></i>Tambah Pasien
                    </h5>
                </div>
                <div class="card-body px-4">
                    <form action="{{ route('pasiens.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama_pasien" class="form-label">Nama Pasien</label>
                                    <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Masukkan nama pasien" required>
                                </div>
                                <div class="mb-3">
                                    <label for="ttl" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="ttl" name="ttl" required>
                                </div>
                                <div class="mb-3">
                                    <label for="usia" class="form-label">Usia</label>
                                    <input type="number" class="form-control" id="usia" name="usia" placeholder="Masukkan usia pasien" required>
                                </div>
                                <div class="mb-3">
                                    <label for="sex" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" id="sex" name="sex" required>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No HP</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan nomor HP" required>
                                </div>
                                <div class="mb-3">
                                    <label for="diagnosa" class="form-label">Diagnosa</label>
                                    <textarea class="form-control" id="diagnosa" name="diagnosa" rows="3" placeholder="Masukkan diagnosa" required></textarea>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">
                        <h5 class="text-primary fw-bold">Pemeriksaan Mata</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="od_sph" class="form-label">OD (Kanan) SPH</label>
                                    <input type="text" class="form-control" id="od_sph" name="od_sph" placeholder="Masukkan nilai SPH">
                                </div>
                                <div class="mb-3">
                                    <label for="od_cyl" class="form-label">OD (Kanan) CYL</label>
                                    <input type="text" class="form-control" id="od_cyl" name="od_cyl" placeholder="Masukkan nilai CYL">
                                </div>
                                <div class="mb-3">
                                    <label for="od_axis" class="form-label">OD (Kanan) AXIS</label>
                                    <input type="text" class="form-control" id="od_axis" name="od_axis" placeholder="Masukkan nilai AXIS">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="os_sph" class="form-label">OS (Kiri) SPH</label>
                                    <input type="text" class="form-control" id="os_sph" name="os_sph" placeholder="Masukkan nilai SPH">
                                </div>
                                <div class="mb-3">
                                    <label for="os_cyl" class="form-label">OS (Kiri) CYL</label>
                                    <input type="text" class="form-control" id="os_cyl" name="os_cyl" placeholder="Masukkan nilai CYL">
                                </div>
                                <div class="mb-3">
                                    <label for="os_axis" class="form-label">OS (Kiri) AXIS</label>
                                    <input type="text" class="form-control" id="os_axis" name="os_axis" placeholder="Masukkan nilai AXIS">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="pd" class="form-label">Pupillary Distance (PD)</label>
                            <input type="text" class="form-control" id="pd" name="pd" placeholder="Masukkan nilai PD">
                        </div>

                        <hr class="my-4">
                        <h5 class="text-primary fw-bold">Detail Pemeriksaan</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tgl_pemeriksaan" class="form-label">Tanggal Pemeriksaan</label>
                                    <input type="date" class="form-control" id="tgl_pemeriksaan" name="tgl_pemeriksaan" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tgl_pengambilan" class="form-label">Tanggal Pengambilan</label>
                                    <input type="date" class="form-control" id="tgl_pengambilan" name="tgl_pengambilan">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('pasiens.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
