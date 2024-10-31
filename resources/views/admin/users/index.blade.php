@extends('admin.app')

@section('content')
<div class="container">
    @can('show users')
    <h3>Data Table User</h3>

    @can('add users')
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add New User</a>
    @endcan

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->getRoleNames() as $role)
                            <span class="badge bg-primary">{{ $role }}</span>
                        @endforeach
                    </td>
                    <td>
                        @can('edit users')
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                        @endcan
                        @can('delete users')
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endcan
</div>
@endsection