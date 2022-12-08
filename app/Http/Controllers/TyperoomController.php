<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typeroom;
use App\Models\Typetravel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TyperoomController extends Controller
{
    //หน้าแสดงข้อมูล
    public function index(){
        $typerooms=DB::table('typerooms')
        ->join('users','typerooms.user_id','users.user_id')
        ->join('typetravels','typerooms.typetravel_id','typetravels.typetravel_id')
        ->select('typerooms.*','users.name','typetravels.typetravel_name')->paginate(6);
        // $typerooms=Typeroom::paginate(5);

        // $sum=0;
        // $i++;
        // $typeroom_capacity;
        
        return view('admin.typeroom.index',compact('typerooms'));
    }

    //หน้าเพิ่มข้อมูล
    public function create() {
        $typetravels = Typetravel::all();
        return view('admin.typeroom.create',compact('typetravels'));
    }

    public function store(Request $request){
        //ตรวจสอบข้อมูล
        $request->validate(
            [
                'typeroom_name'=>'required|unique:typerooms|max:255',
                'typeroom_capacity'=>'required',
                'typeroom_detail'=>'required',
            ],
            [
                'typeroom_name.required'=>"กรุณาป้อนชื่อประเภทห้องพัก",
                'typeroom_name.max' => "ห้ามป้อนข้อมูลเกิน 255 ตัวอักษร",
                'typeroom_name.unique'=>"มีข้อมูลชื่อนี้ในฐานข้อมูลแล้ว",

                'typeroom_capacity.required'=>"กรุณาเลือกความจุที่ต้องการ",
                'typeroom_detail.required'=>"กรุณาป้อนข้อมูลรายละเอียด",
            ]

        );
        //บันทึกข้อมูล
        $typeroom = new Typeroom;
        $typeroom->typeroom_name = $request->typeroom_name;
        $typeroom->typeroom_detail = $request->typeroom_detail;
        $typeroom->typeroom_capacity = $request->typeroom_capacity;
        $typeroom->user_id = Auth::user()->user_id;
        $typeroom->typetravel_id = $request->typetravel_id;

        $typeroom->save();
        return redirect()->route('typeroom')->with('success', 'ข้อมูลประเภทห้องพักได้รับการบันทึกเรียบร้อยแล้ว');

    }

    public function edit($typeroom_id){
        $typeroom = Typeroom::find($typeroom_id);
        $typetravels = Typetravel::all();
        return view('admin.typeroom.edit',compact('typeroom','typetravels'));
    }

    public function update(Request $request , $typeroom_id){
        //ตรวจสอบข้อมูล
        $request->validate(
            [
                'typeroom_name'=>'required|max:255',
                'typeroom_capacity'=>'required',
                'typeroom_detail'=>'required',
            ],
            [
                'typeroom_name.required'=>"กรุณาป้อนชื่อประเภทห้องพัก",
                'typeroom_name.max' => "ห้ามป้อนข้อมูลเกิน 255 ตัวอักษร",

                'typeroom_capacity.required'=>"กรุณาเลือกความจุที่ต้องการ",
                'typeroom_detail.required'=>"กรุณาป้อนข้อมูลรายละเอียด",
            ]

        );
        $update = Typeroom::find($typeroom_id)->update([
            'typeroom_name'=>$request->typeroom_name,
            'typeroom_detail'=>$request->typeroom_detail,
            'typeroom_capacity'=>$request->typeroom_capacity,
            'user_id'=>Auth::user()->user_id,
            'typetravel_id'=>$request->typetravel_id
        ]);

        return redirect()->route('typeroom')->with('success', 'ข้อมูลประเภทห้องพักได้รับการอัพเดทเรียบร้อยแล้ว');
    }

    public function destroy($typeroom_id){
        $delete = Typeroom::find($typeroom_id)->delete();
        return redirect()->route('typeroom')->with('success', 'ลบข้อมูลประเภทห้องพักเรียบร้อยแล้ว');
    }
}
