@extends('admin.app')

@section('title', 'Daftar Karyawan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg rounded-3">
                <div class="card-header bg-gradient bg-white d-flex justify-content-between align-items-center py-3">
                    <h5 class="card-title mb-0 text-primary fw-bold">
                        <i class="fas fa-users me-2"></i>Daftar Karyawan
                    </h5>
                    <div class="card-tools d-flex align-items-center gap-3">
                        <form action="{{ route('employees.index') }}" method="GET" class="d-flex align-items-center">
                            <select class="form-select form-select-sm me-2 shadow-sm" name="per_page" id="entries" style="width: auto;" onchange="this.form.submit()">
                                <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                                <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                                <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                                <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                            </select>
                        </form>
                        @can('add employees')
                        <a href="{{ route('employees.create') }}" class="btn btn-primary shadow-sm">
                            <i class="fas fa-plus me-2"></i>Tambah Karyawan
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

                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle" id="employees-table">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" style="width: 5%;">No</th>
                                    <th style="min-width: 150px;">Foto</th>
                                    <th style="min-width: 150px;">Nama</th>
                                    <th style="min-width: 100px;">Departemen</th>
                                    <th style="min-width: 150px;">Alamat</th>
                                    <th style="min-width: 100px;">No HP</th>
                                    <th style="min-width: 100px;">Gaji</th>
                                    <th class="text-center" style="width: 20%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($employees as $employee)
                                <tr>
                                    <td class="text-center">{{ ($employees->currentPage() - 1) * $employees->perPage() + $loop->iteration }}</td>
                                    <td class="text-center">
                                        @if($employee->photo)
                                            <img src="{{ asset('employee_photos/' . $employee->photo) }}" 
                                                 alt="Photo of {{ $employee->user->name }}" 
                                                 class="img-thumbnail" 
                                                 style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <span class="text-muted">No Photo</span>
                                        @endif
                                    </td>
                                    <td class="fw-semibold">{{ $employee->user->name ?? 'N/A' }}</td>
                                    <td>{{ $employee->department->name ?? 'N/A' }}</td>
                                    <td>{{ $employee->address }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>Rp {{ number_format($employee->salary, 0, ',', '.') }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            @can('show', $employee)
                                            <a href="{{ route('employees.show', $employee->id) }}" 
                                               class="btn btn-info btn-sm shadow-sm"
                                               data-bs-toggle="tooltip"
                                               title="Detail">
                                                <i class="fas fa-eye"></i> Show
                                            </a>
                                            @endcan
                                            @can('edit employees')
                                            <a href="{{ route('employees.edit', $employee->id) }}" 
                                               class="btn btn-warning btn-sm shadow-sm"
                                               data-bs-toggle="tooltip"
                                               title="Edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            @endcan
                                            @can('delete employees')
                                            <form action="{{ route('employees.destroy', $employee->id) }}" 
                                                  method="POST" 
                                                  class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-danger btn-sm shadow-sm"
                                                        data-bs-toggle="tooltip"
                                                        title="Hapus"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-5 text-muted">
                                        <i class="fas fa-inbox fa-3x mb-3 d-block opacity-50"></i>
                                        <span class="fw-light">Tidak ada data karyawan</span>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 d-flex justify-content-end">
                        {{ $employees->appends(['per_page' => request('per_page')])->links('pagination::bootstrap-5') }}
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

@endsection
