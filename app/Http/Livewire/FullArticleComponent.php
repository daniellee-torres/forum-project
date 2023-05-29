<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class FullArticleComponent extends Component
{

    public $article;

    public function mount($articleId)
    {
        $this->article = Article::findOrFail($articleId);
    }
    public function render()
    {
        return view('livewire.full-article-component');
    }
}
