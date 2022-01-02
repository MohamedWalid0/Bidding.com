<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BlockUser;
use App\Models\User;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlockUserController extends Controller
{


    public function index(){

        $users = User::with(['account' , 'block.user_admin.account' , 'block_admins'])->get() ;
        $userBlocks = BlockUser::with(['user'])->pluck('user_id' )->toArray() ;

        return view('dashboard.block.index' , compact('users' , 'userBlocks' )) ;


    }


    public function storeBlock(User $user){

        try {

            if( $user->id == Auth::user()->id ) {
                toastr()->error('you can not block yourself !');
                return back();
            }

            if( $user->block()->exists() ) {
                toastr()->error('This user already blocked !');
                return back();
            }


            DB::beginTransaction();

            $user->block()->create([
                'user_id' => $user->id ,
                'admin_id' => Auth::user()->id
            ]);

            $user->products()->delete();

            $user->account()->update(['status' => 'blocked']) ;

            DB::commit();

            toastr()->success('Data has been saved successfully!');
            return back();

        } catch (\Throwable $th) {

            DB::rollback();
            toastr()->error('something error');
            return back();

        }

    }






    public function storeUnBlock(User $user){

        try {


            if( $user->id == Auth::user()->id ) {
                toastr()->error('you can not block yourself !');
                return back();
            }

            if( ! $user->block()->exists() ) {
                toastr()->error('This user already not blocked !');
                return back();
            }

            DB::beginTransaction();

            $user->block()->delete() ;

            $user->account()->update(['status' => 'active']) ;

            $user->products()->restore();

            DB::commit();


            toastr()->success('Data has been saved successfully!');
            return back();

        } catch (\Throwable $th) {

            DB::rollback();
            toastr()->error('something error');
            return back();

        }

    }


}
