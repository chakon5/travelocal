<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Typeroom;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoomController extends Controller
{
    //หน้าแสดงข้อมูล
    public function index(){
        $rooms=DB::table('rooms')
        ->join('typerooms','rooms.typeroom_id','typerooms.typeroom_id')
        ->select('rooms.*','typerooms.typeroom_name')->paginate(4);

        return view('admin.room.index',compact('rooms'));
    }

    //หน้าแสดงข้อมูล
    public function detail(){
        $rooms=DB::table('rooms')
        ->join('typerooms','rooms.typeroom_id','typerooms.typeroom_id')
        ->select('rooms.*','typerooms.typeroom_name')->paginate(4);

        return view('admin.room.detail',compact('rooms'));
    }

    //หน้าเพิ่มข้อมูล
    public function create() {
        $typerooms = Typeroom::all();
        return view('admin.room.create',compact('typerooms'));
    }

    public function store(Request $request){
        //ตรวจสอบข้อมูล
        $request->validate(
            [
                'room_number'=>'required|unique:rooms|max:10',
                'room_img'=>'required|mimes:jpg,jpeg,png',
                'typeroom_id'=>'required',
                'room_detail'=>'required',
                'room_contain'=>'required',
                'room_price'=>'required',
                'room_img'=>'required',
            ],
            [
                'room_number.required'=>"กรุณาป้อนหมายเลขห้องพัก",
                'room_number.max' => "ห้ามป้อนหมายเลขเกิน 10 ตัวเลข",
                'room_number.unique'=>"มีข้อมูลหมายเลขนี้ในฐานข้อมูลแล้ว",

                'typeroom_id.required'=>"กรุณาเลือกข้อมูลประเภทห้องพัก",
                'room_detail.required'=>"กรุณาป้อนข้อมูลรายละเอียดห้องพัก",
                'room_contain.required'=>"กรุณาระบุความจุห้องพัก",
                'room_price.required'=>"กรุณาป้อนราคาห้องพัก",
                'room_img.required'=>"กรุณาเพิ่มรูปภาพห้องพัก",
            ]

        );

        //การเข้ารหัสรูปภาพ  
        $room_img = $request->file('room_img');

        //Generate ชื่อภาพ
        $name_gen=hexdec(uniqid());

        // ดึงนามสกุลไฟล์ภาพ
        $img_ext = strtolower($room_img->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;

        //อัพโหลดและบันทึกข้อมูล
        $upload_location = 'image/room/';
        $full_path = $upload_location.$img_name;

        Room::insert([
            'typeroom_id'=>$request->typeroom_id,
            'room_number'=>$request->room_number,
            'room_contain'=>$request->room_contain,
            'room_price'=>$request->room_price,
            'room_detail'=>$request->room_detail,
            'room_img'=>$full_path,
            'created_at'=>Carbon::now()
        ]);
        $room_img->move($upload_location,$img_name);
        return redirect()->route('room')->with('success', 'ข้อมูลห้องพักได้รับการบันทึกเรียบร้อยแล้ว');

    }

// ----------------------------------------------------------------------------------------------------    
// ----------------------------------------------------------------------------------------------------    

    //หน้าแก้ไขข้อมูล
    public function edit($room_id){
        $room = Room::find($room_id);
        $typerooms = Typeroom::all();
        return view('admin.room.edit',compact('room','typerooms'));
    }

    //แก้ไขข้อมูล
    public function update(Request $request , $room_id){
        //ตรวจสอบข้อมูล
        $request->validate([
            [
                // 'room_number'=>'required|max:10',
                // 'room_img'=>'required|mimes:jpg,jpeg,png',
                // // 'typeroom_id'=>'required',
                // 'room_detail'=>'required',
                // // 'room_contain'=>'required',
                // 'room_price'=>'required',
                // 'room_img'=>'required',
            ],
            [
                // 'room_number.required'=>"กรุณาป้อนหมายเลขห้องพัก",
                // 'room_number.max' => "ห้ามป้อนหมายเลขเกิน 10 ตัวเลข",

                // // 'typeroom_id.required'=>"กรุณาเลือกข้อมูลประเภทห้องพัก",
                // 'room_detail.required'=>"กรุณาป้อนข้อมูลรายละเอียดห้องพัก",
                // // 'room_contain.required'=>"กรุณาระบุความจุห้องพัก",
                // 'room_price.required'=>"กรุณาป้อนราคาห้องพัก",
                // 'room_img.required'=>"กรุณาเพิ่มรูปภาพห้องพัก",
            ]
        ]);
        $room_img = $request->file('room_img');

        //อัพเดทภาพและข้อมูลอื่นๆ
        if($room_img){

            //Generate ชื่อภาพ
            $name_gen=hexdec(uniqid());

            // ดึงนามสกุลไฟล์ภาพ
            $img_ext = strtolower($room_img->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;

            //อัพโหลดและอัพเดทข้อมูล
            $upload_location = 'image/room/';
            $full_path = $upload_location.$img_name;

            //อัพเดทข้อมูล
            Room::find($room_id)->update([
                'typeroom_id'=>$request->typeroom_id,
                'room_number'=>$request->room_number,
                'room_contain'=>$request->room_contain,
                'room_price'=>$request->room_price,
                'room_detail'=>$request->room_detail,
                'room_img'=>$full_path
            ]);

            //ลบภาพเก่าและอัพภาพใหม่แทนที่
            $old_image = $request->old_image;
            unlink($old_image);
            $room_img->move($upload_location,$img_name);

            return redirect()->route('room')->with('success', 'อัพเดทภาพและข้อมูลเรียบร้อยแล้ว');

        }else{
            //อัพเดทข้อมูลอย่างเดียว
            Room::find($room_id)->update([
                'typeroom_id'=>$request->typeroom_id,
                'room_number'=>$request->room_number,
                'room_contain'=>$request->room_contain,
                'room_price'=>$request->room_price,
                'room_detail'=>$request->room_detail,

            ]);
            return redirect()->route('room')->with('success', 'อัพเดทข้อมูลเรียบร้อยแล้ว');
        } 
    }

    //ลบข้อมูล
    public function destroy($room_id){
        // ลบภาพ
        $img = Room::find($room_id)->room_img;
        unlink($img);
        
        //ลบข้อมูลจากฐานข้อมูล
        $delete=Room::find($room_id)->delete();
       
        return redirect()->route('room')->with('success', 'ลบข้อมูลเรียบร้อยแล้ว');
    }

    //change status
    public function changeStatus($room_id){
        $getStatus = Room::select('room_status')->where('room_id',$room_id)->first();
        if($getStatus->room_status==1){
            $room_status = 0;
        }else{
            $room_status = 1;
        }
        Room::where('room_id',$room_id)->update(['room_status'=>$room_status]);
        // Toastr::success('Status Successfully Changed', 'Success', ["positionClass" => "toast-top-right","closeButton"=> "true","progressBar"=> "true"]);
        return redirect()->back()->with('success', 'สถานะได้ทำการถูกเปลี่ยนเรียบร้อยแล้ว');
        // return $getStatus;
    }
}