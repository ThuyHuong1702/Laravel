<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\OrderDetailsController;
use App\Http\Controllers\getOrderStatistics;

Route::resource('customers', CustomersController::class);

Route::resource('order_details', OrderDetailsController::class);

Route::get('/orders', [getOrderStatistics::class, 'index']);
Route::get('/order-statistics', [getOrderStatistics::class, 'getOrderStatistics']);
