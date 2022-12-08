<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $primaryKey = 'package_id';

    protected $fillable = [
        'package_id',
        'typetravel_id',
        'acttravel_id',
        'food_id',
        'package_name',
        'package_detail',
        'package_highlight',
        'package_note',
        'package_price',
        'package_img',
    ];
}
