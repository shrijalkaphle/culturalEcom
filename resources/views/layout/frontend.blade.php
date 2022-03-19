@yield('stripe')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/splide/dist/css/splide.min.css') }}">
    <script src="https://kit.fontawesome.com/3a522aa8ba.js" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('landing') }}">
                {{ env('APP_NAME') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('landing') }}">Home</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('contact') }}">Contact</a> </li>
                    @if(Auth::check())
                        <li class="nav-item"> <a class="nav-link" href="{{ route('cart') }}">
                                <i class="fas fa-shopping-cart"></i> Cart
                                @if(Auth::user()->cart->count())
                                    <span class='badge badge-info'>{{ Auth::user()->cart->count() }}</span>
                                @endif
                            </a> </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{Auth::user()->name}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->role->name == 'admin')
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                @else
                                    <a class="dropdown-item" href="/user/profile">Profile</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
                            </div>
                        </li>
                    @else
                        <li class="nav-item"> <a class="nav-link" href="{{ route('login') }}">Login</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('page.register') }}">Register</a> </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @yield('body')
    <div class="foot mt-5">
        <div class="foot text-center py-3">
            © 2021 Copyright: {{env('APP_NAME')}}
        </div>
    </div>
</body>
</html>
<script src="/assets/jquery/jquery.min.js"></script>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/splide/dist/js/splide.min.js"></script>
<script src="/assets/js/app.js"></script>
@yield('script')