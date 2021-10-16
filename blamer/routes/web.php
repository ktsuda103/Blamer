<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GoodController;

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



Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/post/detail/{id}', [HomeController::class, 'detail'])->name('post/detail');

Route::get('/post/create', [PostController::class, 'create'])->name('post/create');
Route::post('/post/store', [PostController::class, 'store'])->name('post/store');

Route::post('/comment/store', [CommentController::class, 'store'])->name('comment/store');

Route::post('/good/store', [GoodController::class, 'store'])->name('good/store');
Route::post('/good/delete', [GoodController::class, 'delete'])->name('good/delete');

Route::post('/best_comment/store', [GoodController::class, 'store'])->name('best_comment/store');