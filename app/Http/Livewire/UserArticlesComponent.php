<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Carbon\Carbon;

class UserArticlesComponent extends Component
{
    public Collection $articles;
    public bool $published = true;

    public function render()
    {
        $this->loadArticles();
        return view('livewire.user-articles-component');
    }

    public function reload_component(bool $published)
    {
        $this->published = $published;
        return redirect()->route('userArticles', ['published' => $this->published]);
    }

    public function loadArticles()
    {
        $query = Article::where('user_id', auth()->user()->id);

        if ($this->published) {
            // Only load articles with publication date in the past or today
            $query->whereDate('publication_date', '<=', Carbon::today());
        } else {
            // Only load articles with publication date in the future
            $query->whereDate('publication_date', '>', Carbon::today());
        }
        $this->articles = $query->get();
        //        $this->reset('articles');
    }

    public function add_article()
    {
        return redirect()->route('createArticle');
    }
}

