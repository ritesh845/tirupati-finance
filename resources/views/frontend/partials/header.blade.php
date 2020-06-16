<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
<meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- Favicons -->
  {{-- <link href="assets/img/favicon.png" rel="icon"> --}}
  {{-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

  <!-- Google Fonts -->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Vendor CSS Files -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  {{-- <link href="{{asset('css/icofont/icofont.min.css')}}" rel="stylesheet"> --}}
  {{-- <link href="{{asset('css/boxicons/boxicons.min.css')}}" rel="stylesheet"> --}}
  {{-- <link href="{{asset('css/remixicon/remixicon.css')}}" rel="stylesheet"> --}}
  {{-- <link href="{{asset('css/venobox/venobox.css')}}" rel="stylesheet"> --}}
  <link href="{{asset('css/owl.carousel/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
 <link href="{{asset('css/style.css')}}" rel="stylesheet">
 {{-- <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet"> --}}
 	<title>@yield('title')</title>
</head>
<body>

	<!-- ======= Header ======= -->
  <header id="header" class="fixed-top " style="background-color: rgba(40, 58, 90, 0.9)">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html">{{APPNAME}}</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
       {{-- <a href="index.html" class="logo mr-auto"><img src="{{asset('images/logo.png')}}" alt="" class="img-fluid"></a> --}}

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{url('/')}}">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Our Clients</a></li>
          {{-- <li><a href="#team">Team</a></li> --}}
         {{--  <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}
          <li><a href="#contact">Contact</a></li>
            <!-- Authentication Links -->
            @guest
                <li>
                    <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
               {{--  @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif --}}
            @else
                <li class=" dropdown">
                    <a id="navbarDropdown" class=" dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a href="{{route('home')}}" class="dropdown-item" style="color:#000 !important;">Dashboard</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" style="color:#000 !important;">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
      </nav><!-- .nav-menu -->

    {{--   <a href="#about" class="get-started-btn scrollto">Get Started</a>
 --}}
    </div>
  </header><!-- End Header -->

 