<div class="col-md-6">
  <div class="well">

{!! Form::open() !!}

<h2>Edit Subcat Category</h2>
{!! form::label('subcat_name' , 'Name:') !!}

{!! form::text('subcat_name',$subcat->subcat_name    , [ 'id'=>'subcat_name' ,'class' => 'form-control'])!!}
{{form::label('maincat_id' , 'Category:') }}
  <select class="form-control" id="maincat_id" >
              <option value='{{$subcat->maincat_id }}' >{{$subcat->maincat_name }}</option>
              @foreach($maincats as $maincat)
              <option value='{{$maincat->id }}' >{{$maincat->maincat_name}}</option>
              @endforeach

  </select>

{!!form::button('Update Sub Category' , ['id' =>'update' , 'class'=>'btn btn-primary btn-block']) !!}
 {!!Form::close() !!}
  </div>
</div>


<script type="text/javascript">
$(function(){
$('#update').on('click' , function(){
var url = '{{route('subcat.update' , $subcat->id)}}'; 
var  token = $('input[name=_token]').val();
var maincat_id = $('#maincat_id').val();
var subcat_name = $('#subcat_name').val();
$.ajax({
url:url,
type:'PUT',
data: {  
   "_token": "{{ csrf_token() }}",
    maincat_id:maincat_id,
    subcat_name:subcat_name,
},
headers: {'X-CSRF-TOKEN': token},
success:function(res){
    $('#amr').html(res);
}






});
});
});
</script>

