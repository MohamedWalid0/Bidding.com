<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions_ids = Permission::all()->pluck('id')->toArray();
        $roles = Role::get();
        $roles->each(function ($role) use ($permissions_ids){
            $role->permissions()->attach($permissions_ids);
        });
    }
}
