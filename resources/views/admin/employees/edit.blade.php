@extends('admin.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">Edit Data Karyawan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- User Selection -->
                <div class="form-group mb-3">
                    <label for="user_id" class="form-label fw-bold">User</label>
                    <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $employee->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Address -->
                <div class="form-group mb-3">
                    <label for="address" class="form-label fw-bold">Alamat</label>
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $employee->address) }}" required>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Place of Birth -->
                <div class="form-group mb-3">
                    <label for="place_of_birth" class="form-label fw-bold">Tempat Lahir</label>
                    <input type="text" name="place_of_birth" class="form-control @error('place_of_birth') is-invalid @enderror" value="{{ old('place_of_birth', $employee->place_of_birth) }}">
                    @error('place_of_birth')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Date of Birth -->
                <div class="form-group mb-3">
                    <label for="dob" class="form-label fw-bold">Tanggal Lahir</label>
                    <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob', $employee->dob) }}">
                    @error('dob')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Religion -->
                <div class="form-group mb-3">
                    <label for="religion" class="form-label fw-bold">Agama</label>
                    <select name="religion" class="form-control @error('religion') is-invalid @enderror" required>
                        <option value="Islam" {{ old('religion', $employee->religion) == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Katolik" {{ old('religion', $employee->religion) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                        <option value="Protestan" {{ old('religion', $employee->religion) == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                        <option value="Hindu" {{ old('religion', $employee->religion) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Budha" {{ old('religion', $employee->religion) == 'Budha' ? 'selected' : '' }}>Budha</option>
                        <option value="Konghucu" {{ old('religion', $employee->religion) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                    </select>
                    @error('religion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Gender -->
                <div class="form-group mb-3">
                    <label for="sex" class="form-label fw-bold">Jenis Kelamin</label>
                    <select name="sex" class="form-control @error('sex') is-invalid @enderror" required>
                        <option value="Male" {{ old('sex', $employee->sex) == 'Male' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Female" {{ old('sex', $employee->sex) == 'Female' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('sex')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Phone -->
                <div class="form-group mb-3">
                    <label for="phone" class="form-label fw-bold">No. Telepon</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $employee->phone) }}" required>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Salary -->
                <div class="form-group mb-4">
                    <label for="salary" class="form-label fw-bold">Gaji</label>
                    <input type="number" name="salary" class="form-control @error('salary') is-invalid @enderror" value="{{ old('salary', $employee->salary) }}" required>
                    @error('salary')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Photo -->
                <div class="form-group mb-3">
                    <label for="photo" class="form-label fw-bold">Upload Foto</label>
                    <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" accept="image/*">
                    @error('photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if($employee->photo)
                        <small class="form-text">Foto saat ini:</small>
                        <img src="{{ asset('employee_photos/' . $employee->photo) }}" alt="Foto Karyawan" class="img-thumbnail mt-2" width="150">
                        <p class="text-muted mt-2">Kosongkan jika tidak ingin mengubah foto.</p>
                    @endif
                </div>

                <div class="d-flex gap-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
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
