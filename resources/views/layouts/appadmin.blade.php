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

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Link bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Load an icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/c701cf1e02.js" crossorigin="anonymous"></script>

    <style>

/* แต่ง Sidebar */
.sidenav {
  height: 100%;
  width: 250px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #3C8085;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 6px 6px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 18px;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
  color: white;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: white;
}

/* Main content */
.main {
  margin-left: 250px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
  background-color: #262626;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #323232;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

.sidenav a:hover {
  color: #323232;
}

@media screen and (max-height: 350px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.f-navbar {
            background-color: #3C8085;
            height: 4px;
            width: 100%;
        }

.container {
    margin-right: 0;
}

</style>
</head>
<body>

<!-- <div class="f-navbar"></div> -->

<div id="mySidenav" class="sidenav">
<center><img src="{{asset('/img/TRAVELOCAL-GP.png')}}" id="logo" alt="" width="230" height="auto"></center><BR>

  <a href="{{ route('admin.home') }}"><button class="dropdown-btn">Dashboard</button></a>

  <button class="dropdown-btn"><i class="fa-solid fa-map"></i> จัดการการจอง
  <i class="fa-sharp fa-solid fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="{{ route('booking') }}">รายการจอง</a>
    <a href="{{ route('bookingpackage') }}">จองแพ็คเกจ</a>
    <a href="{{ route('bookingroom') }}">จองห้องพัก</a>
    {{-- <a href="#">จองกิจกรรมเสริม</a>
    <a href="#">ระบบอนุมัติการจอง</a> --}}
  </div>
  
  <button class="dropdown-btn"><i class="fa-solid fa-bed"></i> จัดการห้องพัก
  <i class="fa-sharp fa-solid fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="{{ route('typeroom') }}">ประเภทห้องพัก</a>
    <a href="{{ route('room') }}">ห้องพัก</a>
    <a href="{{ route('inventoryRoom') }}">รายการห้องพัก</a>
  </div>

  <button class="dropdown-btn"><i class="fa-sharp fa-solid fa-location-dot"></i> จัดการการท่องเที่ยว
    <i class="fa-sharp fa-solid fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <a href="{{ route('typetravel') }}">ประเภทการท่องเที่ยว</a>
      <a href="{{ route('acttravel') }}">กิจกรรมการเที่ยว</a>
      <a href="{{ route('menufood') }}">เมนูอาหาร</a>
      <a href="{{ route('guide') }}">ไกด์นำเที่ยว</a>
    </div>

    <button class="dropdown-btn"><i class="fa-solid fa-puzzle-piece"></i> จัดการแพ็คเกจท่องเที่ยว
      <i class="fa-sharp fa-solid fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
        <a href="{{ route('createPackage') }}">สร้างแพ็คเกจท่องเที่ยว</a>
        <a href="{{ route('package') }}">รายการแพ็คเกจท่องเที่ยว</a>
      </div>

  <button class="dropdown-btn"><i class="fa-solid fa-person-running"></i> จัดการกิจกรรมเสริม
    <i class="fa-sharp fa-solid fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <a href="{{ route('activity') }}">กิจกรรมเสริม</a>
      <a href="#">รายละเอียดกิจกรรม</a>
    </div>

  <a href="{{ route('bookingpay') }}" ><i class="fa-solid fa-wallet"></i> การชำระเงิน</a>
  {{-- <a href="#">Contact</a> --}}

  <button class="dropdown-btn"><i class="fa-solid fa-user"></i> จัดการบุคคล
  <i class="fa-sharp fa-solid fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="{{ route('employee') }}">จัดการพนักงาน</a>
    <a href="{{ route('entrepreneur.index') }}">จัดการผู้ประกอบการ</a>
    <a href="{{ route('user.index') }}">จัดการลูกค้า</a>
  </div>
</div>

<div id="app">
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">

                <a class="navbar-brand" href="{{ url('/') }}">
                <!-- <img src="{{asset('/img/LOGO-2.png')}}" id="logo" alt="" width="140" height="auto"> -->
                    <!-- {{ config('app.name', 'Laravel') }} -->
                </a>
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

        <main class="py-4">
            @yield('content')
        </main>
</div>

<script>
// dropdown script
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>
</body>
</html>
