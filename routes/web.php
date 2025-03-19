<?php

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Route;

Route::controller(BaseController::class)->group(function() {
    Route::get('/', 'index')->name('main');
    Route::get('/', 'courses')->name('main');
});
