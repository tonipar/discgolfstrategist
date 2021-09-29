<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\CourseController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/', [MainController::class, 'index'])
    ->name('home')
    ->middleware(['auth:sanctum', 'verified']);

Route::get('/course', [CourseController::class, 'index'])
    ->name('course.index')
    ->middleware(['auth:sanctum', 'verified']);

Route::get('/course/create', [CourseController::class, 'create'])
    ->name('course.create')
    ->middleware(['auth:sanctum', 'verified']);

Route::get('/course/{course}/edit', [CourseController::class, 'edit'])
    ->name('course.edit')
    ->middleware(['auth:sanctum', 'verified']);

Route::post('/course', [CourseController::class, 'store'])
    ->name('course.store')
    ->middleware(['auth:sanctum', 'verified']);

Route::put('/course/{course}/update', [CourseController::class, 'update'])
    ->name('course.update')
    ->middleware(['auth:sanctum', 'verified']);

Route::delete('/course/{course}/delete', [CourseController::class, 'destroy'])
    ->name('course.destroy')
    ->middleware(['auth:sanctum', 'verified']);
