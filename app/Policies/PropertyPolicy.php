<?php

namespace App\Policies;

use App\Models\Property;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PropertyPolicy
{
    use HandlesAuthorization;



    public function viewAny(User $user): bool
    {
        return $user->hasAbility('properties.view');
    }

    public function view(User $user): bool
    {
        return $user->hasAbility('properties.view');
    }

    public function create(User $user): bool
    {
        return $user->hasAbility('properties.create');
    }

    public function update(User $user): bool
    {
        return $user->hasAbility('properties.update');
    }

    public function delete(User $user): bool
    {
        return $user->hasAbility('properties.delete');
    }

    public function restore(User $user): bool
    {
        return $user->hasAbility('properties.view');
    }

    public function forceDelete(User $user): bool
    {
        return $user->hasAbility('properties.view');
    }
}
