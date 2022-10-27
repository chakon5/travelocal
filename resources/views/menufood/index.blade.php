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
  width: 190px;
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
    <div><center><p class="top1">แสดงข้อมูลเมนูอาหาร</p></center>
    <button class="button button3" onclick="location='{{ route('menufood.create') }}'">
        <i class="fa-solid fa-file-circle-plus"></i> เพิ่มข้อมูลเมนูอาหาร</button>
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
                <th scope="col">ชื่อเมนูอาหาร</th>
                <th scope="col">รูปแบบ</th>
                <th scope="col">รายละเอียดเมนูอาหาร</th>
                <th scope="col">หมายเหตุ</th>
                <th scope="col">เวลาที่สร้าง</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                @php($i=1)
                @foreach($menufood as $menufoods)
                <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$menufoods->food_name}}</td>
                <td>{{$menufoods->food_type}}</td>
                <td>{{$menufoods->food_detail}}</td>
                <td>{{$menufoods->food_note}}</td>
                <td>{{$menufoods->created_at}}</td>

                <td>
                    <form class="AA" action="{{ route('menufood.destroy', $menufoods->food_id) }}" method="POST">
                        <a href="{{ route('menufood.edit', $menufoods->food_id) }}" class="btn btn-warning">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>

                </tr>
                @endforeach
            </tbody>
            </table>
            {!! $menufood->links('pagination::bootstrap-5') !!}
        </div>
    </div>

</div> 

@endsection