<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/salam', function () {
    return "Hai, Saya Hanna Anggraini siap belajar Laravel 11";
});

Route::get('/profil', function () {
    return view('profil');
}); 

Route::get('/about', [AboutController::class, 'about']);