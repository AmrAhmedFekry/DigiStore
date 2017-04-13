

     <div class="row">
    <div class="col-md-8">
        <h1>All Products</h1>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
          <table class="table">
            <thead>
                
                <tr>
                    <th>
                        id
                    </th>
                   <th>
                    Product Name
                   </th>
                    <th>
                    Product Price
                   </th>
                   <th>
                    Product image
                   </th>
                   <th>
                    Product MainCategory
                   </th>
                   <th>
                    Product SubCategory
                   </th>
                    <th>
                    Product Details
                   </th>
                  <th>
                    Product Tags
                   </th>

                  
                </tr>
            </thead>


            <tbody>
        @foreach($products as $product)
                  <tr>
              <td>{{$product->id}}</td>
              <td>{{substr($product->product_name, 0,20)}}</td>
              <td>{{$product->product_price}}</td>
              <td><image  src = '/images/{{$product->product_image}}'  height="120" width="120" /></td>
              <td>{{$product->maincat_name}}</td>
              <td >{{$product->subcat_name}}</td>
              <td>{{substr($product->product_details , 0,20)}}</td>
              <td >{{$product->product_tags}}</td>


<td> <p><a  class="edit btn btn-default btn-sm " url ="{{route('product.edit' ,$product->id )}}"  > Edit</a> </p></td>
<td><td> <p> <a class="Delete btn btn-danger btn-sm" url="{{route('product.destroy' ,$product->id )}}" > Delete </a> </p> </td> </td>

           

                   </tr>
          @endforeach


            </tbody>


          </table>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
</script>
<script type="text/javascript">
 $(function(){
$('.Delete').on('click',function(){
var url = $(this).attr('url');
var  token = $('input[name=_token]').val();
$.ajax({
url:url,
type:'DELETE',
data: {  
   "_token": "{{ csrf_token() }}",
},
headers: {'X-CSRF-TOKEN': token},
success:function(res){
    $('#amr').html(res);
}


});

 });


$('.edit').on('click',function(){
var url = $(this).attr('url');
var  token = $('input[name=_token]').val();
$.ajax({
url:url,
type:'GET',
data: {  
   "_token": "{{ csrf_token() }}",
},
success:function(res){
    $('#amr').html(res);
}





});

});
});
</script>