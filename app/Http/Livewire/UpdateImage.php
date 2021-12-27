<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateImage extends Component
{
    use WithFileUploads;

    public $image;
    public $user;
    public $imageExists;
    public $imageSrc;
    public $isAuth;
    
    public function mount () {
        $this->imageExists = $this->user->images()->exists();

        if ($this->imageExists) {
            $this->imageSrc = asset('img/front/users/' . $this->user->images->first()->image_path );
        } else $this->imageSrc = 'https://i.pravatar.cc/150?img=3';

        $this->isAuth = auth()->id() === $this->user->id;

    }
    public function updatedImage () {
        $path = $this->image->store( '/', 'users');

            auth()->user()->images()->updateOrCreate(
                [
                'imageable_id' => auth()->id(),
                'imageable_type' => 'App\Models\User'
                ]
                , ['image_path' => $path]);

        // $this->dispatchBrowserEvent('updated' , ['message' => 'Image Changed']);
    }
    public function render()
    {
        return view('livewire.update-image');
    }
}
