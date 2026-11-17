<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

// Hanya untuk yang belum login
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Harus login (admin & petugas)
Route::middleware(['auth', 'role:admin,petugas'])->group(function () {
    Route::get('/', [AnggotaController::class, 'index'])->name('anggota.index');
    Route::get('/anggota/tambah', [AnggotaController::class, 'create'])->name('anggota.create');
    Route::post('/anggota/tambah', [AnggotaController::class, 'store'])->name('anggota.store');
    Route::get('/anggota/{anggota}/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
    Route::put('/anggota/{anggota}', [AnggotaController::class, 'update'])->name('anggota.update');
    Route::get('/anggota/{anggota}/kartu', [AnggotaController::class, 'kartu'])->name('anggota.kartu');
});

// Khusus admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/anggota/{anggota}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
});
