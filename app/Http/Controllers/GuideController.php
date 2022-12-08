<?php

namespace App\Http\Controllers;

use App\Models\guide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GuideController extends Controller
{
// Create Index
public function index(){
    $guides=guide::paginate(5);
    return view('admin.guide.index',compact('guides'));
}

//หน้าเพิ่มข้อมูล
public function create() {
    return view('admin.guide.create');
}

// Store resource
public function store(Request $request ) {
    $request->validate([
        'guide_name' => 'required',
        'guide_lname' => 'required',
        'guide_gender' => 'required',
        'guide_birthday' => 'required',
        'guide_tel' => 'required',
        'guide_address' => 'required',
        'guide_price' => 'required',
        'guide_img' => 'required',

    ]);

//การเข้ารหัสรูปภาพ  
$guide_img = $request->file('guide_img');

//Generate ชื่อภาพ
$name_gen=hexdec(uniqid());

// ดึงนามสกุลไฟล์ภาพ
$img_ext = strtolower($guide_img->getClientOriginalExtension());
$img_name = $name_gen.'.'.$img_ext;

//อัพโหลดและบันทึกข้อมูล
$upload_location = 'image/guide/';
$full_path = $upload_location.$img_name;

Guide::insert([
    'guide_name'=>$request->guide_name,
    'guide_lname'=>$request->guide_lname,
    'guide_gender'=>$request->guide_gender,
    'guide_birthday'=>$request->guide_birthday,
    'guide_tel'=>$request->guide_tel,
    'guide_address'=>$request->guide_address,
    'guide_price'=>$request->guide_price,
    'guide_img'=>$full_path,

]);
$guide_img->move($upload_location,$img_name);
return redirect()->route('guide')->with('success', 'ข้อมูลไกด์นำเที่ยวได้รับการบันทึกเรียบร้อยแล้ว');

}

    
// ----------------------------------------------------------------------------------------------------    
// ----------------------------------------------------------------------------------------------------   

    //หน้าแก้ไขข้อมูล
    public function edit($guide_id){
        $guide = Guide::find($guide_id);
        // $typetravels = Typetravel::all();
        return view('admin.guide.edit',compact('guide'));
    }

    //แก้ไขข้อมูล
    public function update(Request $request , $guide_id){
        //ตรวจสอบข้อมูล
        $request->validate([
            [

            ],
            [

            ]
        ]);
        $guide_img = $request->file('guide_img');

        //อัพเดทภาพและข้อมูลอื่นๆ
        if($guide_img){

            //Generate ชื่อภาพ
            $name_gen=hexdec(uniqid());

            // ดึงนามสกุลไฟล์ภาพ
            $img_ext = strtolower($guide_img->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;

            //อัพโหลดและอัพเดทข้อมูล
            $upload_location = 'image/guide/';
            $full_path = $upload_location.$img_name;

            //อัพเดทข้อมูล
            Guide::find($guide_id)->update([
                'guide_name'=>$request->guide_name,
                'guide_lname'=>$request->guide_lname,
                'guide_gender'=>$request->guide_gender,
                'guide_birthday'=>$request->guide_birthday,
                'guide_tel'=>$request->guide_tel,
                'guide_address'=>$request->guide_address,
                'guide_price'=>$request->guide_price,
                'guide_img'=>$full_path,

            ]);

            //ลบภาพเก่าและอัพภาพใหม่แทนที่
            $old_image = $request->old_image;
            unlink($old_image);
            $guide_img->move($upload_location,$img_name);

            return redirect()->route('guide')->with('success', 'อัพเดทภาพและข้อมูลเรียบร้อยแล้ว');

        }else{
            //อัพเดทข้อมูลอย่างเดียว
            Guide::find($guide_id)->update([
                'guide_name'=>$request->guide_name,
                'guide_lname'=>$request->guide_lname,
                'guide_gender'=>$request->guide_gender,
                'guide_birthday'=>$request->guide_birthday,
                'guide_tel'=>$request->guide_tel,
                'guide_address'=>$request->guide_address,
                'guide_price'=>$request->guide_price,

            ]);
            return redirect()->route('guide')->with('success', 'อัพเดทข้อมูลเรียบร้อยแล้ว');
        } 
    }

    //ลบข้อมูล
    public function destroy($guide_id){
        // ลบภาพ
        $img = Guide::find($guide_id)->guide_img;
        unlink($img);
        
        //ลบข้อมูลจากฐานข้อมูล
        $delete=Guide::find($guide_id)->delete();
       
        return redirect()->route('guide')->with('success', 'ลบข้อมูลเรียบร้อยแล้ว');
    }

    //อัพเดทสถานะไกด์
    public function changeStatusGuide($guide_id){
        $getStatus = Guide::select('guide_status')->where('guide_id',$guide_id)->first();
        if($getStatus->guide_status==1){
            $guide_status = 0;
        }else{
            $guide_status = 1;
        }
        Guide::where('guide_id',$guide_id)->update(['guide_status'=>$guide_status]);
        return redirect()->back()->with('success', 'สถานะได้ทำการถูกเปลี่ยนเรียบร้อยแล้ว');
        // return $getStatus;
    }
}
