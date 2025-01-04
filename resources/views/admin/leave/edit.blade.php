@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Data Cuti</h3>

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('leave.update', $leave->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="user_id" class="form-label">Nama Karyawan <span class="text-danger">*</span></label>
                    <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->user_id }}" {{ $leave->user_id == $employee->user_id ? 'selected' : '' }}>
                                {{ $employee->user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Keterangan Cuti <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="3" required>{{ $leave->description }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="start_of_date" class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                            <input type="date" name="start_of_date" id="start_of_date" class="form-control @error('start_of_date') is-invalid @enderror" value="{{ $leave->start_of_date->format('Y-m-d') }}" required>
                            @error('start_of_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="end_of_date" class="form-label">Tanggal Selesai <span class="text-danger">*</span></label>
                            <input type="date" name="end_of_date" id="end_of_date" class="form-control @error('end_of_date') is-invalid @enderror" value="{{ $leave->end_of_date->format('Y-m-d') }}" required>
                            @error('end_of_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                        <option value="pending" {{ $leave->status == 'pending' ? 'selected' : '' }}>Menunggu</option>
                        <option value="approved" {{ $leave->status == 'approved' ? 'selected' : '' }}>Disetujui</option>
                        <option value="rejected" {{ $leave->status == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('leave.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection