<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

Route::get('/', function () {
    return view('welcome');
});

Route ::get('/login',[CustomAuthController::class, 'login']);


// Registration Route
Route ::get('/register',[CustomAuthController::class, 'registration']);

Route::post('submit-user',[CustomAuthController::class,'registerUser'])->name('submit-user');
Route::post('/login-user', [CustomAuthController::class, 'loginuser'])->name('login-user');

Route::get('/dashboard',[CustomAuthController::class, 'dashboard']);
ROute:: get('/logout',[CustomAuthController::class,'logout']);