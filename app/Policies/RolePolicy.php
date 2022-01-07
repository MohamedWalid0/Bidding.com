<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;



    public function viewAny(User $user): bool
    {
        return $user->hasAbility('roles.view');
    }

    public function view(User $user): bool
    {
        return $user->hasAbility('roles.view');
    }

    public function create(User $user): bool
    {
        return $user->hasAbility('roles.create');
    }

    public function update(User $user): bool
    {
        return $user->hasAbility('roles.update');
    }

    public function delete(User $user): bool
    {
        return $user->hasAbility('roles.delete');
    }


}
