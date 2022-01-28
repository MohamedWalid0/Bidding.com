<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    public function action(User $user): bool
    {
        return !request('user') || $user->is(request()->user);
    }

    public function make(User $user):bool
    {
        return request('user') && $user->isNot(request()->user);
    }
}
