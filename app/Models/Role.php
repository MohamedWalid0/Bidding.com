<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [] ;



    public static function getAdminRoleId(){

        $role = self::where('name' , 'admin')->select('id')->first();
        return $role->id ;

    }



    public function users(): HasMany
    {
        return $this->hasMany(User::class );
    }



}
