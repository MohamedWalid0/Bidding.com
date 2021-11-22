<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;




    public static function getAdminRoleId(){

        $role = self::where('name' , 'admin')->select('id')->first();
        return $role->id ;

    }


}
