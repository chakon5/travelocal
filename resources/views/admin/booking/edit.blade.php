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
        <i class="fa-solid fa-reply" onclick="location='{{ route('booking') }}'"> ย้อนกลับ</i>
        <center><p class="top1">เพิ่มข้อมูลการจอง</p></center>     
    </div>
    
    <div class="item3">
            @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
            @endif

    <form action="{{url('/booking/update/'.$booking->booking_id)}}" method="POST" enctype="multipart/form-data">
    @csrf
                

    <div class="row">  
        <div class="col">ประเภทสถานที่ท่องเที่ยว
            <select id="typetravel_id" name="typetravel_id" class="select" disabled>
                @foreach($typetravels as $row)     
                    <option value={{ $row->typetravel_id }}
                    @if($row->typetravel_id == $booking->typetravel_id)
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
        <div class="col">จำนวนนักท่องเที่ยว
            <input type="number" id="booking_amount" name="booking_amount" value="{{$booking->booking_amount}}">
        </div>
        <div class="col">
        </div>
    </div>
    
    <div class="row">
        <div class="col">แพ็คเกจ
            <select id="package_id" name="package_id" class="select" onchange="showCalculate(this)">
                <option value="">เลือก</option>
            @foreach($packages as $row)
                <option value={{ $row->package_id }} selected>{{ $row->package_name }}</option>
            @endforeach
            </select>
        </div>
        <div class="col">
        </div>
    </div>
    
    <div class="row">
        <div class="col">Check-in
            <input type="date" class="form-control" name="booking_check_in" value="{{$booking->booking_check_in}}">
        </div>
        <div class="col">Check-Out
            <input type="date" class="form-control"name="booking_check_out" value="{{$booking->booking_check_out}}">
        </div>
    </div>
    
     
    {{-- เลื่อนลงตลอด --}}
        <div class="row">
            <div class="col">
                <BR><h1>ราคารวม <span id="priceShow"> 0 </span> บาท</h1>
            </div>

            <input type="submit" value="Submit">
        </div>
        <input type="hidden" name="totalBooking" id="totalBooking" value="0">
    </form>
    
        <script>
            function showCalculate(el){
                var value = (el.value || el.options[el.selectedIndex].value);
                var sites = {!! json_encode($packages->toArray()) !!};
                var pk;
                for (let i=0;i<sites.length;i++ ) {
                    if (sites[i].package_id == value) {
                        pk = sites[i];
                    }
                }
    
                var totalamount = document.getElementById("booking_amount").value;
    
                var priceShow = document.getElementById("priceShow");
                priceShow.innerHTML = pk.package_price * totalamount;
    
                document.getElementById("totalBooking").value = pk.package_price * totalamount;
    
            // console.log(pk.package_price);
        }
        </script>
          
    </div>
    
</div> 

@endsection