<?php

namespace App\Policies;

use App\Models\Support;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SupportPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasAbility('supports.view');
    }

    public function view(User $user): bool
    {
        return $user->hasAbility('supports.view');
    }

    public function create(User $user): bool
    {
        return $user->hasAbility('supports.create');
    }

    public function reply(User $user): bool
    {
        return $user->hasAbility('supports.reply');
    }

    public function delete(User $user): bool
    {
        return $user->hasAbility('supports.delete');
    }


}
