<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookingpay extends Model
{
    use HasFactory;

    protected $primaryKey = 'pay_id';

    protected $fillable = [
        'pay_id',
        'pay_name',
        'pay_date',
        'pay_amount',
        'pay_img',
        'pay_status',
    ];
}
