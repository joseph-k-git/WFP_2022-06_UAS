@extends('storefront.layout.frontend')

@section('title', 'Cart')

@section('content')

    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
        <?php
            $jumlah = 0;
            $total = 0;
        ?>
        @if(session('cart'))
        @foreach(session('cart') as $id => $details)
        <?php
            $quantity = $details['quantity'];
            $jumlah += $quantity;
            $total += $quantity * $details['price'];
        ?>
        <tr>
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-3 hidden-xs"><img height="50px" src="{{ asset('images/'.$details['photo']) }}" alt="..." class="img-responsive"/></div>
                    <div class="col-sm-9">
                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                    </div>
                </div>
            </td>
            <td data-th="Price">Rp{{ $details['price'] }}</td>
            <td data-th="Quantity">
                {{ $quantity }}
            </td>
            <td data-th="Subtotal" class="text-center">{{ $quantity * $details['price'] }}</td>
            <td class="actions" data-th="">
                <a href="/add-to-cart/{{ $details['id'] }}" class="btn btn-info btn-sm">+</button>
                <a href="/subtract-from-cart/{{ $details['id'] }}" class="btn btn-warning btn-sm">-</i></button>
            </td>
        </tr>
        @endforeach
        @endif
        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td colspan="3" style="align:right;">Total:</td>
            <td class="text-center"><strong>Rp{{ number_format($total, 0, ',', '.') }}</strong></td>
        </tr>
        <tr>
            <td><a href="{{ url('/home') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td><a href="" class="btn btn-danger">Confirm Checkout <i class="fa fa-angle-right"></i></a></td>
        </tr>
        </tfoot>
    </table>

@endsection