<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphPivot;

class Reaction extends MorphPivot
{
    use HasFactory;
    protected $table = 'reactions';

}
