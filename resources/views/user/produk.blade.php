@extends('layouts.app')
<title>Produk | Waroeng Naufal</title>

@section('content')
<div class="container">
	<form class="form-inline" action="{{route('cari')}}">
		<label><h4 class="mr-3">Cari Produk</h4></label>
		<input class="form-control mr-sm-2" name="cari" type="search" placeholder="Search" aria-label="Search">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	</form>
 <div class="row">
    @foreach($list as $data)
    <div class="col-6 col-sm-4">
        <div class="card mt-5">
            @if($data->gambar)
            <img src="{{url('image/'. $data->gambar)}}" alt="" class="w-100"/>
            @else
            <img src="{{url('image/default.png')}}" alt="" style="margin-right: 10px;" />
            @endif
            <p class="card-text ml-3 mt-2" style="font-size: 30px">{{ $data->nama}}
                <p class="card-text ml-3" style="font-size: 20px">{{ $data->deskripsi}}</p>
                <p class="card-text ml-3" style="font-size: 20px">Harga: {{ $data->harga}}</p>

            </p>
            <a href="{{ url('cart/'.$data->id) }}" style="text-decoration: none; color: white;">
                <button type="button" class="btn btn-primary btn-lg btn-block" >Tambahkan Ke  <i class="fa fa-shopping-cart" aria-hidden="true"></i></button></a>

            </div>
            
        </div>
        @endforeach
       <!--  -->

    </div>
</div>
@endsection