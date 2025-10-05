<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CollegianController;
use App\Http\Controllers\CollegianCoursesController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\ProfessorCoursesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
Route::middleware('isProfessor')->group(function () {
    Route::get('/professor/courses',[ProfessorCoursesController::class,'professorCourses'])->name('professor.courses')->middleware('auth');
    Route::get('/professor/courses/create',[ProfessorCoursesController::class,'createCourses'])->name('professor.courses.create')->middleware('auth');
    Route::post('/professor/courses/store',[ProfessorCoursesController::class,'storeCourses'])->name('professor.courses.store')->middleware('auth');
    Route::get('/professor/courses/{course}/collegians',[ProfessorCoursesController::class,'showCollegians'])->name('professor.courses.collegians')->middleware('auth');
});
Route::middleware('isCollegian')->group(function () {
    Route::get('/collegian/courses',[CollegianCoursesController::class,'collegianCourses'])->name('collegian.courses')->middleware('auth');
    Route::get('/collegian/courses/create',[CollegianCoursesController::class,'createCourses'])->name('collegian.courses.create')->middleware('auth');
    Route::post('/collegian/courses/store',[CollegianCoursesController::class,'storeCourses'])->name('collegian.courses.store')->middleware('auth');

});
Route::middleware('auth')->group(function(){
    Route::middleware('isAdmin')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('home');
        Route::resource('professors', ProfessorController::class);
        Route::resource('courses', CourseController::class);
        Route::resource('collegians',CollegianController::class);
    });
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
Route::middleware('guest')->group(function(){
    Route::get('login', [AuthController::class, 'loginForm'])->name('login.form');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

