<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bookingpay;
use App\Models\booking;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingpayController extends Controller
{
    //หน้าแสดงข้อมูล
    public function index(){
        $bookingpays=DB::table('bookingpays')
        ->join('bookings','bookingpays.booking_id','bookings.booking_id')
        ->join('users','bookingpays.user_id','users.user_id')
        ->select('bookingpays.*','bookings.*','users.*')->paginate(6);
        // $typerooms=Typeroom::paginate(5);
        return view('admin.bookingpay.index',compact('bookingpays'));
    }

    //หน้าเพิ่มข้อมูล
    public function create() {
        $bookings = Booking::all();
        return view('admin.bookingpay.create',compact('bookings'));
    }

    public function store(Request $request){
        //ตรวจสอบข้อมูล
        $request->validate(
            [
                // 'room_number'=>'required|unique:rooms|max:10',
                // 'room_img'=>'required|mimes:jpg,jpeg,png',
                // 'typeroom_id'=>'required',
                // 'room_detail'=>'required',
                // 'room_contain'=>'required',
                // 'room_price'=>'required',
                // 'room_img'=>'required',
            ],
            [
                // 'room_number.required'=>"กรุณาป้อนหมายเลขห้องพัก",
                // 'room_number.max' => "ห้ามป้อนหมายเลขเกิน 10 ตัวเลข",
                // 'room_number.unique'=>"มีข้อมูลหมายเลขนี้ในฐานข้อมูลแล้ว",

                // 'typeroom_id.required'=>"กรุณาเลือกข้อมูลประเภทห้องพัก",
                // 'room_detail.required'=>"กรุณาป้อนข้อมูลรายละเอียดห้องพัก",
                // 'room_contain.required'=>"กรุณาระบุความจุห้องพัก",
                // 'room_price.required'=>"กรุณาป้อนราคาห้องพัก",
                // 'room_img.required'=>"กรุณาเพิ่มรูปภาพห้องพัก",
            ]

        );

        //การเข้ารหัสรูปภาพ  
        $pay_img = $request->file('pay_img');

        //Generate ชื่อภาพ
        $name_gen=hexdec(uniqid());

        // ดึงนามสกุลไฟล์ภาพ
        $img_ext = strtolower($pay_img->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;

        //อัพโหลดและบันทึกข้อมูล
        $upload_location = 'image/pay/';
        $full_path = $upload_location.$img_name;

        Bookingpay::insert([
            'booking_id'=>$request->booking_id,
            'user_id'=>Auth::user()->user_id,
            'pay_name'=>$request->pay_name,
            'pay_date'=>$request->pay_date,
            'pay_amount'=>$request->pay_amount,
            'pay_img'=>$full_path,

        ]);
        $pay_img->move($upload_location,$img_name);

        if (Auth::user()->is_admin) {
            return redirect()->route('bookingpay')->with('success', 'ข้อมูลการชำระเงินได้รับการบันทึกเรียบร้อยแล้ว');
        }
            return redirect()->route('showpayment')->with('success', 'ข้อมูลการชำระเงินได้รับการบันทึกเรียบร้อยแล้ว');
        }
    
        public function destroy($pay_id){
            $delete = Bookingpay::find($pay_id)->delete();

            if (Auth::user()->is_admin) {
                return redirect()->route('bookingpay')->with('success', 'ลบข้อมูลการชำระเงินเรียบร้อยแล้ว');
            }
                return redirect()->route('showpayment')->with('success', 'ลบข้อมูลการชำระเงินเรียบร้อยแล้ว');
    }

    //อัพเดทสถานะการชำระเงิน
    public function changeStatusBookingpay($pay_id){
        $getStatus = Bookingpay::select('pay_status')->where('pay_id',$pay_id)->first();
        if($getStatus->pay_status==1){
            $pay_status = 0;
        }else{
            $pay_status = 1;
        }
        Bookingpay::where('pay_id',$pay_id)->update(['pay_status'=>$pay_status]);
        return redirect()->back()->with('success', 'สถานะได้ทำการถูกเปลี่ยนเรียบร้อยแล้ว');
        // return $getStatus;
    }

}
