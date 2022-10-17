<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

//投稿フォームページ
Route::get('/post', [PostController::class, 'showCreateForm'])->name('posts.create');
Route::post('/post', [PostController::class, 'create']);

//投稿確認ページ
Route::get('/post/{post}', [PostController::class, 'detail'])->name('posts.detail');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
