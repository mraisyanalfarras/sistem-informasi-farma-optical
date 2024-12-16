<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\FrameController;
use App\Http\Controllers\LensaController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\SendPromotionController;

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

// Rute untuk halaman utama - redirect ke dashboard
Route::get('/', function () {
    return redirect('/dashboard');
});

// Rute login
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Rute registrasi
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Rute dashboard - perlu autentikasi
Route::get('/dashboard', function () {
    return view('admin.blank.index');
})->name('dashboard')->middleware('auth');

// Grup rute yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    
    // Rute untuk manajemen pengguna
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    
    // Rute untuk manajemen SDM
    Route::resource('departments', DepartmentController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('payroll', PayrollController::class);
    Route::resource('leave', LeaveController::class);
    Route::resource('attendance', AttendanceController::class);

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::resource('customers', CustomersController::class);
    Route::resource('pasiens', PasienController::class);
    Route::resource('frames', FrameController::class);
    Route::resource('lensas', LensaController::class);
    Route::resource('promotions', PromotionController::class);
    Route::resource('send-promotions', SendPromotionController::class);
    Route::get('send-all-promotions', [EmailController::class, 'sendPromotionEmails'])->name('send.all.promotions');
});