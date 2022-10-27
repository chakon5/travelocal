<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Typeroom extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $primaryKey = 'typeroom_id';

    protected $fillable = [
        'typeroom_id',
        'typetravel_id',
        'typeroom_name',
        'typeroom_detail',
        'typeroom_capacity',
        'user_id',
    ];
}
