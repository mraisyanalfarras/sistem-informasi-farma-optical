@extends('admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg rounded-3">
                <div class="card-header bg-gradient bg-white d-flex justify-content-between align-items-center py-3">
                    <h5 class="card-title mb-0 text-primary fw-bold">
                        <i class="fas fa-users me-2"></i>Daftar Pengguna
                    </h5>
                    @can('add users')
                    <div class="card-tools">
                        <a href="{{ route('users.create') }}" class="btn btn-primary shadow-sm">
                            <i class="fas fa-plus me-2"></i>Tambah Pengguna
                        </a>
                    </div>
                    @endcan
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

                    @can('show users')
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 5%;">ID</th>
                                    <th style="min-width: 150px;">Nama</th>
                                    <th style="min-width: 200px;">Email</th>
                                    <th style="min-width: 120px;">Role</th>
                                    <th class="text-center" style="width: 15%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td class="fw-semibold">{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach($user->getRoleNames() as $role)
                                            <span class="badge bg-primary rounded-pill shadow-sm">{{ $role }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            @can('edit users')
                                            <a href="{{ route('users.edit', $user->id) }}" 
                                               class="btn btn-warning btn-sm shadow-sm"
                                               data-bs-toggle="tooltip"
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </a>
                                            @endcan
                                            @can('delete users')
                                            <form action="{{ route('users.destroy', $user->id) }}" 
                                                  method="POST" 
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-danger btn-sm shadow-sm"
                                                        data-bs-toggle="tooltip"
                                                        title="Hapus"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                                    <i class="fas fa-trash"></i>
                                                    Hapus
                                                </button>
                                            </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection