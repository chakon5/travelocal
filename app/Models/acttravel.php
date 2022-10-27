<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Database\Eloquent\SoftDeletes;

class acttravel extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $primaryKey = 'at_id';

    protected $fillable = [
        'typetv_id',
        'typetv_name',
    ];

    public function type_travel(){
        return $this->hasOne(Type_travel::class,'tpyetv_id','tpyetv_id');
    }
}
