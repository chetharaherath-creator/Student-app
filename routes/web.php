<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\YouTubeController;
use App\Http\Controllers\GoogleAuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Original Routes Below

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/greeting', function () {
    return 'greeting'; //  in future we can return json data
});

//dynamic routing
Route::get('/greeting/{name}', function ($name) { 
    return 'greeting ' . $name;
});

//pass data intoa view and return it
Route::get('/profile/{name}/{id}', function ($name, $id) {
    return view('profile', compact('name', 'id')); 
});

Route::get('/sum/{num1}/{num2}', function ($num1, $num2) {
    $sum = $num1 + $num2;
    return view('sum', compact('sum'));
});

Route::get('/user/{id}/{name}', function ($id, $name) {
    return view('user', compact('id', 'name'));
}); 

Route::get('/color/{color}', function ($color) {
    return view('color', compact('color'));
});

Route::get('/demo', function () {
    $module = 'Laravel';
    $creditValue = 100;
    $topics = ['routing', 'controllers', 'views', 'blade templates'];
    return view('demo', compact('module', 'creditValue', 'topics'));
});

Route::get('/form', [FormController::class, 'create']);
Route::post('/form', [FormController::class, 'store']);

Route::resource('products', ProductController::class);

Route::get('/youtube-search', [YouTubeController::class, 'index']);
Route::post('/youtube-search', [YouTubeController::class, 'search']);
Route::get('/youtube-playlists', [YouTubeController::class, 'playlists']);

Route::get('/auth/google', [GoogleAuthController::class, 'redirect']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);
Route::post('/youtube-playlist', [YouTubeController::class, 'createPlaylist'])->middleware('auth');
