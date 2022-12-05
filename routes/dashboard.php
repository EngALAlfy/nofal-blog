<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogViewerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware('auth')->group(function(){
    Route::get("/" , [HomeController::class , 'home'])->name('home');

    //posts
    Route::resource('/posts' , \App\Http\Controllers\PostController::class);

    //comments
    Route::resource('/{post}/comments' , \App\Http\Controllers\CommentController::class)->except(['show']);

    //users
    Route::resource('/users' , UserController::class);
    // error log viewer system
    Route::get('/error-viewer', [LogViewerController::class , 'getAllLogErrors'])->name('error-viewer.index');

});
