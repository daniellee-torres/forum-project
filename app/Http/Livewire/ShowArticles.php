<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class ShowArticles extends Component
{
    public function render()
    {
        return view('livewire.show-articles')->with('articles', Article::with('user')->get());
    }
}
