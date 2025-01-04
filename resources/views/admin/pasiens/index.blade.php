@extends('admin.app')

@section('title', 'Daftar Pasien')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg rounded-3">
                <div class="card-header bg-gradient bg-white d-flex justify-content-between align-items-center py-3">
                    <h5 class="card-title mb-0 text-primary fw-bold">
                        <i class="fas fa-users me-2"></i>Daftar Pasien
                    </h5>
                    <div class="card-tools d-flex align-items-center gap-3">
                        <form action="{{ route('pasiens.index') }}" method="GET" class="d-flex align-items-center">
                            <select class="form-select form-select-sm me-2 shadow-sm" name="per_page" id="entries" style="width: auto;" onchange="this.form.submit()">
                                <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                                <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                                <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                                <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                            </select>
                        </form>
                        @can('add pasiens')
                            <a href="{{ route('pasiens.create') }}" class="btn btn-primary shadow-sm">
                                <i class="fas fa-plus me-2"></i>Tambah Pasien
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body px-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle" id="pasiens-table">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" style="width: 5%;">No</th>
                                    <th style="min-width: 150px;">Nama</th>
                                    <th style="min-width: 100px;">TTL</th>
                                    <th style="width: 50px;">Usia</th>
                                    <th style="min-width: 100px;">Jenis Kelamin</th>
                                    <th style="min-width: 200px;">Alamat</th>
                                    <th style="min-width: 100px;">No HP</th>
                                    <th style="min-width: 150px;">Diagnosa</th>
                                    <th style="min-width: 150px;">Tanggal Pemeriksaan</th>
                                    <th style="min-width: 150px;">Tanggal Pengambilan</th>
                                    <th style="min-width: 100px;">Foto</th> <!-- Tambahkan kolom Foto -->
                                    <th class="text-center" style="width: 15%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pasiens as $patient)
                                <tr>
                                    <td class="text-center">{{ ($pasiens->currentPage() - 1) * $pasiens->perPage() + $loop->iteration }}</td>
                                    <td class="fw-semibold">{{ $patient->nama_pasien }}</td>
                                    <td>{{ $patient->ttl->format('d/m/Y') }}</td>
                                    <td>{{ $patient->usia }}</td>
                                    <td>
                                        <span class="badge {{ $patient->sex === 'L' ? 'bg-info' : 'bg-pink' }}">
                                            {{ $patient->sex === 'L' ? 'Laki-laki' : 'Perempuan' }}
                                        </span>
                                    </td>
                                    <td>{{ $patient->alamat }}</td>
                                    <td>{{ $patient->no_hp }}</td>
                                    <td>{{ $patient->diagnosa }}</td>
                                    <td>{{ $patient->tgl_pemeriksaan->format('d/m/Y') }}</td>
                                    <td>{{ $patient->tgl_pengambilan ? $patient->tgl_pengambilan->format('d/m/Y') : '-' }}</td>
                                    <td>
                                        @if ($patient->photo)
                                            <img src="{{ asset('storage/' . $patient->photo) }}" 
                                                 alt="Foto {{ $patient->nama_pasien }}" 
                                                 class="img-thumbnail" 
                                                 style="width: 100px; height: 100px; object-fit: cover;">
                                        @else
                                            <span class="text-muted">Tidak ada foto</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            @can('show pasiens')
                                            <a href="{{ route('pasiens.show', $patient->id) }}" 
                                               class="btn btn-info btn-sm shadow-sm"
                                               data-bs-toggle="tooltip"
                                               title="Detail">
                                                <i class="fas fa-eye"></i>
                                                Show
                                            </a>
                                            @endcan
                                            @can('edit employees')
                                            <a href="{{ route('pasiens.edit', $patient->id) }}" 
                                               class="btn btn-warning btn-sm shadow-sm"
                                               data-bs-toggle="tooltip"
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </a>
                                            @endcan
                                            @can('delete employees')
                                            <form action="{{ route('pasiens.destroy', $patient->id) }}" 
                                                  method="POST" 
                                                  class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-danger btn-sm shadow-sm"
                                                        data-bs-toggle="tooltip"
                                                        title="Hapus"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="fas fa-trash"></i>
                                                    Hapus
                                                </button>
                                            </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="12" class="text-center py-5 text-muted">
                                        <i class="fas fa-inbox fa-3x mb-3 d-block opacity-50"></i>
                                        <span class="fw-light">Tidak ada data pasien</span>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    

                    <div class="mt-4 d-flex justify-content-end">
                        {{ $pasiens->appends(['per_page' => request('per_page')])->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Enable tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endpush

<style>
.btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    line-height: 1.5;
    border-radius: 0.375rem;
}

.btn-sm i {
    font-size: 14px;
    margin-right: 0.25rem;
}

.btn-sm:hover {
    transform: translateY(-2px);
    transition: transform 0.2s;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1) !important;
}

.gap-2 {
    gap: 0.75rem!important;
}

#entries {
    border-radius: 0.375rem;
    border-color: #dee2e6;
    padding: 0.375rem 2rem 0.375rem 0.75rem;
}

.table th {
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
}

.bg-pink {
    background-color: #e83e8c;
}

.card {
    border: none;
    margin-bottom: 1.5rem;
}

.table-responsive {
    border-radius: 0.375rem;
    overflow-x: auto;
}

/* Pagination styling */
.pagination {
    margin-bottom: 0;
    gap: 5px;
}

.page-item .page-link {
    border-radius: 0.375rem;
    padding: 0.5rem 0.75rem;
    color: #6c757d;
    background-color: #fff;
    border: 1px solid #dee2e6;
    font-weight: 500;
}

.page-item.active .page-link {
    background-color: #0d6efd;
    border-color: #0d6efd;
    color: #fff;
}

.page-item.disabled .page-link {
    color: #6c757d;
    pointer-events: none;
    background-color: #fff;
    border-color: #dee2e6;
}

.page-link:hover {
    background-color: #e9ecef;
    border-color: #dee2e6;
    color: #0d6efd;
}

.page-item:first-child .page-link,
.page-item:last-child .page-link {
    padding: 0.5rem 0.75rem;
}
</style>

@endsection
