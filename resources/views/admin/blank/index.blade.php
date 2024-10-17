@extends('admin.app')

@section('content')
    <div class="container">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="h3">Dashboard</h1>
                <p class="text-muted">Selamat datang di Dashboard Admin. Kelola informasi departemen, karyawan, payroll, izin, dan kehadiran dengan mudah.</p>
            </div>
        </div>

        <!-- Dashboard Cards -->
        <div class="row">
            <!-- Card: Departments -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Pengelolaan Departemen</h5>
                        <p class="card-text">Kelola dan lihat semua departemen.</p>
                        <a href="{{ route('departments.index') }}" class="btn btn-primary">Lihat Departemen</a>
                    </div>
                </div>
            </div>

            <!-- Card: Employees -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Pengelolaan Karyawan</h5>
                        <p class="card-text">Kelola informasi dan detail karyawan.</p>
                        <a href="{{ route('employees.index') }}" class="btn btn-primary">Lihat Karyawan</a>
                    </div>
                </div>
            </div>

            <!-- Card: Payroll -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Pengelolaan Payroll</h5>
                        <p class="card-text">Kelola gaji dan distribusi payroll.</p>
                        <a href="{{ route('payroll.index') }}" class="btn btn-primary">Kelola Payroll</a>
                    </div>
                </div>
            </div>

            <!-- Card: Leave Requests -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Pengelolaan Izin</h5>
                        <p class="card-text">Lihat dan kelola permintaan izin karyawan.</p>
                        <a href="{{ route('leave.index') }}" class="btn btn-primary">Lihat Permintaan Izin</a>
                    </div>
                </div>
            </div>

            <!-- Card: Attendance -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">Pengelolaan Kehadiran</h5>
                        <p class="card-text">Lacak kehadiran karyawan.</p>
                        <a href="{{ route('attendance.index') }}" class="btn btn-primary">Lihat Kehadiran</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
