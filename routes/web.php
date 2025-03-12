<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\OrderDetailsController;

Route::resource('customers', CustomersController::class);


Route::resource('order_details', OrderDetailsController::class);
Route::get('order_details/{order_id}/{product_id}/edit', [OrderDetailsController::class, 'edit'])->name('order_details.edit');
Route::get('order_details/{order_id}/{product_id}', [OrderDetailsController::class, 'show'])->name('order_details.show');
Route::put('order_details/{order_id}/{product_id}', [OrderDetailsController::class, 'update'])->name('order_details.update');
Route::delete('order_details/{order_id}/{product_id}', [OrderDetailsController::class, 'destroy'])->name('order_details.destroy');
