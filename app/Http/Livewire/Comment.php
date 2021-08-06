<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Comment extends Component
{
    use WithPagination;
    public $newComment;
//    public $comments;

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'newComment' => 'required|max:255',
        ]);
    }

    public function addComment()
    {
        $this->validate(['newComment' => 'required|max:255']);

        //if ($this->newComment == "") return;
        // array_unshift($this->comments, [
        //     'body' => $this->newComment,
        //     'created_at' => Carbon::now()->diffForHumans(),
        //     'creator' => 'SoftScholar'
        // ]);
        $newComment = \App\Models\Comment::create(
            ['body' => $this->newComment, 'user_id' => 1]
        );
        $this->newComment = "";
        session()->flash('message','Comment added successfully');
    }

    public function mount()
    {
        /*$comment = \App\Models\Comment::latest()->get();
        $this->comments = $comment;*/
    }

    public function remove($commentId)
    {
        $comment = \App\Models\Comment::find($commentId);
        //$this->comments = $this->comments->where('id', '!=', $commentId);
        $comment->delete();
//        $this->comments = $this->comments->except($commentId);
//        dd($comment);
        //dd($commentId);
        session()->flash('message','Comment deleted successfully');
    }
    public function render()
    {
        return view('livewire.comment',
        [
            'comments' => \App\Models\Comment::paginate(2)
        ]);
    }
}
