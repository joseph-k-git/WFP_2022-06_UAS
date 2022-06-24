@extends('storefront.layout.frontend')

@section('title', 'Products')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="container products">

        <div class="row">
            
            @foreach($products as $p)
            <div class="col-xs-18 col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="{{ asset('images/'.$p->image) }}" alt="">
                    <div class="caption">
                        <h4>{{ $p->generic_name }} ({{ $p->form }})</h4>
                        <p>formula: {{ $p->restriction_formula }}</p>
                        <p>{{ $p->description }}</p>
                        <p><strong>Price: </strong> Rp{{ $p->price }}</p>
                        <p class="btn-holder"><a href="{{ url('add-to-cart/'.$p->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                    </div>
                </div>
            </div>
            @endforeach

        </div><!-- End row -->

    </div>

@endsection