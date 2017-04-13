<div class="col-md-6">
  <div class="well">

{!! Form::open(['data-parsley-validate'=>''] ) !!}


<h2>Edit Main Category</h2>
{!! form::label('maincat_name' , 'Name:') !!}

{!! form::text('maincat_name' , $maincat->maincat_name , ['class' => 'form-control' ,'required'=>'' ,'id'=>'maincat_name'])!!}

{!!form::button('update  category' , ['class'=>'btn btn-primary btn-block' , 'id'=>'update']) !!}
 {!!Form::close() !!}
  </div>
</div>


<script type="text/javascript">
	$(function(){
$('#update').on('click',function(){
var url = '{{route('maincat.update' , $maincat->id ) }}' ; 
var  token = $('input[name=_token]').val();
var maincat_name = $('#maincat_name').val();
if (maincat_name) {
$.ajax({
url:url,
type:'PUT',
data: {  
   "_token": "{{ csrf_token() }}",
    maincat_name:maincat_name,

},
headers: {'X-CSRF-TOKEN': token},
success:function(res){
    $('#amr').html(res);
}


});




}
});
});
</script>