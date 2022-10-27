@extends('layouts.apphome')

<style>

    .F {
                display: grid;
                font-size: 40px;
                text-align: center;
                color: #3C8085;
                padding-top: 0px;
                padding-bottom: 0px;
    }

    .grid-container {
                display: grid;
                grid-template-columns: auto auto;
                gap: 10px;
                padding-top: 0px;
                padding: 10px;
                margin-right: 200px;
                margin-left: 200px;
                font-size: 20px;
            }

    .btn-1 {
                position: absolute;
                top: 38%;
                left: 50%;
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

    .G {
                display: grid;
                font-size: 40px;
                text-align: center;
                color: #3C8085;
                padding-top: 10x;
                padding-bottom: 0px;
            }

    .G1 {
                display: grid;
                font-size: 40px;
                text-align: center;
                color: #3C8085;
                padding-top: 10px;
                padding-bottom: 0px;
    }

</style>

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    You are normal user.
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="F">
            <h>เที่ยวท้องถิ่น</h>
            <h>กับจังหวัดปัตตานี</h></div>
            <BR><BR>

        <center><div button class="btn-1">จองเลย</div><br><br><BR>

        <div class="grid-container">
            <div><img src="{{asset('/img/first1.jpg')}}" alt="" width="450" height="300"></div>
            <div><img src="{{asset('/img/first2.jpg')}}" alt="" width="450" height="300"></div>
            <div>การท่องเที่ยวเชิงนิเวศน์</div>
            <div>การท่องเที่ยวเชิงวัฒนธรรม</div>
        </div> 

        <div class="G">
        <h>การท่องเที่ยวเชิงนิเวศน์ <img src="{{asset('/img/LOGO-SBR.png')}}" alt="" width="150" height="auto">
        </h>

        <nav class="detail-pic"><center>
            <img src="{{asset('/img/ROADMAP.png')}}" alt="" width="850" height="auto"><BR>
        </nav>
            
        <div class="G1">
        <h>การท่องเที่ยวเชิงวัฒนธรรม<img src="{{asset('/img/LOGO-BANA.png')}}" alt="" width="150" height="auto">
        </h></div>

        <nav class="detail-pic"><center>
            <img src="{{asset('/img/ACTIVITIES.png')}}" alt="" width="850" height="auto"><BR>
        </nav>
@endsection
