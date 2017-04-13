    


<div class="col-md-6">
  <div class="well">

{!! Form::open()!!}

<h2>New Sub Category</h2>
{!! form::label('subcat_name' , 'Name:') !!}

{!! form::text('subcat_name' , null , ['id'=>'subcat_name'  , 'class' => 'form-control'])!!}
{{form::label('maincat_id' , 'Category:') }}
  <select class="form-control" id="maincat_id" >
              @foreach($maincats as $maincat)
              <option value='{{$maincat->id }}' >{{$maincat->maincat_name}}</option>
              @endforeach

  </select>

{!!form::button('create new sub category' , ['id' =>'save' , 'class'=>'btn btn-primary btn-block']) !!}
 {!!Form::close() !!}
  </div>
</div>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>
<script type="text/javascript">
	$(function(){
    $('#save').click(function(){
     var subcat_name = $('#subcat_name').val();
     var maincat_id = $('#maincat_id').val();
     if (subcat_name && maincat_id) {
     	var url = '{{route('subcat.store')}}';
     	var data = {subcat_name:subcat_name ,maincat_id:maincat_id};
     	var  token = $('input[name=_token]').val();
     	$.ajax({
     		url:url,
     		data:data,
     		headers: {'X-CSRF-TOKEN': token},
     		type:'POST',
     		datatype:'JSON',
     		success:function(res){
     			$('#amr').html(res);
     		}







     	});



     }

    });





	});





</script>


