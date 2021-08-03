<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comment extends Component
{
    public $newComment;
    public $comments;

    public function addComment()
    {
        if ($this->newComment == "") return;
        // array_unshift($this->comments, [
        //     'body' => $this->newComment,
        //     'created_at' => Carbon::now()->diffForHumans(),
        //     'creator' => 'SoftScholar'
        // ]);
        $newComment = \App\Models\Comment::create(
            ['body' => $this->newComment, 'user_id' => 1]
        );
        $this->comments->prepend($newComment);
        $this->newComment = "";
    }

    public function mount()
    {
        $comment = \App\Models\Comment::latest()->get();
        $this->comments = $comment;
    }
    public function render()
    {
        return view('livewire.comment');
    }
}
