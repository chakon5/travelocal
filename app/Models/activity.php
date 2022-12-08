<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $primaryKey = 'activity_id';

    protected $fillable = [
        'activity_id',
        'typetravel_id',
        'activity_name',
        'activity_detail',
        'activity_price',
        'activity_note',
        'activity_img',
    ];
}
