<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body {
            margin: 0;
        }

        ul.topnav {
            list-style-type: none;
            margin: 0;
            padding: 10px 10px;
            overflow: hidden;
            background: linear-gradient(to right, #3498db, #6c5ce7);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            position: relative;
        }

        ul.topnav li {
            float: left;
        }

        ul.topnav li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        ul.topnav li a:hover {
            color: lightskyblue;
        }



        ul.topnav li.right {
            float: right;
        }

        @media screen and (max-width: 300px) {
            ul.topnav {
                padding: 5px 5px;
            }

            ul.topnav li.right {
                float: right;
            }

            ul.topnav li {
                float: none;
            }
        }

    </style>
</head>

<body>

    <ul class="topnav">
        @guest

        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

        @if (Route::has('register'))
        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>

        @endif
        @else
        <li><a class="active" href="/home"> Dashboard {{ Auth::user()->name }} </a></li>
        <li><a href="/admin/produk">LIST PRODUK</a></li>
        <li><a href="/admin/pengaturan">PENGATURAN </a></li>
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>

        </li>

    </ul>


    <main class="py-4">
        @yield('content')
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>


</body>

</html>
@endguest
