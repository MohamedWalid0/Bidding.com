<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\StoreRoleRequest;
use App\Http\Requests\Roles\UpdateRoleRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{


    public function index()
    {

        $this->authorize('viewAny' , Role::class);
        $users = User::select(['id' , 'role_id'])-> with(['role:id,name', 'account:user_id,full_name'])->get();
        $roles = Role::select(['name', 'abilities' , 'id'])-> withCount('users')->get();

        return view('dashboard.roles.index', compact('users', 'roles'));
    }


    public function storeRole(StoreRoleRequest $request)
    {

        try {

            Role::create($request->validated());


            toastr()->success('Data has been saved successfully!');
            return back();

        } catch (\Throwable $th) {

            toastr()->error('something error');
            return back();

        }

    }


    public function updateUserRole(Request $request)
    {


        try {

            if ($request->current_role_id != $request->role_id) {
                User::where('id', $request->user_id)->update(['role_id' => $request->role_id]);
                toastr()->success('Data has been saved successfully!');
                return back();
            }
            toastr()->error('something error');
            return back();

        } catch (\Throwable $th) {
            toastr()->error('something error');
            return back();
        }

    }


    public function deleteRole(Role $role)
    {

        try {

            if ($role->users()->exists()) {
                toastr()->error('can not delete this role because some users related to !');
                return back();
            }

            $role->delete();

            toastr()->success('Data has been saved successfully!');
            return back();

        } catch (\Throwable $th) {
            toastr()->error('something error');
            return back();
        }


    }


    public function updateRole(UpdateRoleRequest $request)
    {


        try {

            Role::where('id', $request->role_id)->update($request->validated());

            toastr()->success('Data has been saved successfully!');
            return back();

        } catch (\Throwable $th) {

            toastr()->error('somthing error ! , try again later');
            return back();

        }


    }


}
