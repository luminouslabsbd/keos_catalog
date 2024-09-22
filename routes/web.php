<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'home'])->name('home');

Route::get('/modify-docx',[HomeController::class,'modifyDocx'])->name('modifyDocx');
Route::post('/submit-docx-data',[HomeController::class,'submitDocxInfo'])->name('submitDocxInfo');
