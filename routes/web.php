<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PengaduanAdminController;
use App\Http\Controllers\NotificationController;


/*
|--------------------------------------------------------------------------
| Public (Guest)
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => redirect('/login'));

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'showRegister']);
    Route::post('/register', [RegisterController::class, 'register']);
});


/*
|--------------------------------------------------------------------------
| Warga
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:warga'])
    ->prefix('warga')
    ->group(function () {

        Route::get('/dashboard', fn() => view('warga.dashboard'));

        Route::get('/pengaduan/buat', [PengaduanController::class, 'create']);
        Route::post('/pengaduan/buat', [PengaduanController::class, 'store']);

        Route::get('/pengaduan-saya', [PengaduanController::class, 'index']);
        Route::get('/status-laporan', [PengaduanController::class, 'status']);

    });



    Route::middleware(['auth', 'role:warga'])->group(function () {
    Route::get('/notifikasi', [NotificationController::class, 'index'])->name('notifikasi.index');
    Route::post('/notifikasi/{id}', [NotificationController::class, 'baca'])->name('notifikasi.baca');
    Route::post('/notifikasi/{id}/baca', [NotificationController::class, 'baca'])
    ->middleware(['auth', 'role:warga'])
    ->name('notifikasi.baca');

});


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Manajemen Pengaduan
        Route::get('/pengaduan', [PengaduanAdminController::class, 'index'])->name('admin.pengaduan.index');
        Route::get('/pengaduan/{id}', [PengaduanAdminController::class, 'show'])->name('admin.pengaduan.show');
        Route::post('/pengaduan/{id}/status', [PengaduanAdminController::class, 'updateStatus'])->name('admin.pengaduan.status');
        Route::delete('/pengaduan/{id}', [PengaduanAdminController::class, 'destroy'])->name('admin.pengaduan.delete');

        // Laporan
        Route::get('/laporan', [PengaduanAdminController::class, 'laporan'])->name('admin.laporan');
        Route::get('/laporan/csv', [PengaduanAdminController::class, 'exportCsv'])->name('admin.laporan.csv');

        Route::post('/pengaduan/{id}/bukti', [PengaduanAdminController::class, 'uploadBukti'])
    ->name('admin.pengaduan.bukti')
    ->middleware(['auth', 'role:admin']);

});




/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/

Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');
