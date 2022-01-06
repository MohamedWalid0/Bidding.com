<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReportUser extends Model
{
    use HasFactory;
    protected $table = 'report_users' ;
    protected $guarded = [] ;


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function reporter(): BelongsTo
    {
        return $this->belongsTo(User::class , 'reporter_id');
    }

}
