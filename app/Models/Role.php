<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'abilities' => 'array'
    ];


    public static function getAdminRoleId()
    {
        return self::where('name', 'admin')->select('id')->first()->id;
    }


    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }


}
