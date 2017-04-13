@extends('partials.header')
@extends('partials.javascript')


<body>
<div class="container">
<nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}"><strong>DIGI</strong> Shop</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Track Order</a></li>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Signup</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">24x7 Support <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><strong>Call: </strong>+09-456-567-890</a></li>
                            <li><a href="#"><strong>Mail: </strong>info@yourdomain.com</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><strong>Address: </strong>
                                <div>
                                    234, New york Street,<br />
                                    Just Location, USA
                                </div>
                            </a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" id="search_value" autocomplete="off"  placeholder="Enter Keyword Here ..." class="form-control">

                    </div>
                    &nbsp;
                </form>

            </div>
            <!-- /.navbar-collapse -->

        </div>

        <!-- /.container-fluid -->
    </nav>
    <ul class="list-unstyled" id="search_item">

    </ul> 

                
       
        <!-- /.row -->
        <div class="row">
            <div class="col-md-3">
            @foreach($maincats as $maincat)
               <div>
                <a  href="{{route('mainitems' ,$maincat->id)}}" class="list-group-item active">{{$maincat->maincat_name}} </a>
                    <ul class="list-group">
                    @foreach($subcats as $subcat)
                    @if($maincat->id == $subcat->maincat_id)
                    <li class="list-group-item"><a href="{{route('subitems',$subcat->id)}}"> {{$subcat->subcat_name}}</a>
                     <span class="label label-success pull-right"></span>
                    </li>
                    @endif
                    @endforeach
                    </ul>
                </div>


              
           @endforeach

            </div>
            <!-- /.col -->
          
            @yield('content')
           

        </div>
    </div>
    

    <!--Footer -->
@extends('partials.footer')
    <!--Footer end -->
    <!--Core JavaScript file  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>
   <script type="text/javascript">
$(function(){
$('#search_value').keyup(function(){   
var search_value = $('#search_value').val();
var url = '{{route('search')}}' ;
var  token = $('input[name=_token]').val();
var data = {search_value:search_value};
$('#search_item').children('li').remove();
if (search_value == null || search_value ==''|| search_value ==' ') {

}else{
$.ajax({
url:url,
data:data,
type:'POST',
datatype:'JSON', 
headers: {'X-CSRF-TOKEN': token},
})
.done(function(search_reasults){
    jsondata = JSON.parse(search_reasults);
    console.log(jsondata);
    $.each(JSON.parse(search_reasults) , function(index , value){
        var li = $('<li></li>').css({
            color : 'white' ,
            background : 'green' ,
            padding : '10px'
        }).text(JSON.parse(search_reasults)[index].product_name);
        $('#search_item').append(li);
    })
})

}
});
});
   </script> 
</body>
</html>
