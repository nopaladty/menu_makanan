@extends('layouts.app')
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <title>Beranda | WAROENG NAUFAL</title>

    <style type="text/css">
        .box {
            background: white;
            width: 500px;
            height: 150px;
            border: 1px;
            padding: 50px;
            margin: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .duar {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        }

        .col-sm {
            text-align: center;
        }
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
      }

      td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
      }

      tr:nth-child(even) {
          background-color: #dddddd;
      }

      @media screen and (min-width: 300px) {
        /* .col {
            width: 100%;
            } */

            .box {
                background: white;
                width: 200px;
                height: 100px;
                border: 1px;
                padding: 10px 10px;
                margin: 20px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }

            img {
                width: 100%;
            }

            .carousel-inner {
                width: 100%;
            }

        /* .card {
            width: 50%;
            } */

        }

    </style>


    @section('content')
    <div class="container">
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        <span class="fa fa-info-circle fa-lg"></span> &nbsp;Selamat Datang {{Auth::user()->name}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
         </div>
        <div class="container mt-5">
            <div class="card mt-3 mb-5"> 
                
            </div>
          <div class="row">
            <div class="col-sm">
                <img src="{{url('image/banner.jpg')}}">
            </div>
            <div class="col-sm">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center"> Cara Order </h3>
                    </div>
                    <div class="card-body text-left">
                        <ul>
                            <li> Klik <strong>Produk </strong> Yang Ada Di Atas </li><br>
                            <li> Pilih Makanan Atau Minuman Yang Ingin Dibeli</li><br>
                            <li> Apabila sudah dipilih maka langsung ke halaman Checkout</li><br>
                            <li> Setelah Checkout, lalu membayar sesuai harga makanan / minuman </li><br>
                        </ul>               
                    </div>
                </div>
            </div>
        </div>
    </div>
    <center>
        <h2 class="text-center mt-5"> <b> Daftar Harga </b></h2>
        <table class="mt-2">
          <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga</th>
        </tr>
        @foreach($list as $produk)

        <tr>
            <td>{{$produk->nama}}</td>
            <td>{{$produk->deskripsi}}</td>
            <td>{{$produk->harga}}</td>
        </tr>   
        @endforeach

    </table>
</center>
<h2 class="text-center mt-5"> <b> Syarat & Ketentuan </b></h2>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <li>Order Produk Satu persatu dikarenakan kurangnya Pegawai didalam restoran </li>
        <li>Diharapkan menggunakan nama Asli</li>
        <li>Diharapkan Menggunakan alamat asli</li>
        <li>Maksimal Pembayaran 1 x 12 Jam</li>
    </div>
</div>


&nbsp;
<div class="container">
   <!--  <center>
        <div id="carouselExampleControls" class="carousel slide w-25 " data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{url('image/baso.jpg')}}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
              <img src="{{url('image/baso.jpg')}}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
              <img src="{{url('image/baso.jpg')}}" class="d-block w-100" alt="...">
          </div>
          <div class="card"> 
            <h1>pdwaplwdplwap</h1>
          </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</center> -->
</div>
   <!--  <div class="row">
    @foreach($list as $data)
        <div class="col-6 col-sm-4">
            <div class="card mt-5">
            @if($data->gambar)
                                <img src="{{url('image/'. $data->gambar)}}" alt="" class="w-100"/>
                                @else
                                <img src="{{url('image/default.png')}}" alt="" style="margin-right: 10px;" />
                                @endif
                    <p class="card-text ml-3" style="font-size: 30px">{{ $data->nama}}<p class="card-text ml-3" style="font-size: 20px">{{ $data->stok}}</p></p>
                    <a href="/home/cart/{{ $data->id }}" style="text-decoration: none; color: white;">
                    <button type="button" class="btn btn-primary btn-lg btn-block" >{{$data->harga}}</button></a>
                    
                </div>
            
        </div>
        @endforeach
       
    </div> -->
</div>


@endsection
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script> -->
