<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Redirect to dashboard directly without login
Route::get('/', function () {
    return redirect('/dashboard');
});

// Dashboard route, open to all users (no authentication required)
Route::get('/dashboard', function () {
    return view('admin.blank.index');
})->name('dashboard');

// Resource routes for users, roles, and departments
Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('payroll', PayrollController::class);
Route::resource('leave', LeaveController::class);
Route::resource('attendance', AttendanceController::class);
