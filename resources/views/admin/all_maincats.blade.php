    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif





     <div class="row">
    <div class="col-md-8">
        <h1>Categories</h1>
          <table class="table">
            <thead>
                
                <tr>
                    <th>
                        id
                    </th>
                   <th>
                    Name
                   </th>
                  
                </tr>
            </thead>


            <tbody>
                @foreach($maincats as $maincat)
                  <tr>
                    <th> {{$maincat->id	}} </th>
                    <td> <p>{{ $maincat->maincat_name }} </p></td>
<td> <p><a  class="edit btn btn-default btn-sm " url ="{{route('maincat.edit' ,$maincat->id )}}"  > Edit</a> </p></td>
<td><td> <p> <a class="Delete btn btn-danger btn-sm" url="{{route('maincat.destroy' ,$maincat->id )}}" > Delete </a> </p> </td> </td>


                   </tr>
                @endforeach


            </tbody>


          </table>
    </div>





<script type="text/javascript">
  $(function(){
$('.edit').on('click' , function(){
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

$('.Delete').on('click' , function(){
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
});
</script>