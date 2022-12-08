<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Typetravel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ActivityController extends Controller
{
    //หน้าแสดงข้อมูล
    public function index(){
        $activities=DB::table('activities')
        ->join('typetravels','activities.typetravel_id','typetravels.typetravel_id')
        ->select('activities.*','typetravels.typetravel_name')->paginate(3);
        // $activities=Activity::paginate(5);
        return view('admin.activity.index',compact('activities'));
    }

    //หน้าเพิ่มข้อมูล
    public function create() {
        $typetravels = Typetravel::all();
        return view('admin.activity.create',compact('typetravels'));
    }

    public function store(Request $request){
        //ตรวจสอบข้อมูล
        $request->validate(
            [
                // 'activity_name'=>'required|unique:activities|max:255',
                // 'activity_price'=>'required',
                // 'activity_detail'=>'required',
                // 'activity_note'=>'required',
            ],
            [
                // 'activity_name.required'=>"กรุณาป้อนชื่อกิจกรรมเสริม",
                // 'activity_name.max' => "ห้ามป้อนข้อมูลเกิน 255 ตัวอักษร",
                // 'activity_name.unique'=>"มีข้อมูลชื่อนี้ในฐานข้อมูลแล้ว",

                // 'activity_price.required'=>"กรุณาป้อนราคากิจกรรมเสริม",
                // 'activity_detail.required'=>"กรุณาป้อนรายละเอียดกิจกรรมเสริม",
                // 'activity_note.required'=>"ป้อนหมายเหตุเพิ่มเติม",
            ]

        );

        //การเข้ารหัสรูปภาพ  
        $activity_img = $request->file('activity_img');

        //Generate ชื่อภาพ
        $name_gen=hexdec(uniqid());

        // ดึงนามสกุลไฟล์ภาพ
        $img_ext = strtolower($activity_img->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;

        //อัพโหลดและบันทึกข้อมูล
        $upload_location = 'image/activity/';
        $full_path = $upload_location.$img_name;

        Activity::insert([
            'typetravel_id'=>$request->typetravel_id,
            'activity_name'=>$request->activity_name,
            'activity_detail'=>$request->activity_detail,
            'activity_price'=>$request->activity_price,
            'activity_note'=>$request->activity_note,
            'activity_img'=>$full_path,
            'created_at'=>Carbon::now()
        ]);
        $activity_img->move($upload_location,$img_name);
        return redirect()->route('activity')->with('success', 'ข้อมูลกิจกรรมเสริมได้รับการบันทึกเรียบร้อยแล้ว');

    }

// ----------------------------------------------------------------------------------------------------    
// ----------------------------------------------------------------------------------------------------   

    //หน้าแก้ไขข้อมูล
    public function edit($activity_id){
        $activity = Activity::find($activity_id);
        $typetravels = Typetravel::all();
        return view('admin.activity.edit',compact('activity','typetravels'));
    }

    //แก้ไขข้อมูล
    public function update(Request $request , $activity_id){
        //ตรวจสอบข้อมูล
        $request->validate([
            [

            ],
            [

            ]
        ]);
        $activity_img = $request->file('activity_img');

        //อัพเดทภาพและข้อมูลอื่นๆ
        if($activity_img){

            //Generate ชื่อภาพ
            $name_gen=hexdec(uniqid());

            // ดึงนามสกุลไฟล์ภาพ
            $img_ext = strtolower($activity_img->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;

            //อัพโหลดและอัพเดทข้อมูล
            $upload_location = 'image/activity/';
            $full_path = $upload_location.$img_name;

            //อัพเดทข้อมูล
            Activity::find($activity_id)->update([
                'typetravel_id'=>$request->typetravel_id,
                'activity_name'=>$request->activity_name,
                'activity_detail'=>$request->activity_detail,
                'activity_price'=>$request->activity_price,
                'activity_note'=>$request->activity_note,
                'activity_img'=>$full_path,
            ]);

            //ลบภาพเก่าและอัพภาพใหม่แทนที่
            $old_image = $request->old_image;
            unlink($old_image);
            $activity_img->move($upload_location,$img_name);

            return redirect()->route('activity')->with('success', 'อัพเดทภาพและข้อมูลเรียบร้อยแล้ว');

        }else{
            //อัพเดทข้อมูลอย่างเดียว
            Activity::find($activity_id)->update([
                'typetravel_id'=>$request->typetravel_id,
                'activity_name'=>$request->activity_name,
                'activity_detail'=>$request->activity_detail,
                'activity_price'=>$request->activity_price,
                'activity_note'=>$request->activity_note,

            ]);
            return redirect()->route('activity')->with('success', 'อัพเดทข้อมูลเรียบร้อยแล้ว');
        } 
    }

    //ลบข้อมูล
    public function destroy($activity_id){
        // ลบภาพ
        $img = Activity::find($activity_id)->activity_img;
        unlink($img);
        
        //ลบข้อมูลจากฐานข้อมูล
        $delete=Activity::find($activity_id)->delete();
       
        return redirect()->route('activity')->with('success', 'ลบข้อมูลเรียบร้อยแล้ว');
    }

}
