<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\CitasController;
use App\Models\Citas;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/citas/create', function () {
    return view('citas.create');
})->name('citas.create');

Route::get('/citas/show/{cita}', function (Citas $cita) {
    return view('citas.show', compact('cita'));
})->name('citas.show');

Route::get('/citas/edit', function () {
    return view('citas.edit');
})->name('citas.edit');


Route::post('/dashboard', [CitasController::class, 'store'])->name('citas.store');

Route::delete('/citas/{cita}', [CitasController::class, 'destroy'])->name('citas.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
