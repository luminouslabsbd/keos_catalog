<?php

use App\Http\Controllers\Api\ProductController;
    use App\Http\Controllers\MercadoPago;
    use Illuminate\Support\Facades\Route;

Route::get('/products',[ProductController::class,'index']);
Route::post('/send-wp-message',[ProductController::class,'sendWpMessage']);

Route::get('/send-multi-product',[ProductController::class,'sendMultiProduct']);


Route::get('/mer',[MercadoPago::class,'index']);
