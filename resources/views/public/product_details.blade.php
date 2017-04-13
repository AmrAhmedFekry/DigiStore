@extends('public.master')
@section('title')
{{$product->product_name}}
@endsection


@section('content')

<div class="row">
    <div class=" col-md-8">

                <div>
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a></li>
                    </ol>
                </div>

<div class="col-md-4 col-xs-12">
                        <div class="thumbnail product-box " style="height: 700px !important">
                           <image  src = '/images/{{$product->product_image}}' height="242" width="200" />

                            <div class="caption">
                                <h3><a href="#">{{$product->product_name}} </a></h3>
                                <p> {{$product->product_details}}   </p>

                                <p>Price : <strong>{{$product->product_price}} L.E</strong>  </p>
                            </div>
                        </div>
                    </div>
    </div>
</div>

@endsection