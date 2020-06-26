@extends('layouts.app')
<title>MAKANAN | WAROENG NAUFAL</title>
@section('content')

<div class="container">
    <div class="row">
        @foreach($list as $data)
        <div class="col-6 col-sm-4">
            <div class="card mt-5">
                @if($data->gambar)
                <img src="{{url('image/'. $data->gambar)}}" alt="" class="w-100"/>
                @else
                <img src="{{url('image/default.png')}}" alt="" style="margin-right: 10px;" />
                @endif



                <p class="card-text ml-3" style="font-size: 30px">{{ $data->nama}}<p class="card-text ml-3" style="font-size: 20px">{{ $data->deskripsi}}</p></p>
                <button type="button" class="btn btn-primary btn-lg btn-block">{{$data->harga}}</button>

            </div>
            
        </div>
        @endforeach
    </div>
</div>
@if(count($list) == ' ' )

<div class="container">
    <h3 class="text-center"> MAAF PRODUK TIDAK DITEMUKAN <br>
        <a href="{{url('/produk')}}" class="btn btn-outline-primary mt-2 float-right"> Kembali</a>
        
    </h3>
</div>
@endif

@endsection