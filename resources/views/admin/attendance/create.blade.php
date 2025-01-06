@extends('admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="p-4 bg-white shadow rounded">
                <h3 class="mb-4 text-primary"><i class="fas fa-calendar-plus me-2"></i>Tambah Absensi</h3>

                <form action="{{ route('attendance.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="user_id" class="form-label">Karyawan</label>
                            <select name="user_id" id="user_id" class="form-select" required>
                                <option value="" disabled selected>Pilih Karyawan</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->user_id }}">{{ $employee->user->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Silakan pilih karyawan.</div>
                        </div>

                        <div class="col-md-6">
                            <label for="attendance_date" class="form-label">Tanggal Absensi</label>
                            <input type="date" name="attendance_date" id="attendance_date" class="form-control" required>
                            <div class="invalid-feedback">Silakan pilih tanggal absensi.</div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="" disabled selected>Pilih Status</option>
                                <option value="present">Hadir</option>
                                <option value="absent">Tidak Hadir</option>
                                <option value="on_leave">Izin</option>
                            </select>
                            <div class="invalid-feedback">Silakan pilih status absensi.</div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success me-2"><i class="fas fa-save me-1"></i>Simpan</button>
                        <a href="{{ route('attendance.index') }}" class="btn btn-secondary"><i class="fas fa-times me-1"></i>Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Enable Bootstrap validation styling
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            var forms = document.getElementsByClassName('needs-validation');
            Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
@endsection
