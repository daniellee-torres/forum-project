<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\ArticleFormComponent;
use App\Http\Livewire\BlogComponent;
use App\Http\Livewire\CommentFormComponent;
use App\Http\Livewire\CreateArticleComponent;
use App\Http\Livewire\EditArticleComponent;
use App\Http\Livewire\FullArticleComponent;
use App\Http\Livewire\ShowArticle;
use App\Http\Livewire\ShowBlog;
use App\Http\Livewire\UserArticlesComponent;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', BlogComponent::class)->name('home');
Route::get('/articles/{articleId}', FullArticleComponent::class)->name('article');
Route::post('articles/{articleId}/comment', CommentFormComponent::class)->name('comment');

Route::get('/my-articles', UserArticlesComponent::class)->middleware(['auth', 'verified'])->name('userArticles');
Route::get('/my-articles/create', CreateArticleComponent::class)->middleware(['auth', 'verified'])->name('createArticle');
Route::post('/my-articles/create', CreateArticleComponent::class)->middleware(['auth', 'verified'])->name('saveArticle');
Route::post('/my-articles/edit', EditArticleComponent::class)->middleware(['auth', 'verified'])->name('editArticle');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
