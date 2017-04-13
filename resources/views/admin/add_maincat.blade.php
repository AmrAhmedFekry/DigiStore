    


<div class="col-md-6">
  <div class="well">

{!! Form::open()!!}
<h2>New Main Category</h2>
{!! form::label('maincat_name' , 'Name:') !!}
{!! form::text('maincat_name' , null , ['class' => 'form-control'])!!}

{!!form::button('create new category' , ['class'=>'btn btn-primary btn-block','id'=>'save' ]) !!}
 {!!Form::close() !!}
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>

<script type="text/javascript">
$(function(){

$('#save').click(function(){
var maincat_name = $('#maincat_name').val();
if (maincat_name) {
var url  = '{{route('maincat.store')}}' ;
var data = {maincat_name:maincat_name} ;
var  token = $('input[name=_token]').val();
$.ajax({
	url: url ,
	data:data, 
	type:'POST',
	headers: {'X-CSRF-TOKEN': token},
	datatype:'JSON', 
	success:function(res){
		$('#amr').html(res);
	}





});


}






});



















});
	
</script>
