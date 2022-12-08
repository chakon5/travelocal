<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Package;
use App\Models\Typetravel;
use App\Models\Room;
use App\Models\Guide;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookingController extends Controller
{
    //หน้าแสดงการจองแพ็คเกจ
    public function index(){
        $bookings=DB::table('bookings')->where('booking_status',0)->orderby('booking_id','asc')
        ->join('packages','bookings.package_id','packages.package_id')
        ->join('users','bookings.user_id','users.user_id')
        ->join('typetravels','bookings.typetravel_id','typetravels.typetravel_id')
        ->select('bookings.*','packages.*','users.*','typetravels.*')->paginate(4);

        $bookingroom=DB::table('bookings')->where('booking_status',0)->orderby('booking_id','asc')
        ->join('typerooms','bookings.typeroom_id','typerooms.typeroom_id')
        ->join('rooms','bookings.room_id','rooms.room_id')
        ->join('users','bookings.user_id','users.user_id')
        ->select('bookings.*','typerooms.*','rooms.*','users.*')->paginate(5);

        $rooms = Room::all();

        return view('admin.booking.index',compact('bookings','bookingroom','rooms'));
    }

    //หน้าแสดงการจองแพ็คเกจ
    public function indexpackage(){
        $bookings=DB::table('bookings')->orderby('booking_id','asc')
        ->join('packages','bookings.package_id','packages.package_id')
        ->join('users','bookings.user_id','users.user_id')
        ->join('typetravels','bookings.typetravel_id','typetravels.typetravel_id')
        ->select('bookings.*','packages.*','users.*','typetravels.*')->paginate(4);

        $sum = 0;

        return view('admin.booking.indexpackage',compact('bookings','sum'));
    }

    //หน้าแสดงการจองห้องพัก
    public function indexroom(){
        $bookings=DB::table('bookings')
        ->join('typerooms','bookings.typeroom_id','typerooms.typeroom_id')
        ->join('rooms','bookings.room_id','rooms.room_id')
        ->join('users','bookings.user_id','users.user_id')
        ->select('bookings.*','typerooms.*','rooms.*','users.*')->paginate(5);

        $sum = 0;

        return view('admin.booking.indexroom',compact('bookings','sum'));
    }

    public function show( $id)
    {
        //
        //  $recipes = DB::table('recipes')->join('details_recipes','recipes.Recipes_id','details_recipes.Recipes_id')
        //  ->join('raw_materials','raw_materials.Raw_Material_id','details_recipes.Raw_Material_id')->where('details_recipes.Recipes_id',$id )
        //  ->select('recipes.Recipes_name','recipes.explain','details_recipes.*','raw_materials.Raw_Material_name')
        //  ->get();
        
         
        // // dd( $import);
        // // dd( $recipes1 );
        // $i=1;
        // return view('admin.booking.detailBooking',compact('recipes','i'));

    }

    //หน้าเพิ่มข้อมูล
    public function create() {
        $bookings = Booking::all();
        $packages = Package::all();
        $typetravels = Typetravel::all();
        return view('admin.booking.create',compact('bookings','packages','typetravels'));
    }

    public function store(Request $request){
        //ตรวจสอบข้อมูล
        $request->validate(
            [
            'booking_amount'=>'required',
            // 'package_id'=>'required',
            ],
            [
            'booking_amount.required'=>"กรุณาป้อนจำนวน",
            // 'booking_amount.max'=>"ห้ามป้อนจำนวนเกิน 10 คน",
            // 'package_id.required'=>"กรุณาเลือกแพ็คเกจที่ต้องการ",
            ]
        );
        //บันทึกข้อมูล
        $booking = new Booking;
        
        // dd(Auth::user()->is_admin);
        $booking->user_id = Auth::user()->user_id;
        $booking->package_id = $request->package_id;
        $booking->typeroom_id = $request->typeroom_id;
        $booking->room_id = $request->room_id;
        $booking->typetravel_id = $request->typetravel_id;
        $booking->guide_id = $request->guide_id;
        $booking->booking_check_in = $request->booking_check_in;
        $booking->booking_check_out = $request->booking_check_out;
        $booking->stay_amount = $request->stay_amount;
        $booking->booking_amount = $request->booking_amount;
        $booking->booking_total = (int)$request->totalBooking;

        $booking->save();

        //อัพเดทสถานะการจอง เมื่อมีการเลือก ID ห้องพัก
        //สถานะ ว่างอยู่ ---> จองแล้ว

        if (isset($request->room_id)) {
            Room::where('room_id',$request->room_id)
            ->update(['room_status' => 1]);
        }

        if (isset($request->guide_id)) {
            Guide::where('guide_id',$request->guide_id)
            ->update(['guide_status' => 1]);
        }

        if (Auth::user()->is_admin) {
        return redirect()->route('booking')->with('success', 'ข้อมูลการจองได้รับการบันทึกเรียบร้อยแล้ว');
    }
        return redirect()->route('showbooking')->with('success', 'ข้อมูลการจองได้รับการบันทึกเรียบร้อยแล้ว');
    }

    //หน้าแก้ไขข้อมูล
    public function edit($booking_id){
        $booking = Booking::find($booking_id);
        $packages = Package::all();
        $typetravels = Typetravel::all();
        return view('admin.booking.edit',compact('booking','packages','typetravels'));
    }

    public function update(Request $request , $booking_id){
        //ตรวจสอบข้อมูล
        $request->validate(
            [
                // 'typetravel_name'=>'required|max:255',
                // 'typetravel_detail'=>'required',
                // 'typetravel_address'=>'required',
            ],
            [
                // 'typetravel_name.required'=>"กรุณาป้อนชื่อประเภทการท่องเที่ยว",
                // 'typetravel_name.max' => "ห้ามป้อนข้อมูลเกิน 255 ตัวอักษร",

                // 'typetravel_detail.required'=>"กรุณาป้อนข้อมูลรายละเอียด",
                // 'typetravel_address.required'=>"กรุณาป้อนข้อมูลแหล่งที่ตั้ง",
            ]
        );
        $update = Booking::find($booking_id)->update([

            'user_id'=>Auth::user()->user_id,
            'package_id'=>$request->package_id,
            'booking_check_in'=>$request->booking_check_in,
            'booking_check_out'=>$request->booking_check_out,
            // 'booking_date'=>$request->booking_date,
            'booking_amount'=>$request->booking_amount,
            'booking_total'=>(int)$request->totalBooking,

        ]);

        return redirect()->route('booking')->with('success', 'ข้อมูลกการจองได้รับการอัพเดทเรียบร้อยแล้ว');
    }

    public function destroy($booking_id){
        $delete = Booking::find($booking_id)->delete();

        //อัพเดทสถานะการจอง เมื่อมีการเลือก ID ห้องพัก
        //สถานะ ว่างอยู่ ---> จองแล้ว

        if (isset($request->room_id)) {
            Room::where('room_id',$request->room_id)
            ->update(['room_status' => 0]);
        }

        if (Auth::user()->is_admin) {
            return redirect()->route('booking')->with('success', 'ยกเลิกการจองเรียบร้อยแล้ว');
        }
            return redirect()->route('showbooking')->with('success', 'ยกเลิกการจองเรียบร้อยแล้ว');
        }

    // public function next(Request $request){
    //     $next = $request->all();
    //     return redirect()->route('bookroom')->with([ 'next' => $next ]);
        // dd($next);
    // }

    public function detail($booking_id) {
        $bookings=DB::table('bookings')
        ->join('typetravels','bookings.typetravel_id','typetravels.typetravel_id')
        ->join('packages','bookings.package_id','packages.package_id')->where('bookings.booking_id',$booking_id)
        ->select('bookings.*','typetravels.*','packages.*')->paginate(5);


        // $typetravels = Typetravel::all();


        return view('admin.booking.detailBooking',compact('bookings'));
    }

    //change status
    public function changeStatusBooking($booking_id){
        $getStatus = Booking::select('booking_status')->where('booking_id',$booking_id)->first();
        if($getStatus->booking_status==1){
            $booking_status = 0;
        }else{
            $booking_status = 1;
        }
        Booking::where('booking_id',$booking_id)->update(['booking_status'=>$booking_status]);
        return redirect()->back()->with('success', 'สถานะได้ทำการถูกเปลี่ยนเรียบร้อยแล้ว');
        // return $getStatus;
    }
}