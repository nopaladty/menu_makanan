<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"> -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <link rel="shortcut icon" href="image/logo.png">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <b> WAROENG NAUFAL</b>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/home">Beranda <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item"> 
                            <a href="/produk" class="nav-link"> Produk</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Pengaturan
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="/pengaturan/{{Auth::user()->id}}">Pengaturan</a>
                              <a class="dropdown-item" href="/ganti-katasandi">Ubah Password</a>
                          </div>
                      </li>
                  </ul>

                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto">
                   <div class="dropdown mr-3">
                    <button type="button" class="btn btn-info" data-toggle="dropdown">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                    </button>
                    <div class="dropdown-menu">
                        <div class="row total-header-section">
                            <div class="col-lg-6 col-sm-6 col-6">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                            </div>

                            <?php $total = 0 ?>
                            @foreach((array) session('cart') as $id => $details)
                            <?php $total += $details['harga'] * $details['quantity'] ?>
                            @endforeach

                            <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                <p>Total: <span class="text-info">Rp{{ $total }}</span></p>
                            </div>
                        </div>

                        @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                        <div class="row cart-detail">
                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                <p>{{ $details['nama'] }}</p>
                                <span class="price text-info">Rp {{ $details['harga'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                <a href="{{ url('cart') }}" class="btn btn-primary btn-block">View all</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else


                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
</body>
</html>
