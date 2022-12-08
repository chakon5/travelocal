<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menufood extends Model
{
    use HasFactory;

    protected $primaryKey = 'food_id';

    protected $fillable = [
        'food_id',
        'typetravel_id',
        'food_name',
        'food_type',
        'food_list',
        'food_note',
        'food_img',
    ];
}
