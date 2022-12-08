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
    width: 450px;
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
    width: 450px;
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
        <i class="fa-solid fa-reply" onclick="location='{{ route('acttravel') }}'"> ย้อนกลับ</i>
        <center><p class="top1">แก้ไขข้อมูลกิจกรรมการเที่ยว</p></center>     
    </div>
    
    <div class="item3">
            @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
            @endif

    <form action="{{url('/acttravel/update/'.$acttravel->acttravel_id)}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col">
            <label for="typetravel_id">ประเภทการท่องเที่ยว</label>
            <select name="typetravel_id" class="select">
                {{-- <option value={{ $type_travels->typetv_id }} selected>{{ $type_travels->typetv_name }}</option> --}}
                <option value="" selected></option>
                @foreach($typetravels as $row)     
                    <option value={{ $row->typetravel_id }}
                    @if($row->typetravel_id == $acttravel->typetravel_id)
                        selected
                    @endif>
                    {{ $row->typetravel_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col">
        </div>
    </div>    


        <div class="row">
            <div class="col">
                <label for="acttravel_name">ชื่อกิจกรรมการเที่ยว</label>
                <input type="text" name="acttravel_name" value="{{$acttravel->acttravel_name}}">
            </div>
            <div class="col">
                <label for="acttravel_type">รูปแบบ</label>
                <select name="acttravel_type" class="select">
                    <option value="half day" @if($acttravel->acttravel_type == 'half day')
                        selected
                    @endif>half day</option>

                    <option value="all day" @if($acttravel->acttravel_type == 'all day')
                        selected
                    @endif>all day</option>
                </select>
            </div>
        @error('acttravel_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('acttravel_type')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="row">
            <div class="col">
                <label for="acttravel_list">รายการกิจกรรมการเที่ยว</label>
                <textarea class="textarea-1" type="text" name="acttravel_list">{{$acttravel->acttravel_list}}</textarea>
            </div>
        @error('acttravel_list')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

                
        <div class="row">
            <div class="col">
                <label for="acttravel_note">หมายเหตุ</label>
                <input type="text" name="acttravel_note" value="{{$acttravel->acttravel_note}}">
            </div>
        @error('acttravel_note')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>    

    <input type="submit" value="Submit">
    </form>
          
    </div> 
    
</div> 

@endsection