@extends('admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center border-bottom border-2">
                    <h3 class="card-title mb-0">Detail Pasien</h3>
                    <div class="card-tools">
                        <a href="{{ route('pasiens.index') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow-sm mb-4">
                                <div class="card-header border-bottom border-2">
                                    <h5 class="card-title mb-0"><i class="fas fa-user me-2"></i>Informasi Pribadi</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover">
                                        <tr>
                                            <th width="200" class="text-muted"><i class="fas fa-id-card me-2"></i>Nama Pasien</th>
                                            <td class="fw-bold">{{ $pasien->nama_pasien }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted"><i class="fas fa-calendar me-2"></i>Tanggal Lahir</th>
                                            <td>{{ $pasien->ttl->format('d/m/Y') }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted"><i class="fas fa-birthday-cake me-2"></i>Usia</th>
                                            <td>{{ $pasien->usia }} tahun</td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted"><i class="fas fa-venus-mars me-2"></i>Jenis Kelamin</th>
                                            <td>{{ $pasien->sex === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted"><i class="fas fa-map-marker-alt me-2"></i>Alamat</th>
                                            <td>{{ $pasien->alamat }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted"><i class="fas fa-phone me-2"></i>No HP</th>
                                            <td>{{ $pasien->no_hp }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted"><i class="fas fa-stethoscope me-2"></i>Diagnosa</th>
                                            <td>{{ $pasien->diagnosa }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card shadow-sm mb-4">
                                <div class="card-header border-bottom border-2">
                                    <h5 class="card-title mb-0"><i class="fas fa-eye me-2"></i>Data Pemeriksaan Mata</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <div class="card bg-light">
                                                <div class="card-header border-bottom">
                                                    <h6 class="mb-0">OD (Mata Kanan)</h6>
                                                </div>
                                                <div class="card-body">
                                                    <p class="mb-1"><strong>SPH:</strong> {{ $pasien->od_sph ?: '-' }}</p>
                                                    <p class="mb-1"><strong>CYL:</strong> {{ $pasien->od_cyl ?: '-' }}</p>
                                                    <p class="mb-0"><strong>AXIS:</strong> {{ $pasien->od_axis ?: '-' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card bg-light">
                                                <div class="card-header border-bottom">
                                                    <h6 class="mb-0">OS (Mata Kiri)</h6>
                                                </div>
                                                <div class="card-body">
                                                    <p class="mb-1"><strong>SPH:</strong> {{ $pasien->os_sph ?: '-' }}</p>
                                                    <p class="mb-1"><strong>CYL:</strong> {{ $pasien->os_cyl ?: '-' }}</p>
                                                    <p class="mb-0"><strong>AXIS:</strong> {{ $pasien->os_axis ?: '-' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <table class="table table-hover">
                                        <tr>
                                            <th width="200" class="text-muted"><i class="fas fa-ruler-horizontal me-2"></i>PD</th>
                                            <td>{{ $pasien->pd ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted"><i class="fas fa-calendar-check me-2"></i>Tanggal Pemeriksaan</th>
                                            <td>{{ $pasien->tgl_pemeriksaan->format('d/m/Y') }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted"><i class="fas fa-calendar-alt me-2"></i>Tanggal Pengambilan</th>
                                            <td>{{ $pasien->tgl_pengambilan ? $pasien->tgl_pengambilan->format('d/m/Y') : '-' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-3">
                        <a href="{{ route('pasiens.edit', $pasien->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>Edit Data
                        </a>
                        <form action="{{ route('pasiens.destroy', $pasien->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash me-2"></i>Hapus Data
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
