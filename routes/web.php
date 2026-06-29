<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserAccessController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

Route::middleware(['auth', 'super_admin'])->group(function () {

    Route::resource('user-access', UserAccessController::class)
        ->only(['index', 'edit', 'update'])
        ->parameters([
            'user-access' => 'user',
        ]);

    Route::post('user-access/{user}/wilayah', [UserAccessController::class, 'updateWilayah'])
        ->name('user-access.update-wilayah');

    Route::get('/users', [UserController::class, 'index'])
        ->name('users.index');

    Route::get('/users/create', [UserController::class, 'create'])
        ->name('users.create');

    Route::post('/users', [UserController::class, 'store'])
        ->name('users.store');

    Route::delete('/users/{user}', [UserController::class, 'destroy'])
        ->name('users.destroy');

});

require __DIR__.'/auth.php';