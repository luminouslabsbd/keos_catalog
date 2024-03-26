<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return config('app.api_secret');

});
