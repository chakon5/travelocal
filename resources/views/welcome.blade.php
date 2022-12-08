@extends('layouts.appfirst')

@section('content')

<style>

.login {
    width: 30%;
    justify-content: center;
    margin-left: 35%;
    margin-top: 12%;
}

body {

    background-image: url({{asset('/img/napok.png')}});
}

input[type=submit] {
    width: 350px;
    background-color: #04AA6D;
    color: white;
    padding: 10px 10px;
    margin-right: 50px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.a{
    margin-left: 30px;
}

.text-sm {
    width: 350px;
    background-color: #04AA6D;
    color: white;
    padding: 10px 10px;
    margin-right: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

</style>
</head>
<body>

<div class="a">
    @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500">Home</a>
        @else
            <a href="{{ url('/') }}" class="text-sm">เข้าสู่ระบบ</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-sm">สมัครสมาชิก</a>
            @endif
        @endauth
    </div>
    @endif
</div>    

    <div class="col-md-8 login">
        <div class="card">
            <div class="card-header">{{ __('Login') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <BR>
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-1">
                            {{-- <button> --}}
                            <input type="submit" value="เข้าสู่ระบบ">
                                {{-- {{ __('Login') }} --}}
                            {{-- </button> --}}

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{-- {{ __('Forgot Your Password?') }} --}}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

@endsection