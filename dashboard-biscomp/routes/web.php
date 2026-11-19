<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/auth/microsoft', [AuthController::class, 'redirectToMicrosoft'])->name('microsoft.login');
    Route::get('/auth/microsoft/callback', [AuthController::class, 'handleMicrosoftCallback']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::post('/projects/{project}/periods', [ProjectController::class, 'storePeriod'])->name('projects.periods.store');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::redirect('/', '/dashboard');