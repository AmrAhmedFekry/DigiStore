@extends('public.master')
@section('title')
Home      
@endsection


@section('content')
<div class="row">
    <div class=" col-md-8">

                <div>
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a></li>
                    </ol>
                </div>

@foreach($products as $product)
<div class="col-md-4 col-xs-12">
                        <div class="thumbnail product-box " style="height: 700px !important">
                           <image  src = '/images/{{$product->product_image}}' height="242" width="200" />

                            <div class="caption">
                                <h3><a href="#">{{$product->product_name}} </a></h3>
                                <p>Price : <strong>{{$product->product_price}} L.E</strong>  </p>
                                <p><a href="{{route('getdetails',$product->id)}}" class="btn btn-primary" role="button">See Details</a></p>
                            </div>
                        </div>
                    </div>

@endforeach
    </div>
</div>
 <div class="text-center">
                {!! $products->links();  !!}
            </div>
@endsection