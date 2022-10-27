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
    margin: 15px 0;
}

.btn-1 {
    position: absolute;
    margin-top: 50px;
    margin-left: 90px;
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

</style>

@section('content')

{{-- <div button class="tableft">จองแพ็คเกจ</div>
<div button class="tableft-1">จองกิจกรรมเสริม</div> --}}

<div class="container">
<div class="reservation">
<div class="row">
    <div class="col">ประเภทสถานที่ท่องเที่ยว
        <select id="typeroom_capacity" name="typeroom_capacity" class="form-select">
            {{-- @foreach($typetravels as $type_travels)
              <option value={{ $type_travels->typetv_id }}>{{ $type_travels->typetv_name }}</option>
            @endforeach --}}
        </select>
    </div>
    <div class="col">
    </div>
</div>

<div class="row">
    <div class="col">จำนวนนักท่องเที่ยว
        <input type="number" class="form-control" placeholder="จำนวนนักท่องเที่ยว" aria-label="Last name">
    </div>
    <div class="col">
    </div>
</div>

<div class="row">
    <div class="col">แพ็คเกจ
        <select id="typeroom_capacity" name="typeroom_capacity" class="form-select">
            {{-- @foreach($typetravels as $type_travels)
              <option value={{ $type_travels->typetv_id }}>{{ $type_travels->typetv_name }}</option>
            @endforeach --}}
        </select>
    </div>
    <div class="col">
    </div>
</div>

<div class="row">
    <div class="col">Check-in
        <input type="date" class="form-control" placeholder="จำนวนนักท่องเที่ยว" aria-label="Last name">
    </div>
    <div class="col">Check-Out
        <input type="date" class="form-control" placeholder="จำนวนนักท่องเที่ยว" aria-label="Last name">
    </div>
</div>

<BR>
    <div class="row">
        <div class="col">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something" checked>
                <label class="form-check-label" for="check1">ต้องการไกด์นำเที่ยว</label>
            </div>
        </div>
        <div class="col">
        </div>
    </div>
 
    <div class="row">
        <div class="col">ไกด์นำเที่ยว

            <select id="typeroom_capacity" name="typeroom_capacity" class="form-select">
                {{-- @foreach($typetravels as $type_travels)
                  <option value={{ $type_travels->typetv_id }}>{{ $type_travels->typetv_name }}</option>
                @endforeach --}}
            </select>
        </div>
        <div class="col">
        </div>
    </div>

    {{-- เลื่อนลงตลอด --}}
    <div class="row">
        <div class="col">
            <BR><h1>ราคารวม 0 บาท</h1>
        </div>
        <div class="col">
            <div button class="btn-1">จองเลย</div>
        </div>
    </div>

</div>
</div>

@endsection