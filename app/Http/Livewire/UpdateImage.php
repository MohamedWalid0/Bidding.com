<?php

namespace App\Http\Livewire;

use App\Http\Services\ImageResizeService;
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

    public function mount()
    {
        $this->imageExists = $this->user->images()->exists();
        $this->imageSrc = $this->user->avatarUrl();
        $this->isAuth = auth()->id() === $this->user->id;
    }

    public function updatedImage()
    {

        $this->validate([
            'image' => 'image|mimes:jpg,jpeg,png',
        ]);
        $path = $this->image->store('/', 'users');
        (new ImageResizeService)->ImageResize('users', $path, 70, 70);
        auth()->user()->images()->updateOrCreate(
            [
                'imageable_id' => auth()->id(),
                'imageable_type' => 'App\Models\User'
            ],
            [
                'image_path' => $path
            ]
        );

        // unlink file
        // add toster

        // $this->dispatchBrowserEvent('updated' , ['message' => 'Image Changed']);
    }

    public function render()
    {
        return view('livewire.update-image');
    }
}
