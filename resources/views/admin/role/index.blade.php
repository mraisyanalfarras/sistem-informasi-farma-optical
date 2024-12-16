@extends('admin.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Roles</h3>
        </div>
        <div class="card-body">
            @can('create roles')
            <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Tambah Role</a>
            @endcan

            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Role</th>
                        <th>Permission</th>
                        <th>Actions</th> <!-- Kolom aksi untuk edit dan delete -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $loop->iteration }}</td> <!-- Iteration for numbering -->
                            <td>{{ $role->name }}</td> <!-- Menampilkan nama role -->
                            <td>
                                @foreach($role->permissions as $permission)
                                    <span class="badge bg-primary me-1 mb-1">{{ $permission->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <!-- Edit Button -->
                                @can('edit roles')
                                <button type="button" class="btn btn-warning btn-sm" onclick="window.location='{{ route('roles.edit', $role->id) }}'">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                @endcan

                                <!-- Delete Button -->
                                @can('delete roles')
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this role? This action cannot be undone.')">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection