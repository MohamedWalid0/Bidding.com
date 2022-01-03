<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlockUser extends Model
{
    use HasFactory;
    protected $table = 'block_users' ;
    protected $guarded = [] ;


    public function user():BelongsTo
    {
        return $this->belongsTo(User::class ,'user_id') ;
    }


    public function user_admin():BelongsTo
    {
        return $this->belongsTo(User::class , 'admin_id' ) ;
    }

}
