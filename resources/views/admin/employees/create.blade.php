@extends('admin.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">Tambah Karyawan Baru</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('employees.store') }}" method="POST">
                @csrf
                <!-- User Name Input -->
                <div class="form-group mb-3">
                    <label for="name" class="form-label fw-bold">Nama</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- User Email Input -->
                <div class="form-group mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Department Selection -->
                <div class="form-group mb-3">
                    <label for="department_id" class="form-label fw-bold">Departemen</label>
                    <select name="department_id" class="form-control @error('department_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Departemen --</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Address -->
                <div class="form-group mb-3">
                    <label for="address" class="form-label fw-bold">Alamat</label>
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" required>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Place of Birth -->
                <div class="form-group mb-3">
                    <label for="place_of_birth" class="form-label fw-bold">Tempat Lahir</label>
                    <input type="text" name="place_of_birth" class="form-control @error('place_of_birth') is-invalid @enderror" value="{{ old('place_of_birth') }}">
                    @error('place_of_birth')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Date of Birth -->
                <div class="form-group mb-3">
                    <label for="dob" class="form-label fw-bold">Tanggal Lahir</label>
                    <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}">
                    @error('dob')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Religion -->
                <div class="form-group mb-3">
                    <label for="religion" class="form-label fw-bold">Agama</label>
                    <select name="religion" class="form-control @error('religion') is-invalid @enderror">
                        <option value="Islam" {{ old('religion') == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Katolik" {{ old('religion') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                        <option value="Protestan" {{ old('religion') == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                        <option value="Hindu" {{ old('religion') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Budha" {{ old('religion') == 'Budha' ? 'selected' : '' }}>Budha</option>
                        <option value="Konghucu" {{ old('religion') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                    </select>
                    @error('religion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Gender -->
                <div class="form-group mb-3">
                    <label for="sex" class="form-label fw-bold">Jenis Kelamin</label>
                    <select name="sex" class="form-control @error('sex') is-invalid @enderror">
                        <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('sex')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Phone -->
                <div class="form-group mb-3">
                    <label for="phone" class="form-label fw-bold">No. Telepon</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Salary -->
                <div class="form-group mb-4">
                    <label for="salary" class="form-label fw-bold">Gaji</label>
                    <input type="text" name="salary" class="form-control @error('salary') is-invalid @enderror" value="{{ old('salary') }}" required>
                    @error('salary')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan
                    </button>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
