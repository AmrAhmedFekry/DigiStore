
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


 <div class="row">
    <div class="col-md-8">
        <h1>All Admins</h1>
          <table class="table">
            <thead>
                
                <tr>
                    <th>
                        id
                    </th>
                   <th>
                    Name
                   </th>
                   <th>
                    email
                   </th>
                  
                </tr>
            </thead>


            <tbody>
                @foreach($members as $member)
                  <tr>
                    <th> {{$member->id}} </th>
                    <td> <p>{{ $member->name }} </p></td>
                     <td> <p>{{ $member->email }} </p></td>
<td> 
<p>
<a url = "{{route('member.edit' , $member->id)}}"  class="Edit btn btn-default btn-sm"  > Edit </a> 

</p>
</td>

<td>
<td> 
<p>
<a  url="{{route('member.destroy' , $member->id)}}" class="Delete btn btn-danger btn-sm"> Delete </a> 
</p>
</td>
</td>


                   </tr>
                @endforeach


            </tbody>


          </table>
    </div>

<script type="text/javascript">
  $(function(){
$('.Delete').on('click' , function(){
var url = $(this).attr('url');
var  token = $('input[name=_token]').val();
$.ajax({
url:url,
type: "DELETE",
data: {  
   "_token": "{{ csrf_token() }}",
},
headers: {'X-CSRF-TOKEN': token},
success:function(res){
    $('#amr').html(res);
}


});


});


$('.Edit').on('click' , function(){
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