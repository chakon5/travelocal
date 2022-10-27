<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typetravel extends Model
{
    use HasFactory;
    protected $primaryKey = 'typetravel_id';

    protected $fillable = [
        'typetravel_id',
        'typetravel_name',
        'typetravel_detail',
        'typetravel_address',
        'user_id',
    ];
}
