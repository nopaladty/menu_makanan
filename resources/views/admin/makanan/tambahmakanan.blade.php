@extends('layouts.sidebar')

@section('content')
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                   TAMBAH MAKANAN
                </div>
                <div class="card-body">
                    
                    <br/>
                    <br/>
                    
                    <form method="post" action="/admin/produk/tambah/proses" enctype="multipart/form-data">
 
                        {{ csrf_field() }}
                        <div class="form-group">
                            <h3>MASUKAN GAMBAR UKURAN 600 x 400</h3>
                            <img width="600px" height="400px" alt="MASUKAN GAMBAR"/>
                            <div class="col-md-5">
                                <input type="file" class="uploads" style="margin-top: 20px;" name="gambar" onchange="previewFile()">
                            </div>  
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama">
 
                            @if($errors->has('nama'))
                                <div class="text-danger">
                                    {{ $errors->first('nama')}}
                                </div>
                            @endif
 
                        </div>
 
                       <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" placeholder="deskripsi">
 
                            @if($errors->has('deskripsi'))
                                <div class="text-danger">
                                    {{ $errors->first('deskripsi')}}
                                </div>
                            @endif
 
                        </div>

                         <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="harga" class="form-control" placeholder="Harga">
 
                            @if($errors->has('harga'))
                                <div class="text-danger">
                                    {{ $errors->first('harga')}}
                                </div>
                            @endif
 
                        </div>
 
                        <div class="form-group mt-5">
                            <input type="submit" class="btn btn-success float-right" value="Simpan">
                            <a href="/admin/produk" class="btn btn-primary float-left">Kembali</a>
                        </div>
 
                    </form>
 
                </div>
            </div>
        </div>
        <script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>

    <script type="text/javascript">
      function previewFile() {
     var preview = document.querySelector('img');
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.addEventListener("load", function () {
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
}
        </script>
@endsection