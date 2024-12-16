@extends('admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Daftar Pasien</h3>
                    <div class="card-tools">
                        <a href="{{ route('pasiens.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Tambah Pasien
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="pasiens-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>TTL</th>
                                    <th>Usia</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Diagnosa</th>
                                    <th>Tanggal Pemeriksaan</th>
                                    <th>Tanggal Pengambilan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pasiens as $patient)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $patient->nama_pasien }}</td>
                                    <td>{{ $patient->ttl->format('d/m/Y') }}</td>
                                    <td>{{ $patient->usia }}</td>
                                    <td>{{ $patient->sex === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                    <td>{{ $patient->alamat }}</td>
                                    <td>{{ $patient->no_hp }}</td>
                                    <td>{{ $patient->diagnosa }}</td>
                                    <td>{{ $patient->tgl_pemeriksaan->format('d/m/Y') }}</td>
                                    <td>{{ $patient->tgl_pengambilan ? $patient->tgl_pengambilan->format('d/m/Y') : '-' }}</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('pasiens.show', $patient->id) }}" class="btn btn-sm btn-info" title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                                <span>Lihat</span>
                                            </a>
                                            <a href="{{ route('pasiens.edit', $patient->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                                <span>Edit</span>
                                            </a>
                                            <form action="{{ route('pasiens.destroy', $patient->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="fas fa-trash"></i>
                                                    <span>Hapus</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="14" class="text-center">Tidak ada data pasien</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
