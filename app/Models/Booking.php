<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'booking_id',
        'user_id',
        'package_id',
        'booking_check_in',
        'booking_check_out',
        'booking_amount',
        'booking_date',
        'booking_total',
    ];
}
