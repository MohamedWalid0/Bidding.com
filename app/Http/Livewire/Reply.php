<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class Reply extends Component
{
    public Comment $comment;
    public $reply;
    public $replies;
    public $isOwener;

    public function mount () {
        $this->replies = $this->comment->replies->load('user.account')->sortByDesc('created_at');
        $this->isOwner = (auth()->id() == $this->comment->product->user->id);
    }
    public function render()
    {
        return view('livewire.reply');
    }
    public function rules()
    {
        return [
            'reply'=> 'string|required|max:50'
        ];
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function reply () {
        $this->validate();

        $newReply = $this->comment->replies()->create(
            ['body' => $this->reply ,
            'user_id' => auth()->user()->id]
        );

        $this->replies->prepend($newReply);
        $this->reply = '';

        session()->flash('message', 'Reply successfully added.');

    }
}
