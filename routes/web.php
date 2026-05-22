<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::post('/contact', [ContactController::class, 'send']);

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
