<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditArticleComponent extends Component
{
    public $article;


    use WithFileUploads;
    public $status;
    public $user;
    public $user_id;
    public $title;
    public $image;
    public $summary;
    public $body;
    public $publication_date;
    public $tempUrl;

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
        return view('livewire.edit-article-component');
    }

    public function update_article()
    {
        $this->validate();

        Article::create([
            'user_id' => $this->user->id,
            'title' => $this->title,
            'image' => $this->image ? $this->image->store('photos','public') : null,
            'summary' => $this->summary,
            'body' => $this->body,
            'publication_date' => Carbon::parse($this->publication_date)
        ]);
        return redirect('/my-articles');
    }
}
