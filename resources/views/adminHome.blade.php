<title> HALAMAN ADMIN </title>
<body>
@extends('layouts.sidebar')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg">
            <img class="w-50" src="/image/chef.png">
        </div>
        <div class="col-md mt-5">
            <h1 class="mt-5">&nbsp; Selamat Datang
                {{ Auth::user()->name }} </h1>
        </div>
    </div>
</div>
</body>
@endsection
