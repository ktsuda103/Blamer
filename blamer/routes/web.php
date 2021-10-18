<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\BestCommentController;
use App\Http\Controllers\MypageController;

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
Route::get('/user_policy', [HomeController::class, 'user_policy'])->name('user_policy');
Route::get('/privacy_policy', [HomeController::class, 'privacy_policy'])->name('privacy_policy');
Route::get('/post/detail/{id}', [HomeController::class, 'detail'])->name('post/detail');

Route::get('/post/create', [PostController::class, 'create'])->name('post/create');
Route::post('/post/store', [PostController::class, 'store'])->name('post/store');

Route::post('/comment/store', [CommentController::class, 'store'])->name('comment/store');

Route::post('/good/store', [GoodController::class, 'store'])->name('good/store');
Route::post('/good/delete', [GoodController::class, 'delete'])->name('good/delete');

Route::post('/best_comment/store', [BestCommentController::class, 'store'])->name('best_comment/store');
Route::post('/best_comment/delete', [BestCommentController::class, 'delete'])->name('best_comment/delete');

Route::get('/mypage/index', [MypageController::class, 'index'])->name('mypage/index');
Route::get('/mypage/good', [MypageController::class, 'good'])->name('mypage/good');
Route::get('/mypage/edit', [MypageController::class, 'edit'])->name('mypage/edit');
Route::post('/mypage/update', [MypageController::class, 'update'])->name('mypage/update');
Route::get('/mypage/delete', [MypageController::class, 'delete'])->name('mypage/delete');