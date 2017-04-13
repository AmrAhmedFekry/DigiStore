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
                        <li><a href="{{route('mainitems' ,$main->maincat_id)}}">{{$main->maincat_name}}</a></li>

                    </ol>
                </div>

@foreach($products as $product)
<div class="col-sm-6 col-md-4">
                        <div class="thumbnail product-box">
                           <image  src = '/images/{{$product->product_image}}' height="242" width="200" />

                            <div class="caption">
                                <h3><a href="#">{{$product->product_name}} </a></h3>
                                <p>Price : <strong>{{$product->product_price}} L.E</strong>  </p>
                                <p><a href="#">Ptional dismiss button </a></p>
                                <p>Ptional dismiss button in tional dismiss button in   </p>
                                <p><a href="#" class="btn btn-success" role="button">Add To Cart</a> <a href="{{route('getdetails',$product->id)}}" class="btn btn-primary" role="button">See Details</a></p>
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