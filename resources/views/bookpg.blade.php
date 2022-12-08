@extends('layouts.app')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>


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
    margin: 5px 0;
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
    padding: 12px;
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
    background: #3e4748;
    color:#FFFFFF;
    border-top: 1px solid #22262e;
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
    background:#3e4748;
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

.modal {
    width: 100%;
    height: 100%;
}

.btGuide {
    margin-top: 50px;
}

</style>

@section('content')

{{-- <div button class="tableft">จองแพ็คเกจ</div>
<div button class="tableft-1">จองกิจกรรมเสริม</div> --}}

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

{{-- <div class="row">
    <div class="col">Room
        <input type="number" name="room_id" class="form-control" placeholder="Room">
    </div>
    <div class="col">
    </div>
</div> --}}

<div class="row">
    <div class="col">จำนวนนักท่องเที่ยว
        <input type="number" id="booking_amount" name="booking_amount" class="form-control" onchange="showCalculate()"
        max=10>
    </div>
    <div class="col">
    </div>
    @error('booking_amount')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col">แพ็คเกจ
        <select id="package_id" name="package_id" class="select" onchange="selectPackage(this)">
        @foreach($packages as $row)
            <option value={{ $row->package_id }}>{{ $row->package_name }} | ราคา {{ $row->package_price }} บาท</option>
        @endforeach
        </select>
    </div>
    <div class="col">
    </div>
</div>

<div class="row">  
    <div class="col">ไกด์นำเที่ยว
        <select id="guide_id" name="guide_id" class="select" onchange="selectGuide(this)">
            <option value="">ไม่ต้องการไกด์</option>
        @foreach($guides as $row)
            <option value={{ $row->guide_id }}>{{ $row->guide_name }} {{ $row->guide_lname }} | เพศ : {{ $row->guide_gender }} | ราคา : {{ $row->guide_price }}</option>
        @endforeach
        </select>
    </div>
    <div class="col">
        <button type="button" class="btn btn-secondary btGuide" data-bs-toggle="modal" data-bs-target="#myModal">
            ดูข้อมูลไกด์
        </button>
    </div>
</div>
  
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">รายการไกด์นำเที่ยว</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">

            <table class="table-fill">
                {{-- หัวข้อคอลัมน์ --}}
                <thead>
                    <tr>
                        {{-- <th class="text-left">ลำดับ</th> --}}
                        <th class="text-left">ชื่อจริง</th>
                        <th class="text-left">นามสกุล</th>
                        <th class="text-left">เพศ</th>
                        {{-- <th class="text-left">เบอโทรศัพท์</th> --}}
                        <th class="text-left">ที่อยู่</th>
                        <th class="text-left">ราคา</th>
                        <th class="text-left">รูปภาพ</th>
                    </tr>
                </thead>
                {{-- ข้อมูลในตาราง --}}
                <tbody class="table-hover">
                    @foreach($guides as $row)
                    <tr>
                        {{-- <td class="text-left">{{$guides->firstItem()+$loop->index}}</td> --}}
                        <td class="text-left">{{$row->guide_name}}</td>
                        <td class="text-left">{{$row->guide_lname}}</td>
                        <td class="text-left">{{$row->guide_gender}}</td>
                        {{-- <td class="text-left">{{$row->guide_tel}}</td> --}}
                        <td class="text-left">{{$row->guide_address}}</td>
                        <td class="text-left">{{$row->guide_price}}</td>
                        <td class="text-left"><img src="{{asset($row->guide_img)}}" alt="" width="80px" height="auto"></td>
                    </tr>
                    @endforeach
                </tbody>
                </table>

            {{-- @foreach($guides as $row)
            <div><img src="{{asset($row->guide_img)}}" alt="" width="70px" height="auto"> {{ $row->guide_name }}</div>
            @endforeach --}}
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
        </div>
  
      </div>
    </div>
  </div>

<div class="row">
    <div class="col">Check-in
        <input type="date" class="form-control" name="booking_check_in">
    </div>
    {{-- <div class="col">Check-Out
        <input type="date" class="form-control"name="booking_check_out">
    </div> --}}
</div>

    {{-- <div class="row">
        <div class="col">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something" checked>
                <label class="form-check-label" for="check1">ต้องการไกด์นำเที่ยว</label>
            </div>
        </div>
        <div class="col">
        </div>
    </div><BR> --}}
 

{{-- เลื่อนลงตลอด --}}
    <div class="row">
        <div class="col">
            <BR><h1>ราคารวม <span id="priceShow"> 0 </span> บาท</h1>
        </div>
        {{-- <div class="col">
            <div button class="btn-1">จองเลย</div>
        </div> --}}
        <input type="submit" value="Submit">
    </div>
    <input type="hidden" name="totalBooking" id="totalBooking" value="0">
</form>

    <script>
        var pricepk = 0;
        var pricegd = 0;

        function selectPackage(el){
            var value = (el.value || el.options[el.selectedIndex].value);
            var sites = {!! json_encode($packages->toArray()) !!};
            var pk;
            
            for (let i=0;i<sites.length;i++ ) {
                if (sites[i].package_id == value) {
                    pk = sites[i];
                }
            }

            pricepk = pk.package_price;
            showCalculate();
        // console.log(pk.package_price);
    }

    function selectGuide(el){
            
            var value = (el.value || el.options[el.selectedIndex].value);
            var sites = {!! json_encode($guides->toArray()) !!};
            var gd;
            
            for (let i=0;i<sites.length;i++ ) {
                if (sites[i].guide_id == value) {
                    gd = sites[i];
                }
            }
            var guidenull = document.getElementById("guide_id").value;

            if (guidenull) {
                pricegd = gd.guide_price;
            } else {
                pricegd = 0;
            }
            // pricegd = gd.guide_price;
            showCalculate();
        // console.log(pk.package_price);
    }

    function showCalculate(){

            var totalamount = document.getElementById("booking_amount").value;
            var priceShow = document.getElementById("priceShow");
            priceShow.innerHTML = (pricepk * totalamount) + pricegd ;

            document.getElementById("totalBooking").value = (pricepk * totalamount) + pricegd;

        // console.log(pk.package_price);
    }
    
    </script>

</div>
</div>

@endsection