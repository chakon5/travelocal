<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typetravel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class TypetravelController extends Controller
{
    //หน้าแสดงข้อมูล
    public function index(){
        $typetravels=DB::table('typetravels')
        ->join('users','typetravels.user_id','users.user_id')
        ->select('typetravels.*','users.name')->paginate(5);
        // $typetravels=Typetravel::paginate(5);
        return view('admin.typetravel.index',compact('typetravels'));
    }

    // Create resource
    public function create() {
        return view('admin.typetravel.create');
    }

    public function store(Request $request){
        //ตรวจสอบข้อมูล
        $request->validate(
            [
                'typetravel_name'=>'required|unique:typetravels|max:255',
                'typetravel_detail'=>'required',
                'typetravel_address'=>'required',
            ],
            [
                'typetravel_name.required'=>"กรุณาป้อนชื่อประเภทการท่องเที่ยว",
                'typetravel_name.max' => "ห้ามป้อนข้อมูลเกิน 255 ตัวอักษร",
                'typetravel_name.unique'=>"มีข้อมูลชื่อนี้ในฐานข้อมูลแล้ว",

                'typetravel_detail.required'=>"กรุณาป้อนข้อมูลรายละเอียด",
                'typetravel_address.required'=>"กรุณาป้อนข้อมูลแหล่งที่ตั้ง",
            ]

        );
        //บันทึกข้อมูล
        $typetravel = new Typetravel;
        $typetravel->user_id = Auth::user()->user_id;
        $typetravel->typetravel_name = $request->typetravel_name;
        $typetravel->typetravel_address = $request->typetravel_address;
        $typetravel->typetravel_detail = $request->typetravel_detail;

        $typetravel->save();
        return redirect()->route('typetravel')->with('success', 'ข้อมูลประเภทการท่องเที่ยวได้รับการบันทึกเรียบร้อยแล้ว');
    }

    public function edit($typetravel_id){
        $typetravel = Typetravel::find($typetravel_id);
        return view('admin.typetravel.edit',compact('typetravel'));
    }

    
    public function update(Request $request , $typetravel_id){
        //ตรวจสอบข้อมูล
        $request->validate(
            [
                'typetravel_name'=>'required|max:255',
                'typetravel_detail'=>'required',
                'typetravel_address'=>'required',
            ],
            [
                'typetravel_name.required'=>"กรุณาป้อนชื่อประเภทการท่องเที่ยว",
                'typetravel_name.max' => "ห้ามป้อนข้อมูลเกิน 255 ตัวอักษร",

                'typetravel_detail.required'=>"กรุณาป้อนข้อมูลรายละเอียด",
                'typetravel_address.required'=>"กรุณาป้อนข้อมูลแหล่งที่ตั้ง",
            ]
        );
        $update = Typetravel::find($typetravel_id)->update([
            'user_id'=>Auth::user()->user_id,
            'typetravel_name'=>$request->typetravel_name,
            'typetravel_address'=>$request->typetravel_address,
            'typetravel_detail'=>$request->typetravel_detail,
        ]);

        return redirect()->route('typetravel')->with('success', 'ข้อมูลประเภทการท่องเที่ยวได้รับการอัพเดทเรียบร้อยแล้ว');
    }

    public function destroy($typetravel_id){
        $delete = Typetravel::find($typetravel_id)->delete();
        return redirect()->route('typetravel')->with('success', 'ลบข้อมูลประเภทการท่องเที่ยวเรียบร้อยแล้ว');
    }
}
