<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentsComponent extends Component
{
    public $comments;
    public function render()
    {
        return view('livewire.comments-component');
    }
}
