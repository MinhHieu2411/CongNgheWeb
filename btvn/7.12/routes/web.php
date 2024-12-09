<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('home');
});
Route::get("posts", [PostController::class, "index"]);

Route::resource('posts', PostController::class);