@extends('admin.app')

@section('title', 'Daftar Pesanan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg rounded-3">
                <div class="card-header bg-gradient bg-white d-flex justify-content-between align-items-center py-3">
                    <h5 class="card-title mb-0 text-primary fw-bold">
                        <i class="fas fa-shopping-cart me-2"></i>Daftar Pesanan
                    </h5>
                    <div class="card-tools d-flex align-items-center gap-3">
                        <form action="{{ route('pesanan.index') }}" method="GET" class="d-flex align-items-center">
                            <select class="form-select form-select-sm me-2 shadow-sm" name="per_page" id="entries" style="width: auto;" onchange="this.form.submit()">
                                <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                                <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                                <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                                <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                            </select>
                        </form>
                        <a href="{{ route('pesanan.create') }}" class="btn btn-primary shadow-sm">
                            <i class="fas fa-plus me-2"></i>Tambah Pesanan
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
                        <table class="table table-hover table-striped align-middle" id="pesanan-table">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="5%">No</th>
                                    <th>Nama Pasien</th>
                                    <th>Lensa</th>
                                    <th>Frame</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-end">Total Harga</th>
                                    <th class="text-center">Status</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Tanggal Selesai</th>
                                    <th class="text-center" width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pesanans as $pesanan)
                                <tr>
                                    <td class="text-center">{{ ($pesanans->currentPage() - 1) * $pesanans->perPage() + $loop->iteration }}</td>
                                    <td>{{ $pesanan->pasien->nama_pasien }}</td>
                                    <td>{{ $pesanan->lensa->nama_lensa }}</td>
                                    <td>{{ $pesanan->frame->name_frame }}</td>
                                    <td class="text-center">{{ $pesanan->jumlah }}</td>
                                    <td class="text-end">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                                    <td class="text-center">
                                        <span class="badge rounded-pill bg-{{ 
                                            $pesanan->status === 'pending' ? 'warning' :
                                            ($pesanan->status === 'proses' ? 'info' :
                                            ($pesanan->status === 'selesai' ? 'success' : 'primary'))
                                        }}">
                                            {{ ucfirst($pesanan->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $pesanan->tgl_pesan->format('d/m/Y') }}</td>
                                    <td>{{ $pesanan->tgl_selesai ? $pesanan->tgl_selesai->format('d/m/Y') : '-' }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('pesanan.show', $pesanan->id) }}" 
                                               class="btn btn-info btn-sm shadow-sm"
                                               data-bs-toggle="tooltip"
                                               title="Detail">
                                                <i class="fas fa-eye"></i>
                                                Show
                                            </a>
                                            <a href="{{ route('pesanan.edit', $pesanan->id) }}" 
                                               class="btn btn-warning btn-sm shadow-sm"
                                               data-bs-toggle="tooltip"
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </a>
                                            <form action="{{ route('pesanan.destroy', $pesanan->id) }}" 
                                                  method="POST" 
                                                  class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-danger btn-sm shadow-sm"
                                                        data-bs-toggle="tooltip"
                                                        title="Hapus"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">
                                                    <i class="fas fa-trash"></i>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center py-5 text-muted">
                                        <i class="fas fa-inbox fa-3x mb-3 d-block opacity-50"></i>
                                        <span class="fw-light">Tidak ada data pesanan</span>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 d-flex justify-content-end">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                {{-- Previous Page Link --}}
                                @if ($pesanans->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">Previous</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $pesanans->previousPageUrl() }}&per_page={{ request('per_page', 10) }}" rel="prev">Previous</a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($pesanans->getUrlRange(1, $pesanans->lastPage()) as $page => $url)
                                    @if ($page == $pesanans->currentPage())
                                        <li class="page-item active">
                                            <span class="page-link">{{ $page }}</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $url }}&per_page={{ request('per_page', 10) }}">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($pesanans->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $pesanans->nextPageUrl() }}&per_page={{ request('per_page', 10) }}" rel="next">Next</a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link">Next</span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
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
}

.page-link {
    padding: 0.375rem 0.75rem;
    color: #0d6efd;
    background-color: #fff;
    border: 1px solid #dee2e6;
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
</style>

@endsection
