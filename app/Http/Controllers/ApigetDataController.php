<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typetravel;
use App\Models\Menufood;
use App\Models\Acttravel;

class ApigetDataController extends Controller
{
    //
    function apigetdata($typetravel_id) {
    
        $acttravels = Acttravel::where('typetravel_id',$typetravel_id)->get();
        $menufoods = Menufood::where('typetravel_id',$typetravel_id)->get();

    return response()->json(['acttravels'=>$acttravels,'menufoods'=>$menufoods]);
    }
}
