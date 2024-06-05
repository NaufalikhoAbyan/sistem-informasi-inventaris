<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemInController;
use App\Http\Controllers\ItemOutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('category', CategoryController::class);
Route::resource('item', ItemController::class);
Route::resource('item-in', ItemInController::class);
Route::resource('item-out', ItemOutController::class);
