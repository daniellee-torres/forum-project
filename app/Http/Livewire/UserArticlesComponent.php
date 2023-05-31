<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserArticlesComponent extends Component
{

    public Collection $articles;
    public bool $published = true;

    public function __construct()
    {
        $this->articles = new Collection();
    }

    public function mount()
    {
        // Fetch the user's articles based on the selected status
        $this->loadArticles();
    }

    public function render()
    {
        return view('livewire.user-articles-component');
    }
    public function reloadComponent(string $published)
    {
        $this->published = $published === '1';
        $this->loadArticles();
    }

    private function loadArticles()
    {
        $this->articles = Article::where('user_id', auth()->user()->id)
            ->where('published', $this->published)
            ->get();
    }

    public function add_article()
    {
        return redirect()->route('createArticle');
    }

}
