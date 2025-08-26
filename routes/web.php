<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProgrammeController;

# Localhost page: http://127.0.0.1:8000/
Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

# Connects client from the HTTP request -> Middleware -> Server/Database -> back to client
# Routes from welcome page through register/login to dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard', [
            'programmes' => [
                ['id' => 1, 'name' => 'Test Programme', 'description' => 'Demo desc', 'duration' => 30],
                ['id' => 2, 'name' => 'Another Programme', 'description' => 'Second demo', 'duration' => 15],
            ],
        ]);
    })->name('dashboard');
});

// Route::get('dashboard', function () {
//     return Inertia::render('Dashboard', [
//         'programmes' => []
//     ]);
// });

# Add CRUD routes
Route::middleware(['auth'])->group(function () {
    Route::resource('programmes', ProgrammeController::class);
});

# Adds a route to view the /programmes page
Route::get('/programmes', [ProgrammeController::class, 'index'])->name('programmes.index');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
