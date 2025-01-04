@extends('admin.app')

@section('content')
<div class="container">
    @can('show leaves')
    <h3 class="mb-4">Daftar Cuti</h3>

    @can('add leaves')
    <a href="{{ route('leave.create') }}" class="btn btn-primary mb-3">Tambah Cuti</a>
    @endcan


    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th width="5%">No</th>
                            <th width="25%">Nama Karyawan</th>
                            <th width="20%">Keterangan</th>
                            <th width="25%">Tanggal Mulai</th>
                            <th width="25%">Tanggal Selesai</th>
                            <th width="25%">Status</th>
                            <th width="25%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($leaves as $leave)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $leave->employee->user->name ?? 'N/A' }}</td>
                                <td>{{ $leave->description }}</td>
                                <td>{{ $leave->start_of_date->format('d F Y') }}</td>
                                <td>{{ $leave->end_of_date->format('d F Y') }}</td>
                                <td>
                                    @if($leave->status == 'pending')
                                        <span class="badge bg-warning">Menunggu</span>
                                    @elseif($leave->status == 'approved') 
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    @can('edit leaves')
                                    <a href="{{ route('leave.edit', $leave->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bx bx-edit-alt"></i> Edit
                                    </a>
                                    @endcan
                                    @can('delete leaves')
                                    <form action="{{ route('leave.destroy', $leave->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data cuti ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bx bx-trash"></i> Hapus
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
    @endcan
</div>
@endsection