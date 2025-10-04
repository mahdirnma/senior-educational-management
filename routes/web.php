<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CollegianController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
Route::middleware('auth')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('home');
    Route::resource('professors', ProfessorController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('collegians',CollegianController::class);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
Route::middleware('guest')->group(function(){
    Route::get('login', [AuthController::class, 'loginForm'])->name('login.form');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

