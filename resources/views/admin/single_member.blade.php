    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h1>Create New Admin </h1>
        <hr>
{!! Form::open(['data-parsley-validate'=>''] ) !!}

{{form::label('name' , 'Name:')}}
{{form::text('name',$member->name,array('id'=>'name' , 'class' => 'form-control'  , 'required'=>''  , 'minlength'=>'6'))}}

{{form::label('email' , 'Email:')}}
{{form::email('email',$member->email,array('id'=>'email' ,'class' => 'form-control'  , 'required'=>'' ,'data-parsley-type'=>'email' ))}}

    {{ Form::label('password', "Password:") }}
  {{ Form::password('password',  ['id'=>'password' ,'class' => 'form-control'  , 'required'=>'']) }}

    {{form::button('Update' , array('class' => 'btn btn-success btn-block ' , 'id'=>'update'))}}
 
    {!! Form::close() !!}

      </div>
    </div>



<script type="text/javascript">
$(function(){
$('#update' ).click(function(){
var url = '{{route('member.update' , $member->id)}}' ; 
var  token = $('input[name=_token]').val();
var name = $('#name').val();
var password = $('#password').val();
var email = $('#email').val();

if (name && password && email) {
  $.ajax({
url:url,
type:'PUT',
data: {  
   "_token": "{{ csrf_token() }}",
   name:name,
   password:password,
   email:email

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