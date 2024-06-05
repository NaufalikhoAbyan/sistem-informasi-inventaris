<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemInController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('category', CategoryController::class);
Route::resource('item', ItemController::class);
Route::resource('item-in', ItemInController::class);
