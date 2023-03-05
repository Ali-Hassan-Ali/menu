<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\Auth\AuthController;

use App\Http\Controllers\Dashboard\WelcomController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\SubCategoryController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\PasswordController;

Route::middleware('SetLocale')
    ->group(function () {

        Route::get('dashboard/login', [AuthController::class,'index'])->name('dashboard.login.index');
        Route::post('dashboard/store', [AuthController::class,'store'])->name('dashboard.login.store');
        Route::post('dashboard/logout', [AuthController::class,'logout'])->name('logout');

        Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {

                Route::get('/', [WelcomController::class,'index'])->name('home');

                //sliders routes
                Route::get('sliders/data', [SliderController::class, 'data'])->name('sliders.data');
                Route::delete('sliders/bulk_delete', [SliderController::class, 'bulkDelete'])->name('sliders.bulk_delete');
                Route::resource('sliders', SliderController::class)->except('show');

                //sliders routes
                Route::get('products/data', [ProductController::class, 'data'])->name('products.data');
                Route::delete('products/bulk_delete', [ProductController::class, 'bulkDelete'])->name('products.bulk_delete');
                Route::resource('products', ProductController::class)->except('show');

                //categorys routes
                Route::get('categorys/data', [CategoryController::class, 'data'])->name('categorys.data');
                Route::delete('categorys/bulk_delete', [CategoryController::class, 'bulkDelete'])->name('categorys.bulk_delete');
                Route::resource('categorys', CategoryController::class)->except('show');

                //sub_categorys routes
                Route::get('sub_categorys/data', [SubCategoryController::class, 'data'])->name('sub_categorys.data');
                Route::delete('sub_categorys/bulk_delete', [SubCategoryController::class, 'bulkDelete'])->name('sub_categorys.bulk_delete');
                Route::resource('sub_categorys', SubCategoryController::class)->except('show');

                Route::prefix('settings')->name('settings.')->group(function () {

                        Route::get('/', [SettingController::class, 'index'])->name('index');
                        Route::post('store', [SettingController::class,'store'])->name('store');

                });//group function

                //profile routes
                Route::get('/profile/edit', [ProfileController::class,'edit'])->name('profile.edit');
                Route::put('/profile/update', [ProfileController::class,'update'])->name('profile.update');

                Route::name('profile.')->namespace('Profile')->group(function () {

                    //password routes
                    Route::get('/password/edit',  [PasswordController::class,'edit'])->name('password.edit');
                    Route::put('/password/update', [PasswordController::class,'update'])->name('password.update');

                });


        });//group middleware
        
});//group(function