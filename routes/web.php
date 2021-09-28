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

Route::get('/Course', [CourseController::class, 'index'])
    ->name('course.index')
    ->middleware(['auth:sanctum', 'verified']);

Route::post('/Course', [CourseController::class, 'store'])
    ->name('course.store')
    ->middleware(['auth:sanctum', 'verified']);
