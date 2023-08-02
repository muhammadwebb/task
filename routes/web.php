<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [MainController::class, 'index'])->name('dashboard');
    Route::get('/', [MainController::class, 'main'])->name('main');
    Route::get('applications/{application}/answer', [AnswerController::class, 'create'])->name('answer.create');
    Route::post('applications/{application}/answer', [AnswerController::class, 'store'])->name('answer.store');
    Route::resource('applications', ApplicationController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
