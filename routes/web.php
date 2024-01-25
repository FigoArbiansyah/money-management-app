<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth.check-login');

Route::get('/info-saldo', function () {
    return view('info-saldo');
})->middleware('auth.check-login');;

// Authentication
Route::get("/login-moogey", [AuthController::class, "loginView"])->name('auth.login');
Route::post("/login-moogey-post", [AuthController::class, "login"])->name('auth.login.post');
Route::get("/register", [AuthController::class, "registerView"])->name('auth.register');
Route::post("/register-post", [AuthController::class, "register"])->name('auth.register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth.check-login');

// Transaction
Route::get('/transactions', [TransactionController::class, "index"])->name('transactions.index')->middleware('auth.check-login');
Route::post('/transactions', [TransactionController::class, "store"])->name('transactions.store')->middleware('auth.check-login');
Route::put('/transactions/{id}', [TransactionController::class, "update"])->name('transactions.update')->middleware('auth.check-login');
Route::delete('/transactions/{id}', [TransactionController::class, "delete"])->name('transactions.delete')->middleware('auth.check-login');
