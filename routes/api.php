<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// A basic public GET route
Route::get('/ping', function () {
    return response()->json(['message' => 'API is working!']);
});

//Routing to the controller

Route::get('/products', [ProductController::class, 'index']);