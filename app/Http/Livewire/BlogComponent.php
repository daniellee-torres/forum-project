<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class BlogComponent extends Component
{
    public function render()
    {
        return view('livewire.blog-component')->with('articles', Article::with('user')->get());
    }
}
