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
        $query = Article::where('user_id', auth()->user()->id);

        if ($this->published) {
            // Only load articles with publication date in the past or today
            $query->whereDate('publication_date', '<=', Carbon::today());
        } else {
            // Only load articles with publication date in the future
            $query->whereDate('publication_date', '>', Carbon::today());
        }

        $this->articles = $query->get();
    }

    public function add_article()
    {
        return redirect()->route('createArticle');
    }
}

