<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Comment extends Component
{
    use WithPagination, WithFileUploads;
    public $newComment;
    public $image;
    public $ticketId;
//    public $comments;
    protected $listeners = [
        'fileUpload' => 'handleFileUpload',
        'ticketSelected', //when same name for event and function then no need to add function name
    ];

    public function ticketSelected($ticketId)
    {
        $this->ticketId = $ticketId;
    }

    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }

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
        $image = $this->storeImage();

        //if ($this->newComment == "") return;
        // array_unshift($this->comments, [
        //     'body' => $this->newComment,
        //     'created_at' => Carbon::now()->diffForHumans(),
        //     'creator' => 'SoftScholar'
        // ]);
        $newComment = \App\Models\Comment::create(
            ['body' => $this->newComment, 'user_id' => 1,
                'image' => $image,
                'support_ticket_id' => $this->ticketId
            ],

        );
        $this->newComment = "";
        $this->image = "";
        session()->flash('message','Comment added successfully');
    }

    public function storeImage()
    {
        if (!$this->image){
            return null;
        }
        $img = ImageManagerStatic::make($this->image)->encode('jpg');
        $name = Str::random() . '.jpg';
        Storage::disk('public')->put($name, $img);
        return $name;
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
        Storage::disk('public')->delete($comment->image);
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
                'comments' => \App\Models\Comment::where('support_ticket_id',
                    $this->ticketId)->paginate(2)
            ]);
    }

}
