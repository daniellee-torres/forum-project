<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateArticleComponent extends Component
{
    use WithFileUploads;
    public $user;
    public $user_id;
    public $title;
    public $image;
    public $summary;
    public $body;
    public $publication_date;
    protected $rules = [
        'title' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,gif|max:10240',
        'body' => 'required',
        'publication_date' => 'required|date'
    ];

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.create-article-component');
    }

    public function save_article()
    {
        $this->validate();

        Article::create([
            'user_id' => $this->user->id,
            'title' => $this->title,
            'image' => $this->image ? $this->photo->store('photos','public') : null,
            'summary' => $this->summary,
            'body' => $this->body,
            'publication_date' => Carbon::parse($this->publication_date)
        ]);

        return redirect('/my-articles');
    }
}
