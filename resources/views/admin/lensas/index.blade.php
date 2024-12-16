@extends('admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Daftar Lensa</h3>
                    <div class="card-tools">
                        <a href="{{ route('lensas.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Tambah Lensa
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
                        <table class="table table-bordered table-hover" id="lensas-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lensa</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Material</th>
                                    <th>Jenis</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($lensas as $lensa)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $lensa->nama_lensa }}</td>
                                    <td>{{ $lensa->deskripsi }}</td>
                                    <td>Rp {{ number_format($lensa->harga, 0, ',', '.') }}</td>
                                    <td>{{ $lensa->material }}</td>
                                    <td>{{ $lensa->jenis }}</td>
                                    <td>{{ $lensa->stok }}</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('lensas.show', $lensa->id) }}" class="btn btn-sm btn-info" title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                                <span>Lihat</span>
                                            </a>
                                            <a href="{{ route('lensas.edit', $lensa->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                                <span>Edit</span>
                                            </a>
                                            <form action="{{ route('lensas.destroy', $lensa->id) }}" method="POST" style="display: inline;">
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
                                    <td colspan="8" class="text-center">Tidak ada data lensa</td>
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
