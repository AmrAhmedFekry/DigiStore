




<div class="col-md-6">
  <div class="well">

{!! Form::open(['files'=>true])!!}

<h2>New Product</h2>
{!! form::label('product_name' , 'Product Name:') !!}
{!! form::text('product_name' , null , ['class' => 'form-control'])!!}
<br/>

{!! form::label('product_price' , 'Product Price:') !!}
{!! form::number('product_price' , null , ['class' => 'form-control'])!!}
<br/>

{!! form::label('product_image' , 'Product Image:') !!}
{!! form::file('product_image' , null , ['class' => 'form-control'])!!}
<br/>

{{form::label('maincat_id' , 'Main Category:') }}
  <select id="main" class="form-control" name="maincat_id">
   <option id="first_one" value='' >Choose Main Category</option>
              @foreach($maincats as $maincat)
              <option value='{{$maincat->id }}' >{{$maincat->maincat_name}}</option>
              @endforeach

  </select>
<br/>

{{form::label('subcategory' , 'Sub Main Category:') }}

  <select class="form-control sub" id="subcategory" name="subcat_id">
   <option value='' > Choose Sub Category</option>

  </select>


<br/>
{!! form::label('product_tags' , 'Product tags:') !!}
{!! form::text('product_tags' , null, ['class' => 'form-control'  , 'id'=>'product_tags'])!!}
<br/>

{!! form::label('product_details' , 'Product details:') !!}
{!! form::textarea('product_details' , null , ['class' => 'form-control'])!!}
{!!form::button('create new product' , ['class'=>'btn btn-primary btn-block' , 'id'=>'save']) !!}
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
$(function(){
$('#save').click(function(){
var product_name = $('#product_name').val();
var product_price = $('#product_price').val();
var product_image = $('#product_image').val().split('\\').pop();
var maincat_category = $('#main').val();
var subcat_Category = $('.sub').val();
var product_details  =$('#product_details').val();
var product_tags  =$('#product_tags').val();


var formData = new FormData();
formData.append("product_name", product_name);
formData.append("product_price", product_price);
formData.append("product_image", $( '#product_image' )[0].files[0]);
formData.append("maincat_id", maincat_category);
formData.append("subcat_id", subcat_Category);
formData.append("product_details", product_details);
formData.append("product_tags", product_tags);



if (product_name && product_price && product_image && maincat_category && subcat_Category &&product_details) {
var url = '{{route('product.store')}}';
var data = {product_name:product_name,product_price:product_price,product_image:product_image,product_details:product_details};
var  token = $('input[name=_token]').val();

$.ajax({

url: url ,
  data:formData, 
  type:'POST',
  headers: {'X-CSRF-TOKEN': token},
  cache: false,
  processData: false,  
  contentType: false, 
  success:function(data){
    $('#amr').html(data);
  }

});




}





});






});










  });



</script>


