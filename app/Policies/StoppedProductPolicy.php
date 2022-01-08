<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StoppedProductPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user): bool
    {
        return $user->hasAbility('products.stopped.view');
    }

    public function update(User $user): bool
    {
        return $user->hasAbility('products.stopped.update');
    }


}
