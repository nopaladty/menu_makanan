@extends('layouts.app')
<?php $total = 0 ?>
@if(session('cart'))
@foreach(session('cart') as $id => $details)
<?php $total += $details['harga'] * $details['quantity'] ?>
@endforeach
@endif
@section('content')
<div class="container">
	<div class="card mt-5">
		<h1 style="font-size: 30px; text-align:center; margin-top: 20px;">TRANSFER</h1> 
		<div class="card-body">
			<h2 class="text-center"> Rp{{$total}}</h2>
			<h2 class="text-center"> BCA</h2>
			<h2 class="text-center"> 4310417250</h2>
			<h2 class="text-center">A/N Satria Yusuf Dwi Putra </h2>

		</div>
	</div>
	<div class="float-right">
		<a href="{{url('/confirm')}}" class="confirm btn btn-primary mt-3" data-id=" {{ $id }}"> Konfirmasi Pembayaran </a>
	</div>
</div>
<script type="text/javascript">
	$(".confirm").click(function (e) {
		e.preventDefault();
		var ele = $(this);
		if() {
			$.ajax({
				url: '{{ url('confirm') }}',
				method: "DELETE",
				data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
				success: function (response) {
					window.location.href = '/home';
				}
			});
		}
	});
</script>
@endsection