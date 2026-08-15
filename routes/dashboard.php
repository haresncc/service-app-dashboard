<?php

use App\Http\Controllers\dashboard\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\SubCategoryController;
use App\Http\Controllers\dashboard\ServiceController;

Route::middleware('auth')->prefix('/dashboard')->name('dashboard.')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('sub-categories', SubCategoryController::class);
    Route::resource('services', ServiceController::class);
});
