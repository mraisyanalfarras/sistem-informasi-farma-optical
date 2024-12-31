@extends('admin.app')

@section('title', 'Daftar Lensa')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg rounded-3">
                <div class="card-header bg-gradient bg-white d-flex justify-content-between align-items-center py-3">
                    <h5 class="card-title mb-0 text-primary fw-bold">
                        <i class="fas fa-glasses me-2"></i>Daftar Lensa
                    </h5>
                    <div class="card-tools d-flex align-items-center gap-3">
                        <form action="{{ route('lensas.index') }}" method="GET" class="d-flex align-items-center">
                            <select class="form-select form-select-sm me-2 shadow-sm" name="per_page" id="entries" style="width: auto;" onchange="this.form.submit()">
                                <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                                <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                                <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                                <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                            </select>
                        </form>
                        <a href="{{ route('lensas.create') }}" class="btn btn-primary shadow-sm">
                            <i class="fas fa-plus me-2"></i>Tambah Lensa
                        </a>
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
                        <table class="table table-hover table-striped align-middle" id="lensas-table">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" style="width: 5%;">No</th>
                                    <th style="min-width: 150px;">Nama Lensa</th>
                                    <th style="min-width: 200px;">Deskripsi</th>
                                    <th style="min-width: 100px;">Material</th>
                                    <th style="min-width: 120px;">Harga Lensa</th>
                                    <th style="min-width: 100px;">Jenis</th>
                                    <th style="width: 80px;">Stok</th>
                                    <th class="text-center" style="width: 15%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($lensas as $lensa)
                                <tr>
                                    <td class="text-center">{{ ($lensas->currentPage() - 1) * $lensas->perPage() + $loop->iteration }}</td>
                                    <td class="fw-semibold">{{ $lensa->nama_lensa }}</td>
                                    <td>{{ $lensa->deskripsi }}</td>
                                    <td>{{ $lensa->material }}</td>
                                    <td>Rp {{ number_format($lensa->harga_lensa, 0, ',', '.') }}</td>
                                    <td>{{ $lensa->jenis }}</td>
                                    <td class="text-center">
                                        <span class="badge {{ $lensa->stok > 10 ? 'bg-success' : ($lensa->stok > 0 ? 'bg-warning' : 'bg-danger') }}">
                                            {{ $lensa->stok }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('lensas.show', $lensa->id) }}" 
                                               class="btn btn-info btn-sm shadow-sm"
                                               data-bs-toggle="tooltip"
                                               title="Detail">
                                                <i class="fas fa-eye"></i>
                                                Show
                                            </a>
                                            <a href="{{ route('lensas.edit', $lensa->id) }}" 
                                               class="btn btn-warning btn-sm shadow-sm"
                                               data-bs-toggle="tooltip"
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </a>
                                            <form action="{{ route('lensas.destroy', $lensa->id) }}" 
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
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-5 text-muted">
                                        <i class="fas fa-inbox fa-3x mb-3 d-block opacity-50"></i>
                                        <span class="fw-light">Tidak ada data lensa</span>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 d-flex justify-content-end">
                        {{ $lensas->appends(['per_page' => request('per_page')])->links('pagination::bootstrap-5') }}
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

.card {
    border: none;
    margin-bottom: 1.5rem;
}

.table-responsive {
    border-radius: 0.375rem;
    overflow-x: auto;
}

.pagination {
    margin-bottom: 0;
    gap: 5px;
}
</style>
@endsection
