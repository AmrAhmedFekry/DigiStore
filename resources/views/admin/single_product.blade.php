




<div class="col-md-6">
  <div class="well">

{!! Form::open(['files'=>true])!!}

<h2>Edit This Product</h2>
{!! form::label('product_name' , 'Product Name:') !!}
{!! form::text('product_name' , $product->product_name , ['class' => 'form-control' , 'id'=>'product_name'])!!}
<br/>

{!! form::label('product_price' , 'Product Price:') !!}
{!! form::number('product_price' , $product->product_price , ['class' => 'form-control' , 'id'=>'product_price'])!!}
<br/>

{!! form::label('product_image' , 'Product Image:') !!}
<image id="image"  src = '/images/{{$product->product_image}}'  height="80" width="80" />
{!! form::file('product_image' , ['class' => 'form-control' ,'id'=>'product_image' ])!!}

<br/>

{{form::label('maincat_id' , 'Main Category:') }}
  <select id="main" class="form-control" name="maincat_id">
   <option id="first_one" value='{{$product->product_maincat_id}}' >{{$product->maincat_name}}</option>
              @foreach($maincats as $maincat)
              <option value='{{$maincat->id }}' >{{$maincat->maincat_name}}</option>
              @endforeach

  </select>
<br/>

{{form::label('subcategory' , 'Sub Main Category:') }}

  <select class="form-control sub" id="subcategory" name="subcat_id">
   <option value='{{$product->product_subcat_id}}' > {{$product->subcat_name}}</option>

  </select>

<br/>
{!! form::label('product_tags' , 'Product tags:') !!}
{!! form::text('product_tags' , $product->product_tags, ['class' => 'form-control'  , 'id'=>'product_tags'])!!}
<br/>
{!! form::label('product_details' , 'Product details:') !!}
{!! form::textarea('product_details' , $product->product_details, ['class' => 'form-control'  , 'id'=>'product_details'])!!}
{!!form::button('update new product' , ['class'=>'btn btn-primary btn-block' , 'id'=>'update']) !!}
 {!!Form::close() !!}
  </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
  $(function(){
   $('#main').on('change',function(){

    var maincat_id = $(this).val();
    url = '{{ route('maincats') }}' ; 
    data = {maincat_id : maincat_id};
    token = $('input[name=_token]').val();
    
    $('#subcategory').empty();
    if(maincat_id){
      $.ajax({
      url: url ,
      headers: {'X-CSRF-TOKEN': token},
      data: data,
      type:'POST',
      datatype: 'JSON',
      success: function (resp){
        var result = JSON.parse(resp) ;
      $.each(result , function(index , value){
      $('#subcategory').append('<option  value="'+value.id+'" > '+value.subcat_name +' </option>');
      }); 



      }

      });

      

    }
   });

$('#update').on('click',function(){
var product_name = $('#product_name').val();
var product_price = $('#product_price').val();
var maincat_category = $('#main').val();
var subcat_Category = $('.sub').val();
var product_tags  =$('#product_tags').val();
var product_details  =$('#product_details').val();

var url = '{{route('product.update',$product->id)}}';
var data = {"_token": "{{ csrf_token() }}",
product_name:product_name,product_price:product_price,maincat_category:maincat_category,subcat_Category:subcat_Category,product_tags:product_tags,product_details:product_details,};
var  token = $('input[name=_token]').val();
$.ajax({
url:url,
data:data,
headers: {'X-CSRF-TOKEN': token},
type:'PUT',
success:function(res){
$('#amr').html(res);
}

});

});
});
</script>


