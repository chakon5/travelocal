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

input[type=password], select {
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

.activity_type {
  width: 450px;
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
        <i class="fa-solid fa-reply" onclick="location='{{ route('activity.index') }}'"> ย้อนกลับ</i>
        <center><p class="top1">เพิ่มข้อมูลกิจกรรมเสริม</p></center>     
    </div>
    
    <div class="item3">

        <div class="container-z">
            @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
             @endif

             <form action="{{ route('activity.update', $activity->activity_id) }}" method="POST" enctype="multipart/form-data">
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
            <label for="activity_name">ชื่อกิจกรรมเสริม</label>
            <input type="text" id="activity_name" name="activity_name" value="{{ $activity->activity_name }}" placeholder="ชื่อกิจกรรมเสริม...">
          </div>
            <div class="w3-half">
              <label for="activity_price">ราคา</label>
              <input type="text" id="activity_price" name="activity_price" value="{{ $activity->activity_price }}" placeholder="ราคา...">
            </div>
        </div>


          <div class="w3-row">
            <div class="w3-half">
                <label for="activity_detail">รายละเอียด</label>
                <textarea type="text" id="activity_detail" name="activity_detail" placeholder="รายละเอียด...">{{ $activity->activity_detail }}</textarea>
            </div>
            </div>

            <div class="w3-row">
              <div class="w3-half">
                <label for="activity_note">หมายเหตุ</label>
                <textarea type="text" id="activity_note" name="activity_note" placeholder="หมายเหตุ...">{{ $activity->activity_note }}</textarea>
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