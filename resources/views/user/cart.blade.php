@extends('layouts.app')
<title>Checkout</title>

@section('content')
<div class="container">
    <div class="card mt-5">
        <h1 style="font-size: 30px; text-align:center; margin-top: 20px;">CHECKOUT</h1> 
        <div class="card-body">
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="width:50%">PRODUK</th>
                        <th style="width:10%">HARGA</th>
                        <th style="width:8%">JUMLAH</th>
                        <th style="width:22%" class="text-center">TOTAL</th>
                        <th style="width:10%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0 ?>

                    @if(session('cart'))
                    @foreach(session('cart') as $id => $details)

                    <?php $total += $details['harga'] * $details['quantity'] ?>

                    <tr>
                        <td> 
                            <div> 
                                <h4>{{$details['nama']}}</h4>
                            </div>
                        </td>
                        <td> 
                            Rp{{$details['harga']}}
                        </td>
                        <td> 
                            {{$details['quantity']}}
                        </td>
                        <td data-th="TOTAL" class="text-center">Rp{{ $details['harga'] * $details['quantity'] }}</td>
                        <td class="actions" data-th="">
                        <a class="btn btn-danger btn-sm remove-from-cart" href="remove-from-cart" data-id="{{ $id }}"><span class="fa fa-trash"></span></a>
                    </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="hidden-xs"></td>
                        <td class="hidden-xs text-center"><strong>Total Rp{{ $total }}</strong></td>
                    </tr>
                    <tr>
                        
                        @if($total == '')
                        <td>&nbsp;</td>
                        <td colspan="2" class="hidden-xs"></td>
                        <td class="hidden-xs"><a href="{{url('/produk')}}" class="btn btn-primary"> Belanja dulu </a></td>
                        @else
                        <td><a href="{{ url('/produk') }}" class="btn btn-warning"> Lanjutkan Belanja</a></td>
                        <td colspan="2" class="hidden-xs"></td>
                        <td class="hidden-xs text-center"><a href="{{url('/checkout')}}" class="btn btn-primary"> Checkout </a></td>
                        @endif
                    </tr>
                </tfoot>

            </table>                   

        </div>
    </div>
</div>
<script type="text/javascript">

    $(".update-cart").click(function (e) {
     e.preventDefault();

     var ele = $(this);

     $.ajax({
         url: '{{ url('update-cart') }}',
         method: "patch",
         data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
         success: function (response) {
             window.location.reload();
         }
     });
 });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Apakah Kamu Ingin Menghapus Produk Tersebut?")) {
            $.ajax({
                url: '{{ url('remove-from-cart') }}',
                method: "DELETE",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>
@endsection