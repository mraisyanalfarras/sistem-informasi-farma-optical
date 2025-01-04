@extends('admin.app')

@section('content')
<div class="container">
    <div class="card shadow-lg rounded-3 border-0">
        <!-- Header Card -->
        <div class="card-header bg-gradient bg-primary text-white py-4">
            <h4 class="card-title mb-0 text-center fw-bold">
                <i class="fas fa-user-circle me-2"></i> Employee Details
            </h4>
        </div>
        <!-- Body Card -->
        <div class="card-body px-5 py-4">
            <!-- Profile Section -->
            <div class="row mb-4 text-center">
                <div class="col-12">
                    @if ($employee->photo)
                        <img src="{{ asset('employee_photos/' . $employee->photo) }}" 
                             class="img-thumbnail rounded-circle shadow-sm" 
                             alt="{{ $employee->user->name }}" 
                             style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #ddd;">
                    @else
                        <div class="placeholder rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center shadow-sm" 
                             style="width: 150px; height: 150px; border: 3px solid #ddd;">
                            <i class="fas fa-user fa-4x"></i>
                        </div>
                    @endif
                    <h4 class="mt-3 fw-bold text-primary">{{ $employee->user->name }}</h4>
                </div>
            </div>
            <!-- Detail Section -->
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="border p-3 rounded bg-light shadow-sm">
                        <p class="fw-bold text-muted mb-1">Employee ID</p>
                        <h6 class="text-dark">{{ $employee->id }}</h6>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="border p-3 rounded bg-light shadow-sm">
                        <p class="fw-bold text-muted mb-1">Address</p>
                        <h6 class="text-dark">{{ $employee->address }}</h6>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="border p-3 rounded bg-light shadow-sm">
                        <p class="fw-bold text-muted mb-1">Place of Birth</p>
                        <h6 class="text-dark">{{ $employee->place_of_birth }}</h6>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="border p-3 rounded bg-light shadow-sm">
                        <p class="fw-bold text-muted mb-1">Date of Birth</p>
                        <h6 class="text-dark">{{ \Carbon\Carbon::parse($employee->dob)->format('d M Y') }}</h6>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="border p-3 rounded bg-light shadow-sm">
                        <p class="fw-bold text-muted mb-1">Religion</p>
                        <h6 class="text-dark">{{ $employee->religion }}</h6>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="border p-3 rounded bg-light shadow-sm">
                        <p class="fw-bold text-muted mb-1">Gender</p>
                        <h6 class="text-dark">{{ $employee->sex }}</h6>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="border p-3 rounded bg-light shadow-sm">
                        <p class="fw-bold text-muted mb-1">Phone</p>
                        <h6 class="text-dark">{{ $employee->phone }}</h6>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="border p-3 rounded bg-light shadow-sm">
                        <p class="fw-bold text-muted mb-1">Salary</p>
                        <h6 class="text-dark">{{ number_format($employee->salary, 0, ',', '.') }} IDR</h6>
                    </div>
                </div>
            </div>
            <!-- Action Buttons -->
            <div class="text-center mt-4">
                <a href="{{ route('employees.index') }}" class="btn btn-secondary me-2">
                    <i class="fas fa-arrow-left me-2"></i> Back
                </a>
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">
                    <i class="fas fa-edit me-2"></i> Edit
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
