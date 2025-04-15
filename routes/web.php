<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;

// API и специальные маршруты
Route::post('/contact', [FeedbackController::class, 'store']);
Route::post('/news', [FeedbackController::class, 'store']);
Route::get('/admin/messages', [FeedbackController::class, 'index']);

// Главный catch-all маршрут для Vue.js
Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');