<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentFormComponent extends Component
{

    public $user;
    public $comment;
    public $articleId;
    protected $rules = [
            'comment' => 'required'
    ];

    public function postComment()
    {
        $this->validate();

        Comment::create([
            'article_id' => $this->articleId,
            'user_id' => $this->user->id,
            'body' => $this->comment
        ]);

        $this->comment = ''; // Reset the comment property to clear the text area
        $this->emit('commentPosted'); // Emit the "commentPosted" event
        return back();
    }

    public function refreshComments()
    {
        //trying to rerender the page
    }

    public function render()
    {
        return view('livewire.comment-form-component');
    }
}
