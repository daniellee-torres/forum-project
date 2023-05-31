<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Carbon\Carbon;

class UserArticlesComponent extends Component
{
    public bool $published = true;

    public function render()
    {
        return view('livewire.user-articles-component');
    }

    public function reload_component(bool $published)
    {
        $this->published = $published;
    }

    public function getArticlesProperty()
    {
        $query = Article::where('user_id', auth()->user()->id);

        if ($this->published) {
            // Only load articles with publication date in the past or today
            $query->where('publication_date', '<=', Carbon::today());
        } else {
            // Only load articles with publication date in the future
            $query->where('publication_date', '>', Carbon::today());
        }
        return $query->get();
    }

    public function add_article()
    {
        return redirect()->route('createArticle');
    }
}

