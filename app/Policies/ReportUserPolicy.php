<?php

namespace App\Policies;

use App\Models\ReportUser;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReportUserPolicy
{
    use HandlesAuthorization;



    public function viewAny(User $user): bool
    {
        return $user->hasAbility('users.reports.view');
    }

    public function view(User $user): bool
    {
        return $user->hasAbility('users.reports.view');
    }



}
