@extends('layouts.sidebar')

@section('content')
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <title>List</title>
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
            </div>
            <div class="card-body">
                <a href="/admin/produk/tambah" class="btn btn-primary">Tambah Produk Baru</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr> 
                            <th>FOTO </th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Harga </th>
                            <th>Opsi </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $p)
                        <tr>
                            <td>
                                @if($p->gambar)
                                <img src="{{url('image/'. $p->gambar)}}" alt="" style="margin-right: 10px;
                                width: 150px;" />
                                @else
                                <img src="{{url('image/default.png')}}" alt="" style="margin-right: 10px;" />
                                @endif
                            </td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->deskripsi }}</td>
                            <td>{{ $p->harga }}</td>
                            <td>
                                <a href="/admin/produk/edit/{{ $p->id }}" class="btn btn-warning">Edit</a>
                                <a href="/admin/produk/hapus/{{ $p->id }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
@endsection
