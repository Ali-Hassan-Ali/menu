<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::middleware('SetLocale')->group(function () {

    Route::get('/', [FrontController::class, 'index'])->name('home');
    Route::get('changeLang/{code}', [FrontController::class, 'changeLang'])->name('change.lang');

});