<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AuthenticatedSessionController as AuthAdmin;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;


// Redirect ke halaman event
Route::get('/', function () {
    return redirect()->route('events.index');
});

// Login routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    // Semua route yang dilindungi
    Route::get('/', function () {
        return redirect()->route('events.index');
    });
    // Event routes
    Route::get('events/list', [EventController::class, 'listEvent'])->name('events.list');
    Route::get('/events/upcoming', [EventController::class, 'upcoming'])->name('events.upcoming');
    Route::get('/events/history', [EventController::class, 'history'])->name('events.history');
    Route::get('/events/history/search', [EventController::class, 'search'])->name('events.search');

    // Resource route untuk Event
    Route::resource('events', EventController::class);
});

// Auth routes (tanpa register)
Auth::routes(['register' => false]);

// Mengarahkan pengguna ke dashboard setelah login (jika diinginkan)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');

// Optional: middleware untuk melindungi route tertentu yang hanya bisa diakses setelah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});
