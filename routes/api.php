<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    HomeController,BookController
};


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/books', [BookController::class, 'index']);
Route::post('/books', [BookController::class, 'store']);
