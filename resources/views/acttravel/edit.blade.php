@extends('layouts.appadmin')

<head>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<style>

.item1 { 
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
  padding-left: 10px;
  padding-left: 80px;
  padding-right: 80px;
  margin-left: 250px;
}

.top1 {
  border-radius: 90px;
  text-align: left;
  font-size: 20px;
  width: 80%;
  height: 50px;
  color: white;
  background-color: #3C8085;
  padding: 10px;
  margin-top: 0px;
}

.fa-reply {
    font-size: 15px;
    padding: 10px;
}

.grid-container > div {
  /* background-color: rgba(255, 255, 255, 0.8); */
  text-align: left;
}

.item3 { 
    grid-area: main;
    height: auto;
    padding-left: 70px;
    font-size: 16px;
}

input[type=text], select {
  width: 450px;
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

input , textarea {
  width: 980px;
  padding-bottom: 50px;
  padding-left: 12px;
  padding-top: 12px;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}


input[type=password], select {
  width: 450px;
  padding: 12px 20px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.at_type {
  width: 450px;
  padding: 12px 20px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100px;
  background-color: #04AA6D;
  color: white;
  padding: 14px 14px;
  margin: 20px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div.container-1 {
  border-radius: 5px;
  font-size: 16px;
}

/* .card {
  width: 200px;
  font-size: 16px;
} */

</style>
@section('content')

<div class="grid-container">
    <div class="item1">
        <i class="fa-solid fa-reply" onclick="location='{{ route('acttravel.index') }}'"> ย้อนกลับ</i>
        <center><p class="top1">แก้ไขข้อมูลกิจกรรมการเที่ยว</p></center>     
    </div>
    
    <div class="item3">

        <div class="container-z">
            @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
             @endif

             <form action="{{ route('acttravel.update', $acttravel->at_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

        {{-- <div class="w3-row">
          <div class="w3-half">
            <label for="at_type">Select ประเภทมา</label>
            <select id="at_type" name="at_type" class="at_type">
              <option value="type1">ประเภท1</option>
              <option value="type2">ประเภท2</option>
          </select>
          </div>
        </div> --}}

        <div class="w3-row">
          <div class="w3-half">
            <label for="at_name">ชื่อกิจกรรมการเที่ยว</label>
            <input type="text" id="at_name" name="at_name" value="{{ $acttravel->at_name }}" placeholder="ชื่อกิจกรรมการเที่ยว...">
          </div>
          <div class="w3-half">
            <label for="at_type">รูปแบบ</label>
            <select id="at_type" name="at_type" value="{{ $acttravel->at_type }}" class="at_type">
              <option value="Halfday">Halfday</option>
              <option value="Allday">Allday</option>
            </select>
          </div>
          </div>

          <div class="w3-row">
            <div class="w3-half">
                <label for="at_detail">รายละเอียด</label>
                <textarea type="text" id="at_detail" name="at_detail" placeholder="รายละเอียด...">{{ $acttravel->at_detail }}</textarea>
            </div>
            </div>

          <div class="w3-row">
            <div class="w3-half">
              <label for="at_note">หมายเหตุ</label>
              <textarea type="text" id="at_note" name="at_note" placeholder="หมายเหตุ...">{{ $acttravel->at_note }}</textarea>
            </div>
          </div>

            <input type="submit" value="Submit">
          </form>
          
    </div>  
    </div> 

        {{-- <label for="picture">รูปภาพ</label>
        <div class="card">
            <img src="{{asset('/img/img_avatar.png')}}" alt="Avatar"></div>
            <input type="file" id="picture" name="filename"><BR> --}}
    
</div> 

@endsection