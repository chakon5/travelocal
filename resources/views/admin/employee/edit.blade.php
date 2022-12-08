@extends('layouts.appadmin')

<head>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<style>
.item1 { 
    /* background: #04AA6D; */
    grid-area: header;
    margin: 0;
    padding: 0;
    height: 100px;

}

.grid-container {
    display: grid;
    grid-template-areas:
        'header header header header header header'
        'main main main main main main';
    gap: 10px;
    /* background-color: #2196F3; */

    padding-left: 80px;
    padding-right: 80px;
    margin-left: 250px;
}

.top1 {
    border-radius: 90px;
    text-align: left;
    font-size: 20px;
    width: 90%;
    height: 50px;
    color: white;
    background-color: #3C8085;
    padding: 10px;
    margin-top: 0px;
}

.fa-reply {
    font-size: 15px;
    padding: 10px;
    margin-left: 50px;
}

.item3 { 
    /* background: #45a049; */
    grid-area: main;
    height: auto;
    margin-left: 70px;
    margin-right: 70px;
    font-size: 16px;
}

/* แจ้งเตือนกรอกข้อความ */
.alert-danger {
    width: auto;
}

/* ฟอร์มใส่ข้อมูล */
input[type=text], select {
    width: 100%;
    padding: 12px;
    display: block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin: 8px 0;
}

input[type=date], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=number], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=password], select {
    width: 100%;
    padding: 12px 20px;
    display: block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin: 8px 0;
}

input, textarea {
    width: 100%;
    padding-bottom: 50px;
    padding-left: 12px;
    padding-top: 12px;
    display: block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.textarea-1{
    margin: 8px 0;
}

input[type=submit] {
    width: 100px;
    background-color: #04AA6D;
    color: white;
    padding: 10px 10px;
    margin: 10px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.imgshow{
    padding-top: 10px;
}

</style>
@section('content')

<div class="grid-container">
    <div class="item1">
        <i class="fa-solid fa-reply" onclick="location='{{ route('employee') }}'"> ย้อนกลับ</i>
        <center><p class="top1">แก้ไขข้อมูลพนักงาน</p></center>     
    </div>
    
    <div class="item3">
            @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
            @endif

    <form action="{{url('/employee/update/'.$employee->employee_id)}}" method="POST" enctype="multipart/form-data">
    @csrf

        <div class="row">
            <div class="col">
                <label for="employee_name">ชื่อจริง</label>
                <input type="text" name="employee_name" value="{{$employee->employee_name}}">
            </div>
            <div class="col">
                <label for="employee_lname">นามสกุล</label>
                <input type="text" name="employee_lname" value="{{$employee->employee_lname}}">
            </div>
        @error('employee_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('employee_lname')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="row">
            <div class="col">
                <label for="employee_gender">เพศ</label>
                <select name="employee_gender" class="select">

                    <option value="ชาย" @if($employee->employee_gender == 'ชาย')
                        selected
                    @endif>ชาย</option>
    
                    <option value="หญิง" @if($employee->employee_gender == 'หญิง')
                        selected
                    @endif>หญิง</option>
                    
                </select>
            </div>
            <div class="col">
                <label for="employee_birthday">วัน/เดือน/ปีเกิด</label>
                <input type="date" name="employee_birthday" value="{{ $employee->employee_birthday }}">
            </div>
        @error('employee_gender')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('employee_birthday')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="row">
            <div class="col">
                <label for="employee_tel">เบอโทรศัพท์</label>
                <input type="text" name="employee_tel" value="{{ $employee->employee_tel }}">
            </div>
            <div class="col">
                <label for="employee_address">ที่อยู่</label>
                <input type="text" name="employee_address" value="{{ $employee->employee_address }}">
            </div>
        @error('employee_tel')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('employee_address')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="row">
            <div class="col">
                <label for="email">อีเมลล์</label>
                <input type="text" name="email" value="{{ $employee->email }}">
            </div>
            <div class="col">
                <label for="password">รหัสผ่าน</label>
                <input type="password" name="password" value="{{ $employee->password }}">
            </div>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="row">
            <div class="col">
                <label for="employee_img" class="label">รูปภาพพนักงาน</label>
                <input type="file" class="form-control" name="employee_img" value="{{$employee->employee_img}}">
            </div>
        @error('employee_img')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="row">
            <input type="hidden" name="old_image" value="{{$employee->employee_img}}">
            <div class="col imgshow">
                <img src="{{asset($employee->employee_img)}}" alt="" width="300px" height="auto">
            </div>
        </div>

    <input type="submit" value="อัพเดท">
    </form>
          
    </div> 
    
</div> 

@endsection