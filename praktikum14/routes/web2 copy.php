<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardControllers;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PasienController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/salam', function () {
    return "Hai, Saya Hanna Anggraini siap belajar Laravel 11";
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/pasien', function () {
    return view('pasien');
});

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/pasien/index', [PasienController::class, 'index'])->name('pasien.show');
Route::get('/pasien/create', [PasienController::class, 'create'])->name('pasien.create');
Route::get('/pasien/store', [PasienController::class, 'store'])->name('pasien.store');
Route::get('/pasien/{id}/edit', [PasienController::class, 'edit'])->name('pasien.edit');
Route::get('/pasien/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');
Route::get('/pasien/{id}', [PasienController::class, 'view'])->name('pasien.view');
