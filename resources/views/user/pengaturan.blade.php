@extends('layouts.app')
<title> Pengaturan| {{ Auth::user()->name }}</title>

@section('content')

<br>

<?php if(Session::has('simpan')): ?>
	<div class="message message-success">
		<span class="close"></span>
		<?php echo Session::get('simpan') ?>
	</div>
<?php endif; ?>

<div class="row justify-content-center">
	<div class="col-11 mt-2 ml-3">
		<form action="/pengaturan/update/{{ Auth::user()->id }}" method="post" enctype="multipart/form-data">
			<h3>
				<span class="fa fa-user-cog"></span>
				Pengaturan Akun
			</h3>

			<br>

			{{ csrf_field() }}
			{{ method_field('PUT') }}

			<div class="card bg-light">
				<div class="card-body">

					<div class="form-group row">
						<label for="name" class="ml-1 col-md-3 col-form-label text-md-left">Nama</label>
						<div class="col-md-6">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<span class="fa fa-user text-primary"></span>
									</span>
								</div>
								<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

								@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

					</div>

					<div class="form-group row">
						<label for="email" class="ml-1 col-md-3 col-form-label text-md-left">Email</label>

						<div class="col-md-6">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<span class="fa fa-envelope text-primary"></span>
									</span>
								</div>
								<input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email" autofocus readonly="" style="cursor: not-allowed;">

								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
					</div>

					<div class="form-group row">
						<label for="alamat" class="ml-1 col-md-3 col-form-label text-md-left">Alamat</label>

						<div class="col-md-6">
							<textarea name="alamat" cols="10" rows="3" class="form-control @error('alamat') is-invalid @enderror" autofocus required autocomplete="alamat">{{ Auth::user()->alamat }}</textarea>

							@error('alamat')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="no_hp" class="ml-1 col-md-3 col-form-label text-md-left">No Handphone</label>
						<div class="col-md-6">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text text-primary">+62</span>
								</div>
								<input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ Auth::user()->no_hp }}" required autocomplete="no_hp" autofocus onkeypress="return hanyaAngka(event)">
								@error('no_hp')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
					</div>

			
					<div class="form-group">
						<!-- <a href="/operator" class="btn btn-light">Kembali</a> -->
						<button class="btn btn-success float-right" id="btn-five" type="submit">
							<span class="fa fa-save fa-sm"></span> Simpan
						</button>
					</div>

				</div>
			</div>
		</form>
	</div>
</div>

@endsection