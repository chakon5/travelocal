@extends('layouts.appadmin')

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">

<link rel="stylesheet" href="{{URL::to('assets/css/profile.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

<style>

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);

.grid-container {
    display: grid;
    gap: 10px;
    margin-left: 250px;
}


.grid-container > div {
    text-align: left;
    font-size: 20px;
}

.top1 {
    border-radius: 90px;
    text-align: left;
    font-size: 20px;
    width: 90%;
    height: 60px;
    color: white;
    background-color: #3C8085;
    padding: 15px;
}

.button {
    background-color: #04AA6D; /* Green */
    border: none;
    color: white;
    width: 160px;
    height: 40px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 5px 65px;
    cursor: pointer;
}

.button3 {border-radius: 90px;}

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

/* ข้อความแจ้งเตือนบันทึกสำเร็จ */
.alert-success{
    width: 100%;
    height: 60px;
}

.paginate {
    padding-top: 20px;
    font-size: 18px;
}

</style>
</head>
@section('content')

<div class="grid-container">
    <div><center><p class="top1">แสดงข้อมูลการจองแพ็คเกจ</p></center>
    <button class="button button3" onclick="location='{{ route('createBooking') }}'">
        <i class="fa-solid fa-file-circle-plus"></i> เพิ่มข้อมูลการจอง</button>
    </div>
</div> 

<div class="container-1">
    <div class="row">

    {{-- ข้อความแจ้งเตือนบันทึกสำเร็จ --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success"><p>{{ $message }}</p></div>
    @endif

    <table class="table-fill">
        {{-- หัวข้อคอลัมน์ --}}
        <thead>
            <tr>
                <th class="text-left">ลำดับ</th>
                <th class="text-left" width="120">รหัสการจอง</th>
                <th class="text-left" width="100px">ชื่อลูกค้า</th>
                <th class="text-left" width="180">ประเภทการท่องเที่ยว</th>
                <th class="text-left" width="180">แพ็คเกจ</th>
                {{-- <th class="text-left" width="180">หมายเลขห้องพัก</th> --}}
                <th class="text-left" width="100">จำนวน</th>
                <th class="text-left" width="140">Check-in</th>
                {{-- <th class="text-left" width="140">Check-out</th> --}}
                <th class="text-left" width="100">ราคารวม</th>
                <th class="text-left" width="200px">สถานะ</th>
                <th class="text-left" width="250px" height="auto"></th>
            </tr>
        </thead>
        {{-- ข้อมูลในตาราง --}}
        <tbody class="table-hover">
            @foreach($bookings as $row)
            <?php 
                // $sum = $row->booking_total + $sum;
            ?>
            <tr>
                <td class="text-left">{{$bookings->firstItem()+$loop->index}}</td>
                <td class="text-left">{{$row->booking_id}}</td>
                <td class="text-left">{{$row->name}}</td>
                <td class="text-left">{{$row->typetravel_name}}</td>
                <td class="text-left">{{$row->package_name}}</td>
                {{-- <td class="text-left">{{$row->room_number}}</td> --}}
                <td class="text-left">{{$row->booking_amount}}</td>
                <td class="text-left">{{$row->booking_check_in}}</td>
                {{-- <td class="text-left">{{$row->booking_check_out}}</td> --}}
                <td class="text-left">{{$row->booking_total}}</td>

                <td class="text-left">
                    @if ($row->booking_status==1)
                        <a href="{{ url('change-statusbk/'.$row->booking_id) }}" onclick="return confirm('ต้องการอัพเดทสถานะใช่หรือไม่ ?')" class="btn btn-sm btn-success"> ยืนยันการจอง </a>
                    @else
                        <a href="{{ url('change-statusbk/'.$row->booking_id) }}" onclick="return confirm('ต้องการอัพเดทสถานะใช่หรือไม่ ?')" class="btn btn-sm btn-danger"> กำลังตรวจสอบ </a>
                    @endif
                </td>

                <td class="text-center">
                    {{-- <button type="button" class="btn btn-Secondary" data-bs-toggle="modal" data-bs-target="#myModal">
                    <i class="fa-solid fa-eye"></i>
                    </button> --}}
                    <a href="{{url('/booking/detailBooking/'.$row->booking_id)}}" class="btn btn-Secondary"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{url('/booking/edit/'.$row->booking_id)}}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="{{url('/booking/delete/'.$row->booking_id)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>

        <div class="paginate">
        {!! $bookings->links('pagination::bootstrap-5') !!}
        </div>

        {{-- {{ $sum}} --}}

    </div>
</div>
 
@endsection