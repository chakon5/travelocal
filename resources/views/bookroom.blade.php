@extends('layouts.app')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<style>

.button1 {
    margin-top: 23px;
}

.reservation {
    margin: 0 150px ;
    margin-top: 20px;
    font-size: 20px;
}

.col {
    margin: 15px 0;
}

.tableft {
    position: absolute;
    margin-top: 50px;
    margin-left: 60px;
    /* top: 38%; */
    /* left: 50%; */
    width: 200px;
    height: 50px;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background-color: #3C8085;
    color: white;
    font-size: 17px;
    /* padding: 10px 30px; */
    padding-left: 20px;
    padding-top: 13px;
    border: none;
    cursor: pointer;
    border-radius: 45px;
    text-align: center;
}

.tableft:hover {
    background-color: #444444;
    color: white;
}

.tableft-1 {
    position: absolute;
    margin-top: 110px;
    margin-left: 60px;
    /* top: 38%; */
    /* left: 50%; */
    width: 200px;
    height: 50px;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background-color: #3C8085;
    color: white;
    font-size: 17px;
    /* padding: 10px 30px; */
    padding-left: 20px;
    padding-top: 13px;
    border: none;
    cursor: pointer;
    border-radius: 45px;
    text-align: center;
}

.tableft-1:hover {
    background-color: #444444;
    color: white;
}

.btn-1 {
    position: absolute;
    margin-top: 50px;
    margin-left: 90px;
    /* top: 38%; */
    /* left: 50%; */
    width: 180px;
    height: 60px;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background-color: #3C8085;
    color: white;
    font-size: 25px;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    border-radius: 45px;
    text-align: center;
}

.btn-1:hover {
    background-color: #444444;
    color: white;
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

.select {
    width: 100%;
    padding: 8px;
    margin: 8px 0;
    display: block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
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
    width: 120px;
    height: 50px;
    background-color: #04AA6D;
    color: white;
    padding: 10px 10px;
    margin: 20px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

</style>

@section('content')

<div class="container">

<div class="reservation">

    <form action="{{ route('addBooking') }}" method="POST" enctype="multipart/form-data" >
    @csrf

    <div class="row">
        <div class="col">ประเภทสถานที่ท่องเที่ยว
            <select id="typetravel_id" name="typetravel_id" class="select">
            @foreach($typetravels as $row)
                <option value={{ $row->typetravel_id }}>{{ $row->typetravel_name }}</option>
            @endforeach
            </select>
        </div>
        <div class="col">
        </div>
    </div>

    <div class="row">
        <div class="col">รูปแบบห้องพัก
            <select id="typeroom_id" name="typeroom_id" class="select" onchange="selectTyperoom(this)">
            @foreach($typerooms as $row)
                <option value={{ $row->typeroom_id }}>{{ $row->typeroom_id }} | {{ $row->typeroom_name }}</option>
            @endforeach
            </select>
        </div>
        <div class="col">เลือกห้องพัก
            <select id="room_id" name="room_id" class="select" onchange="selectRoom(this)">
            <option value="">เลือก</option>
            @foreach($rooms as $row)
                <option value={{ $row->room_id }}>หมายเลขห้องพัก {{ $row->room_number }} | ราคา {{ $row->room_price }} บาท </option>
            @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col">จำนวนผู้เข้าพัก
            <input type="number" class="form-control" id="booking_amount" name="booking_amount" min="0">
        </div>
        <div class="col">
        </div>
        @error('booking_amount')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    {{-- <div class="row">
        <div class="col">จำนวนคืน
            <input type="number" class="form-control" placeholder="จำนวนคืน" id="stay_amount" name="stay_amount">
        </div>
        <div class="col">
        </div>
    </div> --}}

    <div class="row">
        <div class="col">Check-in
            <input type="date" class="form-control" name="booking_check_in" id="booking_check_in" onchange="showCalculate()">
        </div>
        <div class="col">Check-Out
            <input type="date" class="form-control" name="booking_check_out" id="booking_check_out" onchange="showCalculate()">
        </div>
    </div> 

    <div class="row">
        <div class="col">
            <BR><h1>ราคารวม <span id="priceShow"> 0 </span> บาท</h1>
        </div>

    </div>
    <input type="submit" value="Submit">
    <input type="hidden" name="totalBooking" id="totalBooking" value="0">
    <input type="hidden" name="stay_amount" id="stay_amount">
    </form> 

    <script>
        var bookingAmount = 0;
        var priceRoom = 0;
        var stayAmount = 1;
        document.getElementsByName("booking_amount")[0].setAttribute('max',bookingAmount);

        function selectTyperoom(el){
            var value = (el.value || el.options[el.selectedIndex].value);
            var sites = {!! json_encode($typerooms->toArray()) !!};
            var tr;
            
            for (let i=0;i<sites.length;i++ ) {
                if (sites[i].typeroom_id == value) {
                    tr = sites[i];
                }
            }

            if (tr.typeroom_id == "39") {
                bookingAmount = 10;
            } else {
                bookingAmount = 5;
            }

            document.getElementsByName("booking_amount")[0].setAttribute('max',bookingAmount);
            showCalculate();
    }

    function selectRoom(el){
            var value = (el.value || el.options[el.selectedIndex].value);
            var sites = {!! json_encode($rooms->toArray()) !!};
            var rr;
            
            for (let i=0;i<sites.length;i++ ) {
                if (sites[i].room_id == value) {
                    rr = sites[i];
                }
            }

            priceRoom = rr.room_price;
            showCalculate();

    }

    function showCalculate(){

            var checkIn = document.getElementById("booking_check_in").value;
            var checkOut = document.getElementById("booking_check_out").value;
            if (checkIn && checkOut) {
                var diffDate = new Date(checkOut) - new Date(checkIn);
                var priceShow = document.getElementById("priceShow");
                stayAmount = diffDate / (1000*60*60*24);
            }

            priceShow.innerHTML = priceRoom * stayAmount ;
            document.getElementById("totalBooking").value = priceRoom * stayAmount;
            document.getElementById("stay_amount").value = stayAmount;

            // console.log(pk.package_price);
    }

    </script>
    
    {{-- <script>
        function showCalculate2(el){
            var value = (el.value || el.options[el.selectedIndex].value);
            var sites = {!! json_encode($rooms->toArray()) !!};
            var rm;
            for (let i=0;i<sites.length;i++ ) {
                if (sites[i].room_id == value) {
                    rm = sites[i];
                }
            }

            var totalamount = document.getElementById("booking_amount").value;

            var priceShow = document.getElementById("priceShow");
            priceShow.innerHTML = rm.room_price * totalamount;

            document.getElementById("totalBooking").value = pk.room_price * totalamount;

        // console.log(pk.package_price);
    }
    </script> --}}

</div>
</div>

@endsection