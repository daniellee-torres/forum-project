<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class CommentComponent extends Component
{
    public $comment;
    public $user;
    public function render()
    {
        return view('livewire.comment-component')->with('user', User::with('comment')->get());
    }
}
