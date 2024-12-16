@extends('admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Daftar Frame</h3>
                    <div class="card-tools">
                        <a href="{{ route('frames.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Tambah Frame
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
                        <table class="table table-bordered table-hover" id="frames-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Frame</th>
                                    <th>Perusahaan</th>
                                    <th>Jenis</th>
                                    <th>Merek</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($frames as $frame)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $frame->name_frame }}</td>
                                    <td>{{ $frame->perusahaan }}</td>
                                    <td>{{ $frame->jenis }}</td>
                                    <td>{{ $frame->merek }}</td>
                                    <td>{{ $frame->jumlah }}</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('frames.show', $frame->id) }}" class="btn btn-sm btn-info" title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                                <span>Lihat</span>
                                            </a>
                                            <a href="{{ route('frames.edit', $frame->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                                <span>Edit</span>
                                            </a>
                                            <form action="{{ route('frames.destroy', $frame->id) }}" method="POST" style="display: inline;">
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
                                    <td colspan="7" class="text-center">Tidak ada data frame</td>
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
