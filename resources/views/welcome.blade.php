@extends('layouts.landing')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <title>RESTO KHAS CIBOGS</title> -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>
<style type="text/css">
    body {
        background-image: url(/image/pw.jpg);
        background-size: cover;
        background-attachment: fixed;
    }

    .login {
        background-color: rgba(0, 0, 0, 0.4);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .box {
        background-color: rgba(0, 0, 0, 0.4);
        color: white;
        width: 100px;
        height: 100px;
        border: 1px;
        padding: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 6px 5px 0 rgba(0, 0, 0, 0.19);
        border-radius: 50px;
    }

    .boxabout {
        background-color: rgba(0, 0, 0, 0.4);
        color: white;
        width: 100px;
        height: 200px;
        border: 1px;
        padding: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 6px 5px 0 rgba(0, 0, 0, 0.19);
        border-radius: 80px;
    }

    .box a {
        text-decoration: none;
        color: white;
        font-size: 30px;
    }


    .img {

        border: 2px solid white;
        margin-top: 50px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

</style>

<body>
    @section('content')




    <div class="container mt-5">
        <center>
            <div class=" mb-5">
                <h1 style="color: white">WAROENG NAUFAL</h1>
            </div>
            <div class="row">
                <div class="col-sm box mt-5">
                    <h3 class="mt-3">
                         <a href="/menu"> <span class="fa fa-book-open"></span> &nbsp;DAFTAR MENU </a> </h3>
                </div>
                &nbsp; &nbsp;
                <div class="col-sm box mt-5 ">
                    <h3 class="mt-3"><a href="/jadwal"> <span class="fa fa-clipboard-list"></span> &nbsp; JADWAL BUKA</a> </h3>
                </div>

            </div>
            <div class="col-lg mt-5 boxabout">
                <h4 class="mt-3" style="color: white"> <span class="fa fa-info-circle"></span> TENTANG WAROENG NAUFAL </h4>
                <br>
                <div class="container pd-5">
                    <p  style="color:white;">Waroeng Naufal Merupakan Layanan Reservasi Restoran berbasis online yang berplatform di
                        Website.<br>
                        Layanan ini dapat memudahkan, karena dapat di akses kapan aja dan dimana aja.
                    </p>
                </div>
            </div>

        </center>
    </div>
    <br>
    <br>
    <br>

    </div>
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

<script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>

    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
    @endsection
</body>

</html>
