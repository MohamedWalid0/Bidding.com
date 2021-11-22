<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;



    public static function getMaleId(){

        $gender = self::where('name' , 'male')->select('id')->first();
        return $gender->id ;

    }

    public static function getFemaleId(){

        $gender = self::where('name' , 'female')->select('id')->first();
        return $gender->id ;

    }

}
