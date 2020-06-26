@extends('layouts.app')
<title>Form pembayaran</title>
@section('content')
<?php $total = 0 ?>
@if(session('cart'))
@foreach(session('cart') as $id => $details)
<?php $total += $details['harga'] * $details['quantity'] ?>
@endforeach
@endif
<div class="container">
	<div class="card mt-5">
		<h1 style="font-size: 30px; text-align:center; margin-top: 20px;">PEMBAYARAN</h1> 
		<div class="card-body">
			<form method="post" action="/berhasil" enctype="multipart/form-data">

				{{ csrf_field() }}
				<p class="text-danger"> *Masukan data dengan benar dan Lengkap !!</p>
				<div class="form-group">
					<label>Nama Rekening	</label>
					<input type="text" name="nama_rekening" class="form-control" placeholder="Nama Rekening">

					@if($errors->has('nama'))
					<div class="text-danger">
						{{ $errors->first('nama')}}
					</div>
					@endif
				</div>
				<div class="form-group">
					<label>Nomor Rekening</label>
					<input type="number" name="nomor_rekening" class="form-control" placeholder="Nomor Rekening">
					@if($errors->has('nomorrekening'))
					<div class="text-danger">
						{{ $errors->first('nomorrekening')}}
					</div>
					@endif
				</div>
				<div class="form-group">
					<label>BANK</label>
					<select class="form-control" name="bank">
						<option></option>
						<option>BCA</option>
						<option>BRI</option>
						<option>BNI</option>
						<option>MEGA</option>
						<option>BSM</option>
						<option>MANDIRI</option>
						<option>OVO</option>
						<option>DANA</option>
					</select>
					@if($errors->has('bank'))
					<div class="text-danger">
						{{ $errors->first('bank')}}
					</div>
					@endif
				</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="alamat">{{Auth::user()->alamat}} </textarea>
					</div>
					<div class="form-group">
						<label>TOTAL</label>
						<input type="number" name="total" class="form-control" readonly="" value="{{$total}}">
					</div>
					<div class="form-group mt-5">
						<input type="submit" class="btn btn-success float-right" value="Bayar Sekarang">
						<a href="/cart" class="btn btn-primary float-left">Kembali</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	@endsection