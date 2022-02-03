<?php

namespace App\Http\Livewire;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Likable extends Component
{
    use AuthorizesRequests;

    public $modelType;
    public $modelId;
    public $model;
    public $hasLike = false;
    public $hasDisLike = false;
    public $likeValue;
    public $likeButtonBackground;
    public $disLikeButtonBackground;


    public function mount($modelType, $model)
    {
        $this->modelType = $modelType;
        // $this->modelId = $modelId;
        $this->model = $model->loadCount(
            [
                'likes as likes_count' => function (Builder $query) {
                    $query->where('value', '1');
                }
                ,
                'likes as dislikes_count' => function (Builder $query) {
                    $query->where('value', '-1');
                }
            ]
        );
        $this->likeExist = $this->model->likes()->select('user_id', 'value')
            ->where('user_id', auth()->id())->first();

        if ($this->likeExist) {
            $this->likeValue = $this->likeExist->like->value;

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
        $count = $this->model->likes_count;
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
        $count = $this->model->dislikes_count;
        return $count == 0 ? '' : $count;
    }

    /**
     * @throws AuthorizationException
     */
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

        $this->updateCounts();
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

    public function updateCounts()
    {
        $this->model->loadCount(
            [
                'likes as likes_count' => function (Builder $query) {
                    $query->where('value', '1');
                }
                ,
                'likes as dislikes_count' => function (Builder $query) {
                    $query->where('value', '-1');
                }
            ]
        );
    }

    public function render()
    {
        return view('livewire.likable');
    }
}
