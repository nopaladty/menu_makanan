@extends('layouts.sidebar')

@section('content')
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    edit data
                </div>
                <div class="card-body">
                    <a href="/admin/produk" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    
 
                    <form method="post" action="/admin/produk/update/{{ $masakan->id }}"  enctype="multipart/form-data">
 
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>Gambar</label>
                            <img name="gambar" value=" {{ $masakan->gambar }}" src="{{url('image/'. $masakan->gambar)}}" style="width : 200px;">
                            <input type="file" class="uploads form-control" style="margin-top: 20px;" name="gambar"> 
 
                            @if($errors->has('nama'))
                                <div class="text-danger">
                                    {{ $errors->first('nama')}}
                                </div>
                            @endif
 
                        </div>
 
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Makanan" value=" {{ $masakan->nama }}">
 
                            @if($errors->has('nama'))
                                <div class="text-danger">
                                    {{ $errors->first('nama')}}
                                </div>
                            @endif
 
                        </div>

                       
 
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" placeholder="Masukan deskripsi" value=" {{ $masakan->deskripsi }}">
 
                             @if($errors->has('deskripsi'))
                                <div class="text-danger">
                                    {{ $errors->first('deskripsi')}}
                                </div>
                            @endif
 
                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <textarea name="harga" class="form-control" placeholder="Alamat pegawai .."> {{ $masakan->harga }} </textarea>
 
                             @if($errors->has('harga'))
                                <div class="text-danger">
                                    {{ $errors->first('harga')}}
                                </div>
                            @endif
 
                        </div>
 
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>
 
                    </form>
 
                </div>
            </div>
        </div>
    </body>
</html>
@endsection