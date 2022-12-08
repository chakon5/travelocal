<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acttravel extends Model
{
    use HasFactory;

    protected $primaryKey = 'acttravel_id';

    protected $fillable = [
        'acttravel_id',
        'typetravel_id',
        'acttravel_name',
        'acttravel_type',
        'acttravel_list',
        'acttravel_note',
    ];
}
