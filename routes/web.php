<?php

use App\Http\Controllers\Client\ArticleController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;

// Открытие главной страницы
Route::get('/', [HomeController::class, 'index'])->name('page.home');
Route::get('articles/{id}', [ArticleController::class, 'index'])->name('page.articles');
Route::get('articles/show/{slug}', [ArticleController::class, 'show'])->name('page.single-article');
