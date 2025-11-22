<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\PilotController;
use App\Http\Controllers\DiagramController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AdminController;

Route::get('/', fn() => view('home'))->name('home');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/versenyek', [RaceController::class, 'index'])->name('races.index');

Route::resource('pilots', PilotController::class);

Route::get('/diagram', [DiagramController::class, 'index'])->name('diagram.index');

Route::get('/kapcsolat', [ContactController::class, 'form'])->name('contact.form');
Route::post('/kapcsolat', [ContactController::class, 'submit'])->name('contact.submit');

Route::middleware(['auth', 'role:user,admin'])->group(function () {
    Route::get('/uzenetek', [MessageController::class, 'index'])->name('messages.index');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});
