<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\BlogComponent;
use App\Http\Livewire\CommentFormComponent;
use App\Http\Livewire\FullArticleComponent;
use App\Http\Livewire\ShowArticle;
use App\Http\Livewire\ShowBlog;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
