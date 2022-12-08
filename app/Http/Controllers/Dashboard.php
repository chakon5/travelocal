<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    //หน้าแสดงการจองแพ็คเกจ
    public function index(){
        $bookings=DB::table('bookings')->where('booking_status',0)->count();
        $bookingpays=DB::table('bookingpays')->where('pay_status',0)->count();

        $bookingsuccess=DB::table('bookings')->where('booking_status',1)->count();
        $bookingall=DB::table('bookings')->count();

        $bookingincome=DB::table('bookings')->where('booking_status',1)->sum('booking_total');
        $bookingpackage=DB::table('bookings')
        ->join('packages','bookings.package_id','packages.package_id')
        ->select('bookings.*','packages.*')->count();

        $bookingroom=DB::table('bookings')
        ->join('rooms','bookings.room_id','rooms.room_id')
        ->select('bookings.*','rooms.*')->count();

        return view('adminHome',compact('bookings','bookingpays','bookingsuccess','bookingall','bookingincome','bookingpackage','bookingroom'));
    }
}
