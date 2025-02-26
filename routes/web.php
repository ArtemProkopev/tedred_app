<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactMessageController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/{any}', function () {
    return view('welcome'); // Или другая Blade-страница, в которой подключено Vue
})->where('any', '.*');

Route::post('/contact', [ContactMessageController::class, 'store']);
Route::get('/admin/messages', [ContactMessageController::class, 'index']);

