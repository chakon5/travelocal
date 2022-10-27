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

.gender {
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
        <i class="fa-solid fa-reply" onclick="location='{{ url('/customerdb') }}'"> ย้อนกลับ</i>
        <center><p class="top1">เพิ่มข้อมูลกิจกรรมการเที่ยว</p></center>     
    </div>

    <div class="item3">
        {{-- <form action="{{ route('/customerdb') }}" method="POST" enctype="multipart/form-data"> --}}
       <form method="POST" action="{{ url('/customerdb') }}">

        <div class="w3-row">
          <div class="w3-half">
            <label for="name">Select ประเภทมา</label>
            <select id="gender" name="gender" class="gender">
              <option value="male">ประเภท1</option>
              <option value="female">ประเภท2</option>
          </select>
          </div>
          
        </div>

        <div class="w3-row">
          <div class="w3-half">
            <label for="gender">ชื่อกิจกรรมการเที่ยว</label>
            <input type="text" id="tel" name="tel" placeholder="ชื่อกิจกรรมการเที่ยว...">
          </div>
          </div>

          <div class="w3-row">
            <div class="w3-half">
                <label for="tel">รายละเอียด</label>
                <input type="text" id="tel" name="tel" placeholder="รายละเอียด...">
            </div>
            </div>

          <div class="w3-row">
            <div class="w3-half">
              <label for="email">รูปแบบ</label>
              <select id="gender" name="gender" class="gender">
                <option value="male">Halfday</option>
                <option value="female">Allday</option>
              </select>
            </div>
            <div class="w3-half">
              <label for="tel">ราคา</label>
              <input type="text" id="tel" name="tel" placeholder="ราคา...">
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