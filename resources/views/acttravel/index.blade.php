@extends('layouts.appadmin')

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">

<style>

.grid-container {
  display: grid;
  gap: 10px;
  /* height: 0px; */
  /* background-color: #2196F3; */
  margin-left: 250px;
}


.grid-container > div {
  /* background-color: rgba(255, 255, 255, 0.8); */
  text-align: left;
  font-size: 20px;
  
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
}

.button {
  background-color: #04AA6D; /* Green */
  border: none;
  color: white;
  width: 240px;
  height: 40px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px 130px;
  cursor: pointer;
}

.button3 {border-radius: 90px;}

.container-1 {
    padding: 0px;
    margin-left: 250px;
}

.row {
    padding: 30px;
    font-size: 14px;
}

.table {
    font-size: 14px;
}

.AA {
    width: 130px;
    margin-bottom: 0;
    margin-right: -50px;
    margin-left: 0;
}

</style>
</head>
@section('content')

<div class="grid-container">
    <div><center><p class="top1">แสดงข้อมูลกิจกรรมการเที่ยว</p></center>
    <button class="button button3" onclick="location='{{ route('acttravel.create') }}'">
        <i class="fa-solid fa-file-circle-plus"></i> เพิ่มข้อมูลกิจกรรมการเที่ยว</button>
    </div>
</div> 

@if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
    @endif

    <div class="container-1">
        <div class="row">
        <table class="table">
            <thead class="table-light">
                <tr>
                <th scope="col">ลำดับ</th>
                <th scope="col">รหัสกิจกรรมการเที่ยว</th>
                <th scope="col">ประเภทการท่องเที่ยว</th>
                <th scope="col">ชื่อกิจกรรมการเที่ยว</th>
                <th scope="col">รูปแบบ</th>
                <th scope="col">รายละเอียดกิจกรรมการเที่ยว</th>
                <th scope="col">หมายเหตุ</th>
                <th scope="col">เวลาที่สร้าง</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                {{-- @php($i=1) --}}
                @foreach($acttravel as $acttravels)
                <tr>
                {{-- <th scope="row">{{$i++}}</th> --}}
                <td>{{$acttravel->firstItem()+$loop->index}}</td>
                <td>{{$acttravels->at_id}}</td>
                <td>{{$acttravels->typetv_name}}</td>
                <td>{{$acttravels->at_name}}</td>
                <td>{{$acttravels->at_type}}</td>
                <td>{{$acttravels->at_detail}}</td>
                <td>{{$acttravels->at_note}}</td>
                <td>{{$acttravels->created_at}}</td>

                <td>
                    <form class="AA" action="{{ route('acttravel.destroy', $acttravels->at_id) }}" method="POST">
                        <a href="{{ route('acttravel.edit', $acttravels->at_id) }}" class="btn btn-warning">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>

                </tr>
                @endforeach
            </tbody>
            </table>
            {!! $acttravel->links('pagination::bootstrap-5') !!}
        </div>
    </div>

</div> 

@endsection