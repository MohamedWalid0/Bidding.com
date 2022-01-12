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
        $images = auth()->user()->images();
        $img = $images->first();

        $old_path = $img ? $img->image_path : "";
        $path = $this->image->store('/', 'users');
        
        (new ImageResizeService)->ImageResize('users', $path, 70, 70);

        $images->updateOrCreate(
            [
                'imageable_id' => auth()->id(),
                'imageable_type' => 'App\Models\User'
            ],
            [
                'image_path' => $path
            ]
        );

        // unlink both resized and normal image
        @unlink('img//front/users/' . $old_path);
        @unlink('img//front/users/thump-' . $old_path);

        // add toster
        toastr()->success('Image has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.update-image');
    }
}
