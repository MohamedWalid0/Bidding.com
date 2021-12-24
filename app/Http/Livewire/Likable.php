<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Likable extends Component
{
    public $modelType;
    public $modelId;
    public $model;
    public $hasLike = false;
    public $hasDisLike = false;
    public $likeValue;
    public $likeButtonBackground;
    public $disLikeButtonBackground;

    public function mount($modelType, $modelId)
    {
        $this->modelType = $modelType;
        $this->modelId = $modelId;
        $this->model = $this->modelType::findOrFail($this->modelId);
        $this->likeExist = $this->model->likes()->select('user_id', 'value')
            ->where('user_id', auth()->id())->exists();

        if ($this->likeExist) {
            $this->likeValue = $this->model->likes()
                ->where('user_id', auth()->id())->first()->like->value;

            if ($this->likeValue === '1') {
                $this->hasLike = true;
            } else $this->hasDisLike = true;
        }

        $this->updateDesign();

    }

    public function updateDesign()
    {
        $this->likeButtonBackground = $this->getLikeButtonBackground();
        $this->likeButtonCount = $this->getLikeButtonCount();
        $this->disLikeButtonBackground = $this->getDisLikeButtonBackground();
        $this->disLikeButtonCount = $this->getDisLikeButtonCount();
    }

    public function getLikeButtonBackground()
    {
        if ($this->likeExist && $this->hasLike) {
            return 'active';
        } else return '';
    }

    public function getLikeButtonCount()
    {
        $count = $this->model->likes()->where('value', '1')->count();
        return $count == 0 ? '' : $count;
    }

    public function getDisLikeButtonBackground()
    {
        if ($this->likeExist && $this->hasDisLike) {
            return 'active';
        } else return '';
    }

    public function getDisLikeButtonCount()
    {
        $count = $this->model->likes()->where('value', '-1')->count();
        return $count == 0 ? '' : $count;
    }

    public function click($value)
    {
        if ($this->likeExist) {
            // if like exist
            if ($this->likeValue == $value) {
                $this->model->likes()->detach(auth()->id());
                $this->likeExist = false;
            } else {
                // if dislike exist
                $this->model->likes()->syncWithoutDetaching([
                    auth()->user()->id => ['value' => $value]
                ]);
                $this->likeValue = $value;
                $this->toggleHas($value);
            }
        } else {
            // new like
            $this->model->likes()->attach(auth()->id(), ['value' => $value]);
            $this->likeExist = true;
            $this->likeValue = $value;
            $this->toggleHas($value);
        }

        $this->updateDesign();

    }

    public function toggleHas($value)
    {
        if ($value == '1') {
            $this->hasLike = true;
            $this->hasDisLike = false;
        } else {
            $this->hasDisLike = true;
            $this->hasLike = false;
        }
    }

    public function render()
    {
        return view('livewire.likable');
    }
}
