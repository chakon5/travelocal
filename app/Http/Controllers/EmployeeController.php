<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    //หน้าแสดงข้อมูล
    public function index(){
        $employees=Employee::paginate(5);
        return view('admin.employee.index',compact('employees'));
    }

    //หน้าเพิ่มข้อมูล
    public function create() {
        return view('admin.employee.create');
    }

    public function store(Request $request){
        //ตรวจสอบข้อมูล
        $request->validate(
            [
                'employee_name'=>'required|unique:employees|max:255',
                'employee_img'=>'required|mimes:jpg,jpeg,png',
                'employee_lname'=>'required',
                'employee_gender'=>'required',
                'employee_birthday'=>'required',
                'employee_tel'=>'required',
                'employee_address'=>'required',
                'email'=>'required',
                'password'=>'required',
            ],
            [
                'employee_name.required'=>"กรุณาป้อนชื่อพนักงาน",
                'employee_name.max' => "ห้ามป้อนตัวอักษรเกิน 255 ตัวอักษร",
                'employee_name.unique'=>"มีข้อมูลชื่อนี้ในฐานข้อมูลแล้ว",

                'employee_img.required'=>"กรุณาใส่รูปภาพด้วยครับ",
                'employee_lname.required'=>"กรุณาป้อนนามสกุล",
                'employee_gender.required'=>"กรุณาเลือกเพศ",
                'employee_birthday.required'=>"กรุณาเลือกวัน/เดือน/ปีเกิด",
                'employee_tel.required'=>"กรุณาป้อนเบอร์โทรศัพท์ที่ติดต่อได้",
                'employee_address.required'=>"กรุณาที่อยู่ปัจจุบัน",
                'email.required'=>"กรุณาป้อนอีเมลล์",
                'password.required'=>"กรุณาป้อนรหัสผ่าน",
            ]
        );
        //การเข้ารหัสรูปภาพ  
        $employee_img = $request->file('employee_img');

        //Generate ชื่อภาพ
        $name_gen=hexdec(uniqid());

        // ดึงนามสกุลไฟล์ภาพ
        $img_ext = strtolower($employee_img->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;

        //อัพโหลดและบันทึกข้อมูล
        $upload_location = 'image/employee/';
        $full_path = $upload_location.$img_name;

        Employee::insert([
            'employee_name'=>$request->employee_name,
            'employee_lname'=>$request->employee_lname,
            'employee_gender'=>$request->employee_gender,
            'employee_birthday'=>$request->employee_birthday,
            'employee_tel'=>$request->employee_tel,
            'employee_address'=>$request->employee_address,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'employee_img'=>$full_path,

        ]);
        $employee_img->move($upload_location,$img_name);
        return redirect()->route('employee')->with('success', 'ข้อมูลพนักงานได้รับการบันทึกเรียบร้อยแล้ว');

    }

// ----------------------------------------------------------------------------------------------------    
// ----------------------------------------------------------------------------------------------------   

    //หน้าแก้ไขข้อมูล
    public function edit($employee_id){
        $employee = Employee::find($employee_id);
        // $typetravels = Typetravel::all();
        return view('admin.employee.edit',compact('employee'));
    }

    //แก้ไขข้อมูล
    public function update(Request $request , $employee_id){
        //ตรวจสอบข้อมูล
        $request->validate([
            [

            ],
            [

            ]
        ]);
        $employee_img = $request->file('employee_img');

        //อัพเดทภาพและข้อมูลอื่นๆ
        if($employee_img){

            //Generate ชื่อภาพ
            $name_gen=hexdec(uniqid());

            // ดึงนามสกุลไฟล์ภาพ
            $img_ext = strtolower($employee_img->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;

            //อัพโหลดและอัพเดทข้อมูล
            $upload_location = 'image/employee/';
            $full_path = $upload_location.$img_name;

            //อัพเดทข้อมูล
            Employee::find($employee_id)->update([
                'employee_name'=>$request->employee_name,
                'employee_lname'=>$request->employee_lname,
                'employee_gender'=>$request->employee_gender,
                'employee_birthday'=>$request->employee_birthday,
                'employee_tel'=>$request->employee_tel,
                'employee_address'=>$request->employee_address,
                'employee_img'=>$full_path,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),

            ]);

            //ลบภาพเก่าและอัพภาพใหม่แทนที่
            $old_image = $request->old_image;
            unlink($old_image);
            $employee_img->move($upload_location,$img_name);

            return redirect()->route('employee')->with('success', 'อัพเดทภาพและข้อมูลเรียบร้อยแล้ว');

        }else{
            //อัพเดทข้อมูลอย่างเดียว
            Employee::find($employee_id)->update([
                'employee_name'=>$request->employee_name,
                'employee_lname'=>$request->employee_lname,
                'employee_gender'=>$request->employee_gender,
                'employee_birthday'=>$request->employee_birthday,
                'employee_tel'=>$request->employee_tel,
                'employee_address'=>$request->employee_address,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),

            ]);
            return redirect()->route('employee')->with('success', 'อัพเดทข้อมูลเรียบร้อยแล้ว');
        } 
    }

    //ลบข้อมูล
    public function destroy($employee_id){
        // ลบภาพ
        $img = Employee::find($employee_id)->employee_img;
        unlink($img);
        
        //ลบข้อมูลจากฐานข้อมูล
        $delete=Employee::find($employee_id)->delete();
       
        return redirect()->route('employee')->with('success', 'ลบข้อมูลเรียบร้อยแล้ว');
    }

}
