<?php
declare(strict_types=1);

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    [ArticleController::class, 'articleListAction']
)->name('articleList');

Route::get(
    '/article/{id}',
    [ArticleController::class, 'articleAction']
)->name('article');
