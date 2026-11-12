<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShipperController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('customers', CustomerController::class);
Route::resource('categories', CategoryController::class);
Route::resource('shippers', ShipperController::class);
Route::resource('suppliers', SupplierController::class);
