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

/* .item4 { 
    grid-area: right; 
    height: auto;
    padding-left: 20px;
    font-size: 16px;
} */

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
        <i class="fa-solid fa-reply" onclick="location='{{ route('user.index') }}'"> ย้อนกลับ</i>
        <center><p class="top1">เพิ่มข้อมูลลูกค้า</p></center>     
    </div>
    
    <div class="item3">

        @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

        <form action="{{ route('user.update', $user->user_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

        <div class="w3-row">
          <div class="w3-half">
            <label for="name">ชื่อจริง</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" placeholder="ชื่อจริง...">
          </div>
          <div class="w3-half">
            <label for="lname">นามสกุล</label>
            <input type="text" id="lname" name="lname" value="{{ $user->lname }}" placeholder="นามสกุล...">
          </div>
        </div>

        <div class="w3-row">
          <div class="w3-half">
            <label for="gender">เพศ</label>
                <select id="gender" name="gender" value="{{ $user->gender }}" class="gender">
                    <option value="male">ชาย</option>
                    <option value="female">หญิง</option>
                </select>
          </div>
          <div class="w3-half">
            <label for="birthday">วัน/เดือน/ปีเกิด</label>
            <input type="date" id="birthday" name="birthday" value="{{ $user->birthday }}">
          </div>

          <div class="w3-row">
            <div class="w3-half">
                <label for="tel">เบอโทรศัพท์</label>
                <input type="text" id="tel" name="tel" value="{{ $user->tel }}" class="form-control" placeholder="เบอโทรศัพท์...">
            </div>
            <div class="w3-half">
                <label for="address">ที่อยู่</label>
                <input type="text" id="address" name="address" value="{{ $user->address }}" placeholder="ที่อยู่...">
            </div>

          <div class="w3-row">
            <div class="w3-half">
              <label for="email">อีเมล</label>
              <input type="text" id="email" name="email" value="{{ $user->email }}" placeholder="อีเมล...">
            </div>
            <div class="w3-half">
              <label for="password">รหัสผ่าน</label>
              <input type="password" id="password" name="password" {{-- value="{{ $user->password }}" --}} placeholder="รหัสผ่าน...">
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