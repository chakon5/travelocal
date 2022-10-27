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
  width: 200px;
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
    <div><center><p class="top1">แสดงข้อมูลไกด์นำเที่ยว</p></center>
    <button class="button button3" onclick="location='{{ route('guide.create') }}'">
        <i class="fa-solid fa-file-circle-plus"></i> เพิ่มข้อมูลไกด์นำเที่ยว</button>
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
                <th scope="col">ชื่อจริง</th>
                <th scope="col">นามสกุล</th>
                <th scope="col">เพศ</th>
                <th scope="col">วันเกิด</th>
                <th scope="col">เบอร์โทรศัพท์</th>
                <th scope="col">ที่อยู่</th>
                <th scope="col">อีเมลล์</th>
                <th scope="col">วันที่สร้าง</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @php($i=1)
                @foreach($guide as $guides)
                <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$guides->guide_name}}</td>
                <td>{{$guides->guide_lname}}</td>
                <td>{{$guides->guide_gender}}</td>
                <td>{{$guides->eguide_birthday}}</td>
                <td>{{$guides->guide_tel}}</td>
                <td>{{$guides->guide_address}}</td>
                <td>{{$guides->email}}</td>
                <td>{{$guides->created_at}}</td>

                <td>
                    <form class="AA" action="{{ route('guide.destroy', $guides->guide_id) }}" method="POST">
                        <a href="{{ route('guide.edit', $guides->guide_id) }}" class="btn btn-warning">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>

                {{-- <td><button type="button" class="btn btn-warning"><i class="fa-solid fa-pen"></i></button></td>
                <td><button type="button" class="btn btn-danger"><i class="fa-solid fa-circle-xmark"></i></button></td> --}}
                </tr>
                @endforeach
            </tbody>
            </table>
            {!! $guide->links('pagination::bootstrap-5') !!}
        </div>
    </div>

</div> 



@endsection