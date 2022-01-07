<?php

namespace App\Policies;

use App\Models\ReportProduct;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReportProductPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user): bool
    {
        return $user->hasAbility('products.reports.view');
    }

    public function view(User $user): bool
    {
        return $user->hasAbility('products.reports.view');
    }


}
