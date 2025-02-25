<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/{any}', function () {
    return view('welcome'); // Или другая Blade-страница, в которой подключено Vue
})->where('any', '.*');
