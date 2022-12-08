<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acttravel;
use App\Models\Typetravel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ActtravelController extends Controller
{
    //หน้าแสดงข้อมูล
    public function index(){
        $acttravels=DB::table('acttravels')
        ->join('typetravels','acttravels.typetravel_id','typetravels.typetravel_id')
        ->select('acttravels.*','typetravels.typetravel_name')->paginate(5);
        // $acttravels=Acttravel::paginate(5);
        return view('admin.acttravel.index',compact('acttravels'));
    }

    //หน้าเพิ่มข้อมูล
    public function create() {
        $typetravels = Typetravel::all();
        return view('admin.acttravel.create',compact('typetravels'));
    }

    public function store(Request $request){
        //ตรวจสอบข้อมูล
        $request->validate(
            [
                'acttravel_name'=>'required|unique:acttravels|max:255',
                'acttravel_type'=>'required',
                'acttravel_list'=>'required',
                'acttravel_note'=>'required',
            ],
            [
                'acttravel_name.required'=>"กรุณาป้อนชื่อกิจกรรมการเที่ยว",
                'acttravel_name.max' => "ห้ามป้อนข้อมูลเกิน 255 ตัวอักษร",
                'acttravel_name.unique'=>"มีข้อมูลชื่อนี้ในฐานข้อมูลแล้ว",

                'acttravel_type.required'=>"กรุณาเลือกรูปแบบกิจกรรมการเที่ยว",
                'acttravel_list.required'=>"กรุณาป้อนรายการกิจกรรมการเที่ยว",
                'acttravel_note.required'=>"ป้อนหมายเหตุเพิ่มเติม",
            ]

        );
        //บันทึกข้อมูล
        $acttravel = new Acttravel;
        $acttravel->typetravel_id = $request->typetravel_id;
        $acttravel->acttravel_name = $request->acttravel_name;
        $acttravel->acttravel_type = $request->acttravel_type;
        $acttravel->acttravel_list = $request->acttravel_list;
        $acttravel->acttravel_note = $request->acttravel_note;

        $acttravel->save();
        return redirect()->route('acttravel')->with('success', 'ข้อมูลกิจกรรมการเที่ยวได้รับการบันทึกเรียบร้อยแล้ว');

    }

    //หน้าแก้ไขข้อมูล
    public function edit($acttravel_id){
        $acttravel = Acttravel::find($acttravel_id);
        $typetravels = Typetravel::all();
        return view('admin.acttravel.edit',compact('acttravel','typetravels'));
    }

    public function update(Request $request , $acttravel_id){
        //ตรวจสอบข้อมูล
        $request->validate(
            [
                'acttravel_name'=>'required|max:255',
                'acttravel_type'=>'required',
                'acttravel_list'=>'required',
                'acttravel_note'=>'required',
            ],
            [
                'acttravel_name.required'=>"กรุณาป้อนชื่อกิจกรรมการเที่ยว",
                'acttravel_name.max' => "ห้ามป้อนข้อมูลเกิน 255 ตัวอักษร",

                'acttravel_type.required'=>"กรุณาเลือกรูปแบบกิจกรรมการเที่ยว",
                'acttravel_list.required'=>"กรุณาป้อนรายการกิจกรรมการเที่ยว",
                'acttravel_note.required'=>"ป้อนหมายเหตุเพิ่มเติม",
            ]

        );
        $update = Acttravel::find($acttravel_id)->update([
            'typetravel_id'=>$request->typetravel_id,
            'acttravel_name'=>$request->acttravel_name,
            'acttravel_type'=>$request->acttravel_type,
            'acttravel_list'=>$request->acttravel_list,
            'acttravel_note'=>$request->acttravel_note
        ]);

        return redirect()->route('acttravel')->with('success', 'ข้อมูลกิจกรรมการเที่ยวได้รับการอัพเดทเรียบร้อยแล้ว');
    }

    //ลบข้อมูล
    public function destroy($acttravel_id){
        $delete = Acttravel::find($acttravel_id)->delete();
        return redirect()->route('acttravel')->with('success', 'ลบข้อมูลกิจกรรมการเที่ยวเรียบร้อยแล้ว');
    }

}