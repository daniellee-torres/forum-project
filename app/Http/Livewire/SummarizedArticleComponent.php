<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class SummarizedArticleComponent extends Component
{

    public $article;

    public function mount(Article $article)
    {
        $this->article = $article;
    }
    public function render()
    {
        return view('livewire.summarized-article-component');
    }

    public function showFullArticle($articleId)
    {
        return redirect()->route('article', ['articleId' => $articleId]);
    }
}
