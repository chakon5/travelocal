@extends('layouts.appadmin')

<head>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">

  <link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">
  
  <style>
  
  @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);
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

.button {
    background-color: #04AA6D;
    border: none;
    color: white;
    width: 180;
    height: 40px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 5px 65px;
    cursor: pointer;
}

.button3 {border-radius: 90px;}

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
    margin: 10px 80px;
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

/* --------------------------------------------------------------- */
/* --------------------------------------------------------------- */

.section {
	position: relative;
	height: 100vh;
}

.section .section-center {
	position: absolute;
	top: 50%;
	left: 0;
	right: 0;
	-webkit-transform: translateY(-50%);
	transform: translateY(-50%);
}

#booking {
	font-family: 'Montserrat', sans-serif;
	background-image: url('../img/background.jpg');
	background-size: cover;
	background-position: center;
	font-weight: 300;
}

.booking-form {
	background: #fff;
	padding: 30px 15px 0px;
	border-radius: 4px;
	overflow: auto;
}

.booking-form .form-group {
	position: relative;
	margin-bottom: 30px;
}

.booking-form .form-control {
	border: none;
	height: 65px;
	-webkit-box-shadow: none;
	box-shadow: none;
	font-size: 24px;
	color: #090a0b;
	font-weight: 300;
	background: #f2f1f1;
	border-radius: 4px;
}

.booking-form .form-control::-webkit-input-placeholder {
	color: #b1b6bd;
}

.booking-form .form-control:-ms-input-placeholder {
	color: #b1b6bd;
}

.booking-form .form-control::placeholder {
	color: #b1b6bd;
}

.booking-form input[type="date"].form-control:invalid {
	color: #b1b6bd;
}

.booking-form select.form-control {
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
}

.booking-form select.form-control+.select-arrow {
	position: absolute;
	right: 0px;
	top: 0px;
	width: 24px;
	text-align: center;
	pointer-events: none;
	height: 65px;
	line-height: 65px;
	color: #b1b6bd;
	font-size: 14px;
}

.booking-form select.form-control+.select-arrow:after {
	content: '\279C';
	display: block;
	-webkit-transform: rotate(90deg);
	transform: rotate(90deg);
}

.booking-form .form-label {
	color: #184c8f;
	display: block;
	font-weight: 600;
	height: 25px;
	line-height: 25px;
	font-size: 16px;
	position: relative;
	margin-top: 10px;
	text-transform: uppercase;
}

.booking-form .form-label:after {
	content: '';
	position: absolute;
	left: 10px;
	top: -10px;
	width: 0;
	height: 0;
	border-style: solid;
	border-width: 10px 10px 0 10px;
	border-color: #f2f1f1 transparent transparent transparent;
}

.booking-form .form-btn {
	margin-bottom: 30px;
}

.booking-form .submit-btn {
	background: #184c8f;
	border: none;
	font-weight: 600;
	text-transform: uppercase;
	height: 90px;
	font-size: 18px;
	width: 100%;
	color: #fff;
	border-radius: 4px;
	display: block;
}

/* ------------------------------------ */
/* ------------------------------------ */
.container-1 {
    padding: 0px;
    margin-left: 250px;
}

.row {
    padding-top: 15px;
    padding-left: 80px;
    padding-right: 80px;
}

/* ตารางแสดงข้อมูล */
/* พื้นหลังตาราง */
.table-fill {
    background: white;
    border-radius:3px;
    border-collapse: collapse;
    height: 100px;
    margin: auto;
    max-width: 600px;
    padding:5px;
    width: 100%;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    animation: float 5s infinite;
}

/* หัวตาราง */
th {
    color:white;;
    background:#3e4748;
    border-bottom:4px solid #9ea7af;
    border-right: 1px solid #343a45;
    font-size:18px;
    font-weight: 100;
    padding:15px;
    text-align:left;
    vertical-align:middle;
}

th:first-child {
    border-top-left-radius:3px;
}
 
th:last-child {
    border-top-right-radius:3px;
    border-right:none;
}

/* ตารางแต่ละแถว */
tr {
    border-top: 1px solid #C1C3D1;
    border-bottom-: 1px solid #C1C3D1;
    color:#666B85;
    font-size:16px;
    font-weight:normal;
    text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}
 
