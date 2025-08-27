<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\DashboardController;

# Localhost page: http://127.0.0.1:8000/
Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

# Dashboard route handled by controller
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});

# Add CRUD routes for Programmes
Route::middleware(['auth'])->group(function () {
    Route::resource('programmes', ProgrammeController::class);
});

# Route for /programmes - optional
Route::get('/programmes', [ProgrammeController::class, 'index'])->name('programmes.index');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
