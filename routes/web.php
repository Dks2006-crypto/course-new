<?php

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Route;

// Route::get('/', BaseController::class, "index")->name('main');
Route::get('/courses/brand/{brandId}', [BaseController::class, 'getCoursesByCategory']);

Route::get('/', [BaseController::class, 'index'])->name('courses.index');
Route::get('/brand/{brandId}', [BaseController::class, 'getCoursesByCategory'])->name('courses.getByCtegory');
