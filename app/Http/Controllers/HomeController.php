<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typetravel;
use App\Models\Package;
use App\Models\Booking;
use App\Models\Bookingpay;
use App\Models\User;
use App\Models\Room;
use App\Models\Typeroom;
use App\Models\Guide;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {
        return view('adminHome');
    }

    public function BookPg()
    {
        $typetravels = Typetravel::all();
        $packages = Package::all();
        $guides = Guide::all();

        return view('bookpg',compact('typetravels','packages','guides'));
    }

    public function showBooking() {
    // {->where('user_id',Auth::user()->user_id)->orderby('user_id','asc')

        $bookings=DB::table('bookings')->orderby('booking_id','asc')
        ->join('packages','bookings.package_id','packages.package_id')
        ->join('users','bookings.user_id','users.user_id')->where('users.user_id',Auth::user()->user_id)
        ->select('bookings.*','packages.*','users.*')->paginate(5);

        $bookingpays = Bookingpay::all();
        $typetravels = Typetravel::all();
        $packages = Package::all(); 

        // $users = User::where('is_admin','0')->orderby('user_id','asc')->paginate(5);

        return view('showbooking',compact('typetravels','bookingpays','packages','bookings'));
    }

    public function showBookroom() {
        $bookings=DB::table('bookings')->orderby('booking_id','asc')
        ->join('typerooms','bookings.typeroom_id','typerooms.typeroom_id')
        ->join('rooms','bookings.room_id','rooms.room_id')
        ->join('users','bookings.user_id','users.user_id')->where('users.user_id',Auth::user()->user_id)
        ->select('bookings.*','typerooms.*','rooms.*','users.*')->paginate(5);

        $bookingpays = Bookingpay::all();
        $typetravels = Typetravel::all();
        $packages = Package::all(); 

        // $users = User::where('is_admin','0')->orderby('user_id','asc')->paginate(5);

        return view('showbookroom',compact('typetravels','bookingpays','packages','bookings'));
    }

    public function showroom($booking_id) {
        $bookings=DB::table('bookings')
        ->join('rooms','bookings.room_id','rooms.room_id')->where('bookings.booking_id',$booking_id)
        ->select('bookings.*','rooms.*')->paginate(5);

        return view('showroom',compact('bookings'));
    }

    public function showpackage($booking_id) {
        $bookings=DB::table('bookings')
        ->join('packages','bookings.package_id','packages.package_id')->where('bookings.booking_id',$booking_id)
        ->select('bookings.*','packages.*')->paginate(5);

        return view('showpackage',compact('bookings'));
    }

    
    
    public function PayMent($booking_id) {
        // $bookings=DB::table('bookings')
        // ->join('packages','bookings.package_id','packages.package_id')->where('users.user_id',Auth::user()->user_id)
        // ->join('users','bookings.user_id','users.user_id')->where('users.user_id',Auth::user()->user_id)
        // ->select('bookings.*','packages.*','users.*')->paginate(5);
        $bookings = Booking::find($booking_id);
        $typetravels = Typetravel::all();
        $packages = Package::all();
        
        return view('payment',compact('bookings','typetravels','packages'));
    }

    public function showPayment() {
        $bookingpays=DB::table('bookingpays')
        ->join('bookings','bookingpays.booking_id','bookings.booking_id')
        ->join('users','bookingpays.user_id','users.user_id')->where('users.user_id',Auth::user()->user_id)
        ->select('bookingpays.*','bookings.*','users.*')->paginate(6);

        return view('showpayment',compact('bookingpays'));
    }

    public function BookActivity()
    {
        return view('bookactivity');
    }

    public function BookRoom(Request $request)
    {
        // $typerooms=DB::table('typerooms')
        // ->join('rooms','typerooms.typeroom_id','rooms.typeroom_id')
        // ->select('typerooms.*','rooms.*');

        $typerooms = Typeroom::all();
        $typetravels = Typetravel::all();
        $rooms = Room::all();

        return view('bookroom',compact('typerooms','typetravels','rooms'));
    }

    public function CustomerDB()
    {
        return view('customerdb');
    }

    public function CustomerInsert()
    {
        return view('customerinsert');
    }


}
