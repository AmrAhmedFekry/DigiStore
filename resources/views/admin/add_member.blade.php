<div class="row">
    	<div class="col-md-8 col-md-offset-2">
    		<h1>Create New Admin </h1>
    		<hr>
 {!! Form::open(['data-parsley-validate' => '' ]) !!}

{{form::label('name' , 'Name:')}}
{{form::text('name',null,array('class' => 'form-control'  , 'required'=>''  , 'minlength'=>'6'))}}

{{form::label('email' , 'Email:')}}
{{form::email('email',null,array('class' => 'form-control'  , 'required'=>'' ,'data-parsley-type'=>'email' ))}}

    {{ Form::label('password', "Password:") }}
	{{ Form::password('password', ['class' => 'form-control'  , 'required'=>'']) }}

    {{form::button('Add Admin' , array('class' => 'btn btn-success ' , 'id'=>'save'))}}
 
    {!! Form::close() !!}

    	</div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>
<script type="text/javascript">
    
    $(function(){
    $('#save').click(function(){
    var name  = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();
        var url = '{{route('member.store')}}';
        var data = {name:name , email:email , password:password};
        var  token = $('input[name=_token]').val();
        $.ajax({
        url:url,
        headers: {'X-CSRF-TOKEN': token},
        type:'POST',
        data:data,
        datatype: 'JSON',
        success:function(res){
        $('#amr').html(res);
        }


        });

    
    
    });
 


    });
</script>