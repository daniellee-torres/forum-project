<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleComponent extends Component
{

    public $article;

    public function mount(Article $article)
    {
        $this->article = $article;
    }
    public function render()
    {
        return view('livewire.article-component');
    }
}
