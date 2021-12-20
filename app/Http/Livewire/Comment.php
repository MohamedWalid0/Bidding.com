<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Comment extends Component
{
    public Product $product;
    public $comment;
    public $comments;
    public $perPage;


    public function mount () {
        $this->perPage = 5;
        $this->comments = $this->product->comments->sortByDesc('created_at');

    }
    public function render()
    {
        return view('livewire.comment');
    }
    public function rules()
    {
        return [
            'comment'=> 'string|required|max:50'
        ];
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function comment () {
        $this->validate();

        $newComment  = $this->product->comments()->create(
            ['body' => $this->comment ,
            'user_id' => auth()->user()->id]
        );

        $this->comments->prepend($newComment);
        $this->comment = '';

        session()->flash('message', 'Comment successfully added.');

    }

}
