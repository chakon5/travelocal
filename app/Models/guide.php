<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guide extends Model
{
    use HasFactory;
    protected $primaryKey = 'guide_id';

    protected $fillable = [
        'guide_name',
        'guide_lname',
        'guide_gender',
        'guide_birthday',
        'guide_tel',
        'guide_address',
        'guide_price',
        'guide_status'
    ];
    
}
