<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\CourseMiddleware;
use App\Http\Middleware\FacultyMiddleware;
use App\Http\Middleware\GradeMiddleware;
use App\Http\Middleware\StudentMiddleware;
use Illuminate\Support\Facades\Route;

Route::prefix('student')->controller(StudentController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/add', 'add');
    Route::get('/update/{id}', 'update');
    Route::post('/save', 'save')->middleware(StudentMiddleware::class);
    Route::get('/delete/{id}', 'delete');
    Route::post('/delete/{id}', 'delete');
    Route::get('/search', [StudentController::class, 'search'])->name('student.search');
 });


Route::prefix('faculty')->controller(FacultyController::class)->group(function () {
   Route::get('/', 'index');
   Route::get('/add', 'add');
   Route::get('/update/{id}', 'update');
   Route::post('/save', 'save')->middleware(FacultyMiddleware::class);
   Route::get('/delete/{id}', 'delete');
   Route::post('/delete/{id}', 'delete');
   Route::get('/search', [FacultyController::class, 'search'])->name('faculty.search');
});

Route::prefix('course')->controller(CourseController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/add', 'add');
    Route::get('/update/{id}', 'update');
    Route::post('/save', 'save')->middleware(CourseMiddleware::class);
    Route::get('/delete/{id}', 'delete');
    Route::post('/delete/{id}', 'delete');
    Route::get('/search', [CourseController::class, 'search'])->name('course.search');
 });
 
 Route::prefix('/grade')->controller(GradeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/add', 'add');
    Route::get('/update/{id}', 'update');
    Route::post('/save', 'save')->middleware(GradeMiddleware::class);
    Route::get('/delete/{id}', 'delete');
    Route::post('/delete/{id}', 'delete');
    Route::get('/search', [GradeController::class, 'search'])->name('grade.search');
 });
 