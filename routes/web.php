<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index'])->name('events.index');
Route::resource('events', EventController::class);
Route::get('event/{eventId}', [EventController::class, 'show'])->name('events.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [EventController::class, 'dashboard'])->name('dashboard');
    Route::post('/event/participar/{eventId}', [EventController::class, 'participarDoEvento'])->name('event.participar');
    Route::delete('/event/sair/{eventId}', [EventController::class, 'sairDoEvento'])->name('event.sair');
});

require __DIR__.'/auth.php';
