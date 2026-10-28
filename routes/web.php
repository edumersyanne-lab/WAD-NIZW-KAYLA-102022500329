
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;

Route::get('/', [AnggotaController::class, 'index'])
    ->name('anggota.index');

Route::get('/anggota/tambah', [AnggotaController::class, 'create'])
    ->name('anggota.create');

Route::post('/anggota/tambah', [AnggotaController::class, 'store'])
    ->name('anggota.store');

Route::get('/anggota/{anggota}/edit', [AnggotaController::class, 'edit'])
    ->name('anggota.edit');

Route::put('/anggota/{anggota}', [AnggotaController::class, 'update'])
    ->name('anggota.update');

Route::delete('/anggota/{anggota}', [AnggotaController::class, 'destroy'])
    ->name('anggota.destroy');

Route::get('/anggota/{anggota}/kartu', [AnggotaController::class, 'kartu'])
    ->name('anggota.kartu');
