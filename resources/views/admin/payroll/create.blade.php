@extends('admin.app')
@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header">
            <h3 class="mb-0">Tambah Penggajian Baru</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('payroll.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                
                <div class="mb-3">
                    <label for="user_id" class="form-label">Karyawan</label>
                    <select name="user_id" id="user_id" class="form-select" required>
                        <option value="">Pilih Karyawan</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->user_id }}">{{ $employee->user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="salary" class="form-label">Gaji</label>
                    <input type="number" name="salary" id="salary" class="form-control" required>
                   
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection