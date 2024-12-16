@extends('admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Pasien</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('pasiens.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-4">
                            <label for="nama_pasien" class="form-label fw-bold">Nama Pasien</label>
                            <input type="text" id="nama_pasien" name="nama_pasien" class="form-control @error('nama_pasien') is-invalid @enderror" placeholder="Masukkan nama pasien" value="{{ old('nama_pasien') }}" required>
                            @error('nama_pasien')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="ttl" class="form-label fw-bold">Tanggal Lahir</label>
                            <input type="date" id="ttl" name="ttl" class="form-control @error('ttl') is-invalid @enderror" value="{{ old('ttl') }}" required>
                            @error('ttl')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="usia" class="form-label fw-bold">Usia</label>
                            <input type="number" id="usia" name="usia" class="form-control @error('usia') is-invalid @enderror" placeholder="Masukkan usia" value="{{ old('usia') }}" required>
                            @error('usia')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="sex" class="form-label fw-bold">Jenis Kelamin</label>
                            <select id="sex" name="sex" class="form-control @error('sex') is-invalid @enderror" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L" {{ old('sex') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('sex') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('sex')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="alamat" class="form-label fw-bold">Alamat</label>
                            <textarea id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan alamat" rows="3">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="no_hp" class="form-label fw-bold">Nomor HP</label>
                            <input type="text" id="no_hp" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Masukkan nomor HP" value="{{ old('no_hp') }}">
                            @error('no_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="diagnosa" class="form-label fw-bold">Diagnosa</label>
                            <textarea id="diagnosa" name="diagnosa" class="form-control @error('diagnosa') is-invalid @enderror" placeholder="Masukkan diagnosa" rows="3">{{ old('diagnosa') }}</textarea>
                            @error('diagnosa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label fw-bold">OD (Kanan)</label>
                                    <input type="text" name="od_sph" class="form-control @error('od_sph') is-invalid @enderror mb-2" placeholder="SPH" value="{{ old('od_sph') }}">
                                    @error('od_sph')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <input type="text" name="od_cyl" class="form-control @error('od_cyl') is-invalid @enderror mb-2" placeholder="CYL" value="{{ old('od_cyl') }}">
                                    @error('od_cyl')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <input type="text" name="od_axis" class="form-control @error('od_axis') is-invalid @enderror" placeholder="AXIS" value="{{ old('od_axis') }}">
                                    @error('od_axis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label fw-bold">OS (Kiri)</label>
                                    <input type="text" name="os_sph" class="form-control @error('os_sph') is-invalid @enderror mb-2" placeholder="SPH" value="{{ old('os_sph') }}">
                                    @error('os_sph')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <input type="text" name="os_cyl" class="form-control @error('os_cyl') is-invalid @enderror mb-2" placeholder="CYL" value="{{ old('os_cyl') }}">
                                    @error('os_cyl')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <input type="text" name="os_axis" class="form-control @error('os_axis') is-invalid @enderror" placeholder="AXIS" value="{{ old('os_axis') }}">
                                    @error('os_axis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pd" class="form-label fw-bold">PD</label>
                                    <input type="text" id="pd" name="pd" class="form-control @error('pd') is-invalid @enderror" placeholder="Masukkan PD" value="{{ old('pd') }}">
                                    @error('pd')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_pemeriksaan" class="form-label fw-bold">Tanggal Pemeriksaan</label>
                                    <input type="date" id="tgl_pemeriksaan" name="tgl_pemeriksaan" class="form-control @error('tgl_pemeriksaan') is-invalid @enderror" value="{{ old('tgl_pemeriksaan') }}" required>
                                    @error('tgl_pemeriksaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_pengambilan" class="form-label fw-bold">Tanggal Pengambilan</label>
                                    <input type="date" id="tgl_pengambilan" name="tgl_pengambilan" class="form-control @error('tgl_pengambilan') is-invalid @enderror" value="{{ old('tgl_pengambilan') }}" required>
                                    @error('tgl_pengambilan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('pasiens.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

