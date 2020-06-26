<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>WAROENG NAUFAL</title>
    <style>
        body {
            margin: 0;
        }

        ul.topnav {
            list-style-type: none;
            margin: 0;
            padding: 10px 10px;
            overflow: hidden;
            background: transparent;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
    <ul class="topnav ml-5">
        @if (Route::has('login'))
        @auth
        <li> <a href="{{ url('/home') }}">HOME</a> </li>
        @else
        <li> <a href="{{ route('login') }}"><span class="fa fa-sign-in-alt"></span> LOGIN </a> </li>
        @if (Route::has('register'))
        <li> <a href="{{ route('register') }}"><span class="fa fa-user-plus"></span> REGISTER</a></li>
        @endif

        @endauth
        @endif

    </ul>


    <main class="py-2">
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
