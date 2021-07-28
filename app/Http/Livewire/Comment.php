<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comment extends Component
{
    public $newComment;
    public $comments = [
        [
            'body' => 'Lorem Ipsum. This is comment details for comment description,
                    So in this section
                you can add your comments for this post',
            'created_at' => '3 min ago',
            'creator' => 'Atiqur'
        ]

    ];

    public function addComment()
    {
        array_unshift($this->comments, [
            'body' => $this->newComment,
            'created_at' => Carbon::now()->diffForHumans(),
            'creator' => 'SoftScholar'
        ]);
        $this->newComment = "";
    }
    public function render()
    {
        return view('livewire.comment');
    }
}
