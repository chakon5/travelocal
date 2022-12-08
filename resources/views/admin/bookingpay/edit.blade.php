@extends('layouts.app')
<style>

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
    margin-top: 50px;
}

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

input[type=file], select {
    width: 100%;

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
    margin: 20px 10px;
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
    
    <div class="item3">
            @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
            @endif

    {{-- <form action="{{ route('addPayment') }}" method="POST" enctype="multipart/form-data">
    @csrf --}}

        <div class="row">
            <div class="col">
                <label for="booking_id">เลือกรายการจอง</label>
                <select name="booking_id" class="select">
                    <option value="" selected>กรุณาเลือก</option>
                    @foreach($bookings as $row)
                        <option value={{ $row->booking_id }}>{{ $row->booking_id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
            </div>
        @error('booking_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="row">
            <div class="col">
                <label for="pay_name">ชื่อ-นามสกุล</label>
                <input type="text" name="pay_name" placeholder="ชื่อ-นามสกุล..">
            </div>
            <div class="col">
            </div>
        @error('pay_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="row">
            <div class="col">
                <label for="pay_date">วันที่ชำระ</label>
                <input type="date" name="pay_date" placeholder="วันที่ชำระ..">
            </div>
            <div class="col">
                <label for="pay_amount">จำนวนเงิน</label>
                <input type="number" name="pay_amount" placeholder="จำนวนเงิน..">
            </div>
        @error('pay_amount')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="row">
            <div class="col">
                <label for="pay_img" class="label">สลิปการโอน</label>
                <input type="file" class="form-control" name="pay_img">
            </div>
        @error('pay_img')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        
        <input type="submit" value="Submit">
        </form>
          
    </div> 
    
</div> 

@endsection