tr:hover td {
    background: #27b0b9;
    color:#FFFFFF;
    /* border-top: 1px solid #22262e; */
}
 
tr:first-child {
    border-top:none;
}

tr:last-child {
    border-bottom:none;
}
 
tr:nth-child(odd) td {
    background:#EBEBEB;
}
 
tr:nth-child(odd):hover td {
    background:#27b0b9;
}

tr:last-child td:first-child {
    border-bottom-left-radius:3px;
}
 
tr:last-child td:last-child {
    border-bottom-right-radius:3px;
}

/* ข้อมูลแต่ละคอลัมน์ */
td {
    background:#FFFFFF;
    padding:15px;
    text-align:left;
    vertical-align:middle;
    font-weight:300;
    font-size:15px;
    text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
    border-right: 1px solid #C1C3D1;
}

td:last-child {
    border-right: 0px;
}

th.text-left {
    text-align: left;
}

th.text-center {
    text-align: center;
}

th.text-right {
    text-align: right;
}

td.text-left {
    text-align: left;
}

td.text-center {
    text-align: center;
}

td.text-right {
    text-align: right;
}

</style>
</head>

@section('content')

<div class="grid-container">
    <div class="item1">
        <i class="fa-solid fa-reply" onclick="location='{{ route('package') }}'"> ย้อนกลับ</i>
        <center><p class="top1">แก้ไขแพ็คเกจการท่องเที่ยว</p></center>     
    </div>
    
    <div class="item3">
            @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
            @endif

    <form action="{{url('/package/update/'.$package->package_id)}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col">
            <label for="typetravel_id">ประเภทการท่องเที่ยว</label>
            <select name="typetravel_id" class="select">
                {{-- <option value={{ $type_travels->typetv_id }} selected>{{ $type_travels->typetv_name }}</option> --}}
                <option value="" selected></option>
                @foreach($typetravels as $row)
                    <option value={{ $row->typetravel_id }} selected>{{ $row->typetravel_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="acttravel_id">รายการกิจกรรม</label>
            <select name="acttravel_id" class="select">
                {{-- <option value={{ $type_travels->typetv_id }} selected>{{ $type_travels->typetv_name }}</option> --}}
                <option value="" selected></option>
                @foreach($acttravels as $row)
                    <option value={{ $row->acttravel_id }} selected>{{ $row->acttravel_id }} | {{ $row->acttravel_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label for="food_id">รายการอาหาร</label>
            <select name="food_id" class="select">
                {{-- <option value={{ $type_travels->typetv_id }} selected>{{ $type_travels->typetv_name }}</option> --}}
                <option value="" selected></option>
                @foreach($menufoods as $row)
                    <option value={{ $row->food_id }} selected>{{ $row->food_id }} | {{ $row->food_name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="package_name">ชื่อแพ็คเกจ</label>
            <input type="text" name="package_name" value="{{$package->package_name}}">
        </div>
        <div class="col">
            <label for="package_price">ราคาแพ็คเกจ</label>
            <input type="number" name="package_price" value="{{$package->package_price}}">
        </div>
    @error('package_price')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>

    <div class="row">
        <div class="col">
            <label for="package_detail">รายละเอียดแพ็คเกจ</label>
            <textarea class="textarea-1" type="text" name="package_detail">{{$package->package_detail}}</textarea>
        </div>
    @error('package_detail')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>

    <div class="row">
        <div class="col">
            <label for="package_highlight">จุดเด่น</label>
            <textarea class="textarea-1" type="text" name="package_highlight">{{$package->package_highlight}}</textarea>
        </div>
    @error('package_highlight')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>

    <div class="row">
        <div class="col">
            <label for="package_note">หมายเหตุ</label>
            <input type="text" name="package_note" value="{{$package->package_note}}">
        </div>
    @error('package_note')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>
    
    <div class="row">
        <div class="col">
            <label for="package_img" class="label">รูปภาพแพ็คเกจ</label>
            <input type="file" class="form-control" name="package_img" value="{{$package->package_img}}">
        </div>
    </div>  

    <div class="row">
        <input type="hidden" name="old_image" value="{{$package->package_img}}">
        <div class="col imgshow">
            <img src="{{asset($package->package_img)}}" alt="" width="300px" height="auto">
        </div>
    </div>

    <input type="submit" value="Submit">
    </form>
    </div>
</div>

@endsection