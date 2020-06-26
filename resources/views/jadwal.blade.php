@extends('layouts.landing')
@section('content')

<style type="text/css">
 body{
        background-color: black;
        background-size: cover;
        background-attachment: fixed;
 }

 .box {
        background-color: rgba(0, 0, 0, 0.4);
        color: white;
        width: 500px;
        height: 400px;
        border: 1;
        padding: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 6px 5px 0 rgba(0, 0, 0, 0.19);
        /* border-radius: 50px; */
    }
</style>

<body>
    <div class="container box mt-5">
        <div class="row">
            <div class="col-lg">
                <center>
                <h1 class="mt-4">JADWAL BUKA</h1>
                <br>
                <h2>Senin - Jum'at </h2>
                <h3 class="mt-3">08:00 - 21:00 </h3>
                <h2 class="mt-5">Sabtu - Minggu </h2>
                <h3 class="mt-3">07:00 - 23:59 </h3>

                </center>
            </div>
        </div>
    </div>

</body>

@endsection