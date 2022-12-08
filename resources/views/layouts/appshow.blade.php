<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Link bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Load an icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/c701cf1e02.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    
<style>

.bluenav{
    background-color: #3C8085;
    height: 4px;
    width: 100%;
}
.collapse {
    font-size: 15px;
    padding-left: 20px;
}

.tableft {
    position: absolute;
    margin-top: 50px;
    margin-left: 60px;
    /* top: 38%; */
    /* left: 50%; */
    width: 240px;
    height: 50px;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background-color: #3C8085;
    color: white;
    font-size: 17px;
    /* padding: 10px 30px; */
    padding-left: 40px;
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
    width: 240px;
    height: 50px;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background-color: #3C8085;
    color: white;
    font-size: 17px;
    /* padding: 10px 30px; */
    padding-left: 40px;
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

.tableft-2 {
    position: absolute;
    margin-top: 170px;
    margin-left: 60px;
    /* top: 38%; */
    /* left: 50%; */
    width: 240px;
    height: 50px;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background-color: #3C8085;
    color: white;
    font-size: 17px;
    /* padding: 10px 30px; */
    padding-left: 40px;
    padding-top: 13px;
    border: none;
    cursor: pointer;
    border-radius: 45px;
    text-align: center;
}

.tableft-2:hover {
    background-color: #444444;
    color: white;
}

.carousel-inner{
    height: 70px;
}

</style>
</head>
<body>

<div class="bluenav">
</div>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                <img src="{{asset('/img/LOGO-2.png')}}" id="logo" alt="" width="140" height="auto">
                    <!-- {{ config('app.name', 'Laravel') }} -->
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ url('/home') }}">แหล่งท่องเที่ยว</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        จองท่องเที่ยว
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('/bookpg') }}">จองแพ็คเกจ</a></li>
                        <li><a class="dropdown-item" href="{{ url('/bookroom') }}">จองห้องพัก</a></li>
                        <li><a class="dropdown-item" href="{{ url('/showbooking') }}">รายการจอง</a></li>
                    </ul>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        ชำระเงิน
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('/payment') }}">แจ้งชำระเงิน</a></li>
                        <li><a class="dropdown-item" href="{{ url('/showpayment') }}">ตรวจสอบสถานะ</a></li>
                    </ul>
                    </li>
                    <!-- <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                    </li> -->
                </ul>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>

<BR>
<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">
    
    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('/img/color1.png')}}" alt="" class="d-block" style="width:100%">
      </div>
      <div class="carousel-item">
        <img src="{{asset('/img/color2.png')}}" alt="" class="d-block" style="width:100%">
      </div>
      <div class="carousel-item">
        <img src="{{asset('/img/color3.png')}}" alt="" class="d-block" style="width:100%">
      </div>
    </div>
    
    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>

        <div button class="tableft" onclick="location='{{ route('showbooking') }}'"> รายการจองแพ็คเกจ</div>
        <div button class="tableft-1" onclick="location='{{ route('showbookroom') }}'"> รายการจองห้องพัก</div>
        {{-- <div button class="tableft-2" onclick="location='{{ route('bookroom') }}'"><i class="fa-solid fa-bed"></i> กลับไปยังรายการจอง</div> --}}

<main class="py-2">
    @yield('content')
</main>
    
</body>
</html>
