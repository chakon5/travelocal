<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menufood;
use App\Models\Typetravel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MenufoodController extends Controller
{
    //หน้าแสดงข้อมูล
    public function index(){
        $menufoods=DB::table('menufoods')
        ->join('typetravels','menufoods.typetravel_id','typetravels.typetravel_id')
        ->select('menufoods.*','typetravels.typetravel_name')->paginate(3);
        return view('admin.menufood.index',compact('menufoods'));
    }

    //หน้าเพิ่มข้อมูล
    public function create() {
        $typetravels = Typetravel::all();
        return view('admin.menufood.create',compact('typetravels'));
    }

    public function store(Request $request){
        //ตรวจสอบข้อมูล
        $request->validate(
            [
                'food_name'=>'required|unique:menufoods|max:255',
                'food_img'=>'required|mimes:jpg,jpeg,png',
                'food_type'=>'required',
                'food_list'=>'required',
                'food_note'=>'required',
            ],
            [
                'food_name.required'=>"กรุณาป้อนชื่อเซ็ทอาหาร",
                'food_name.max' => "ห้ามป้อนตัวอักษรเกิน 255 ตัวอักษร",
                'food_name.unique'=>"มีข้อมูลชื่อนี้ในฐานข้อมูลแล้ว",

                'food_type.required'=>"กรุณาป้อนรูปแบบ",
                'food_list.required'=>"กรุณาป้อนรายการอาหาร",
                'food_note.required'=>"กรุณาป้อนหมายเหตุ",
            ]

        );
        //การเข้ารหัสรูปภาพ  
        $food_img = $request->file('food_img');

        //Generate ชื่อภาพ
        $name_gen=hexdec(uniqid());

        // ดึงนามสกุลไฟล์ภาพ
        $img_ext = strtolower($food_img->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;

        //อัพโหลดและบันทึกข้อมูล
        $upload_location = 'image/menufood/';
        $full_path = $upload_location.$img_name;

        Menufood::insert([
            'typetravel_id'=>$request->typetravel_id,
            'food_name'=>$request->food_name,
            'food_type'=>$request->food_type,
            'food_list'=>$request->food_list,
            'food_note'=>$request->food_note,
            'food_img'=>$full_path,
            'created_at'=>Carbon::now()
        ]);
        $food_img->move($upload_location,$img_name);
        return redirect()->route('menufood')->with('success', 'ข้อมูลเซ็ทอาหารได้รับการบันทึกเรียบร้อยแล้ว');

    }

// ----------------------------------------------------------------------------------------------------    
// ----------------------------------------------------------------------------------------------------   

    //หน้าแก้ไขข้อมูล
    public function edit($food_id){
        $menufood = Menufood::find($food_id);
        $typetravels = Typetravel::all();
        return view('admin.menufood.edit',compact('menufood','typetravels'));
    }

    //แก้ไขข้อมูล
    public function update(Request $request , $food_id){
        //ตรวจสอบข้อมูล
        $request->validate([
            [

            ],
            [

            ]
        ]);
        $food_img = $request->file('food_img');

        //อัพเดทภาพและข้อมูลอื่นๆ
        if($food_img){

            //Generate ชื่อภาพ
            $name_gen=hexdec(uniqid());

            // ดึงนามสกุลไฟล์ภาพ
            $img_ext = strtolower($food_img->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;

            //อัพโหลดและอัพเดทข้อมูล
            $upload_location = 'image/menufood/';
            $full_path = $upload_location.$img_name;

            //อัพเดทข้อมูล
            Menufood::find($food_id)->update([
                'typetravel_id'=>$request->typetravel_id,
                'food_name'=>$request->food_name,
                'food_type'=>$request->food_type,
                'food_list'=>$request->food_list,
                'food_note'=>$request->food_note,
                'food_img'=>$full_path,
            ]);

            //ลบภาพเก่าและอัพภาพใหม่แทนที่
            $old_image = $request->old_image;
            unlink($old_image);
            $food_img->move($upload_location,$img_name);

            return redirect()->route('menufood')->with('success', 'อัพเดทภาพและข้อมูลเรียบร้อยแล้ว');

        }else{
            //อัพเดทข้อมูลอย่างเดียว
            Menufood::find($food_id)->update([
                'typetravel_id'=>$request->typetravel_id,
                'food_name'=>$request->food_name,
                'food_type'=>$request->food_type,
                'food_list'=>$request->food_list,
                'food_note'=>$request->food_note,

            ]);
            return redirect()->route('menufood')->with('success', 'อัพเดทข้อมูลเรียบร้อยแล้ว');
        } 
    }

    //ลบข้อมูล
    public function destroy($food_id){
        // ลบภาพ
        $img = Menufood::find($food_id)->food_img;
        unlink($img);
        
        //ลบข้อมูลจากฐานข้อมูล
        $delete=Menufood::find($food_id)->delete();
       
        return redirect()->route('menufood')->with('success', 'ลบข้อมูลเรียบร้อยแล้ว');
    }

}
