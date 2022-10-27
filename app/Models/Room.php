<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $primaryKey = 'room_id';
    // protected $foreignKey = 'typeroom_id';

    protected $fillable = [
        'room_id',
        'typeroom_id',
        'room_number',
        'room_detail',
        'room_contain',
        'room_price',
        'room_img',
    ];
}
