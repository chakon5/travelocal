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

</style>
@section('content')

<div class="grid-container">
    <div class="item1">
        <i class="fa-solid fa-reply" onclick="location='{{ route('guide') }}'"> ย้อนกลับ</i>
        <center><p class="top1">แก้ไขข้อมูลไกด์</p></center>     
    </div>
    
    <div class="item3">
            @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
            @endif

        <form action="{{url('/guide/update/'.$guide->guide_id)}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col">
                <label for="guide_name">ชื่อจริง</label>
                <input type="text" name="guide_name" value="{{$guide->guide_name}}">
            </div>
            <div class="col">
                <label for="guide_lname">นามสกุล</label>
                <input type="text" name="guide_lname" value="{{$guide->guide_lname}}">
            </div>
        @error('guide_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('guide_lname')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="row">
            <div class="col">
                <label for="guide_gender">เพศ</label>
                <select name="guide_gender" class="select">
                    <option value="ชาย" @if($guide->guide_gender == 'ชาย')
                        selected
                    @endif>ชาย</option>
    
                    <option value="หญิง" @if($guide->guide_gender == 'หญิง')
                        selected
                    @endif>หญิง</option>
                </select>
            </div>
            <div class="col">
                <label for="guide_birthday">วัน/เดือน/ปีเกิด</label>
                <input type="date" name="guide_birthday" value="{{ $guide->guide_birthday }}">
            </div>
        @error('guide_gender')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('guide_birthday')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="row">
            <div class="col">
                <label for="guide_tel">เบอโทรศัพท์</label>
                <input type="text" name="guide_tel" value="{{ $guide->guide_tel }}">
            </div>
            <div class="col">
                <label for="guide_address">ที่อยู่</label>
                <input type="text" name="guide_address" value="{{ $guide->guide_address }}">
            </div>
        @error('guide_tel')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('guide_address')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="row">
            <div class="col">
                <label for="guide_price">ราคา</label>
                <input type="number" name="guide_price" value="{{ $guide->guide_price }}">
            </div>
            <div class="col">
            </div>
        @error('guide_price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>


        <div class="row">
            <div class="col">
                <label for="guide_img" class="label">รูปภาพไกด์</label>
                <input type="file" class="form-control" name="guide_img">
            </div>
        @error('guide_img')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>   

    <input type="submit" value="Submit">
    </form>
          
    </div> 
    
</div> 

@endsection