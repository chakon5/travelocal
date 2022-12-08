<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Typetravel;
use App\Models\Acttravel;
use App\Models\Menufood;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PackageController extends Controller
{
    //หน้าแสดงข้อมูล
    public function index(){
        $packages=DB::table('packages')
        ->join('typetravels','packages.typetravel_id','typetravels.typetravel_id')
        ->join('acttravels','packages.acttravel_id','acttravels.acttravel_id')
        ->join('menufoods','packages.food_id','menufoods.food_id')
        ->select('packages.*','typetravels.*','acttravels.*','menufoods.*')->paginate(5);
        return view('admin.package.index',compact('packages'));
    }

    //หน้าเพิ่มข้อมูล
    public function create() {
        $packages = Package::all();
        $typetravels = Typetravel::all();

        // $acttravels = Acttravel::all();
        $acttravels=DB::table('acttravels')
        ->join('typetravels','acttravels.typetravel_id','typetravels.typetravel_id')
        ->select('acttravels.*','typetravels.typetravel_name')->get();

        // $menufoods = Menufood::all();
        $menufoods=DB::table('menufoods')
        ->join('typetravels','menufoods.typetravel_id','typetravels.typetravel_id')
        ->select('menufoods.*','typetravels.typetravel_name')->get();
        return view('admin.package.create',compact('packages','typetravels','acttravels','menufoods'));
    }

    public function store(Request $request){
        //ตรวจสอบข้อมูล
        $request->validate(
            [
                // 'package_name'=>'required|unique:packages|max:255',
                // 'package_img'=>'required|mimes:jpg,jpeg,png',
            ],
            [
                // 'package_name.required'=>"กรุณาป้อนชื่อแพ็คเกจ",
                // 'package_name.max' => "ห้ามป้อนตัวอักษรเกิน 255 ตัวอักษร",
                // 'package_name.unique'=>"มีข้อมูลชื่อนี้ในฐานข้อมูลแล้ว",

                // 'food_type.required'=>"กรุณาป้อนรูปแบบ",
                // 'food_list.required'=>"กรุณาป้อนรายการอาหาร",
                // 'food_note.required'=>"กรุณาป้อนหมายเหตุ",
            ]

        );
        //การเข้ารหัสรูปภาพ  
        $package_img = $request->file('package_img');

        //Generate ชื่อภาพ
        $name_gen=hexdec(uniqid());

        // ดึงนามสกุลไฟล์ภาพ
        $img_ext = strtolower($package_img->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;

        //อัพโหลดและบันทึกข้อมูล
        $upload_location = 'image/package/';
        $full_path = $upload_location.$img_name;

        Package::insert([
            'typetravel_id'=>$request->typetravel_id,
            'acttravel_id'=>$request->acttravel_id,
            'food_id'=>$request->food_id,
            'package_name'=>$request->package_name,
            'package_detail'=>$request->package_detail,
            'package_highlight'=>$request->package_highlight,
            'package_note'=>$request->package_note,
            'package_price'=>$request->package_price,
            'package_img'=>$full_path,
            'created_at'=>Carbon::now()
        ]);
        $package_img->move($upload_location,$img_name);
        return redirect()->route('package')->with('success', 'ข้อมูลแพ็คเกจได้รับการบันทึกเรียบร้อยแล้ว');

    }

// ----------------------------------------------------------------------------------------------------    
// ----------------------------------------------------------------------------------------------------   

    //หน้าแก้ไขข้อมูล
    public function edit($package_id){
        $package = Package::find($package_id);
        $typetravels = Typetravel::all();
        $acttravels = Acttravel::all();
        $menufoods = Menufood::all();
        return view('admin.package.edit',compact('package','typetravels','acttravels','menufoods'));
    }

    //แก้ไขข้อมูล
    public function update(Request $request , $package_id){
        //ตรวจสอบข้อมูล
        $request->validate([
            [

            ],
            [

            ]
        ]);
        $package_img = $request->file('package_img');

        //อัพเดทภาพและข้อมูลอื่นๆ
        if($package_img){

            //Generate ชื่อภาพ
            $name_gen=hexdec(uniqid());

            // ดึงนามสกุลไฟล์ภาพ
            $img_ext = strtolower($package_img->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;

            //อัพโหลดและอัพเดทข้อมูล
            $upload_location = 'image/package/';
            $full_path = $upload_location.$img_name;

            //อัพเดทข้อมูล
            Package::find($package_id)->update([
                'typetravel_id'=>$request->typetravel_id,
                'acttravel_id'=>$request->acttravel_id,
                'food_id'=>$request->food_id,
                'package_name'=>$request->package_name,
                'package_detail'=>$request->package_detail,
                'package_highlight'=>$request->package_highlight,
                'package_note'=>$request->package_note,
                'package_price'=>$request->package_price,
                'package_img'=>$full_path,
            ]);

            //ลบภาพเก่าและอัพภาพใหม่แทนที่
            $old_image = $request->old_image;
            unlink($old_image);
            $package_img->move($upload_location,$img_name);

            return redirect()->route('package')->with('success', 'อัพเดทภาพและข้อมูลเรียบร้อยแล้ว');

        }else{
            //อัพเดทข้อมูลอย่างเดียว
            Package::find($package_id)->update([
                'typetravel_id'=>$request->typetravel_id,
                'acttravel_id'=>$request->acttravel_id,
                'food_id'=>$request->food_id,
                'package_name'=>$request->package_name,
                'package_detail'=>$request->package_detail,
                'package_highlight'=>$request->package_highlight,
                'package_note'=>$request->package_note,
                'package_price'=>$request->package_price,

            ]);
            return redirect()->route('package')->with('success', 'อัพเดทข้อมูลเรียบร้อยแล้ว');
        } 
    }

    //ลบข้อมูล
    public function destroy($package_id){
        // ลบภาพ
        $img = Package::find($package_id)->package_img;
        unlink($img);
        
        //ลบข้อมูลจากฐานข้อมูล
        $delete=Package::find($package_id)->delete();
       
        return redirect()->route('package')->with('success', 'ลบข้อมูลเรียบร้อยแล้ว');
    }
}
