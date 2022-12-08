<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Employee as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'employee_id';

    protected $fillable = [
        'employee_name',
        'employee_lname',
        'employee_gender',
        'employee_birthday',
        'employee_tel',
        'employee_address',
        'email',
        'password',
        'is_admin',
    ];
}
