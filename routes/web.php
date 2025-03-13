<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/{any}', function () {
    return view('welcome'); // Или другая Blade-страница, в которой подключено Vue
})->where('any', '.*');

Route::post('/contact', [FeedbackController::class, 'store']);
Route::post('/news', [FeedbackController::class, 'store']);
Route::get('/admin/messages', [FeedbackController::class, 'index']);

