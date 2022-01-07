<?php

namespace App\Policies;

use App\Models\BlockUser;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlockPolicy
{
    use HandlesAuthorization;



    public function viewAny(User $user): bool
    {
        return $user->hasAbility('blocks.view');
    }

    public function view(User $user): bool
    {
        return $user->hasAbility('blocks.view');
    }

    public function create(User $user): bool
    {
        return $user->hasAbility('blocks.create');
    }

    public function update(User $user): bool
    {
        return $user->hasAbility('blocks.update');
    }

    public function delete(User $user): bool
    {
        return $user->hasAbility('blocks.delete');
    }


}
