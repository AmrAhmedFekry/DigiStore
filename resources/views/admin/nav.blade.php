 
@if(Auth::user()->is_manger == 1)
 <li class="active treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Admins control</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
  <li  id ="add_member" class="active"><a><i class="fa fa-circle-o"></i> Add Admin</a></li>
   <li id="all_admins"><a><i class="fa fa-circle-o"></i> All Admis </a></li>
          </ul>
        </li>

@endif
<li class="active treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Categories control</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
<li id="addmaincat" class="active"><a><i class="fa fa-circle-o"></i> Add Main Category</a></li>
  <li id="allmaincat"><a><i class="fa fa-circle-o"></i> All Main Categories </a></li>

  <li id="allsubcat"><a><i class="fa fa-circle-o"></i> All sub Categories </a></li>
   <li id="addsubcat" class="active"><a><i class="fa fa-circle-o"></i> Add sub Category</a></li>

          </ul>
        </li>
  <li class="active treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Products control</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
  <li id="addproduct" class="active"><a><i class="fa fa-circle-o"></i> Add Product</a></li>
  <li id="allprdouct"><a><i class="fa fa-circle-o"></i> All Products  </a></li>

          </ul>
        </li>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>

<script>
$(function(){
$('#add_member').click(function(){
url = '{{ route('member.create') }}'; 
$.ajax({
url: url, 
type:'GET',
success:function(res){
$('#amr').html(res);  
}
});
});

$('#all_admins').click(function(){
url = '{{route('member.index') }}',
$.ajax({
url : url,
type:'GET',
success:function(res){
  $('#amr').html(res);
}


});
});


$('#addmaincat').click(function(){
var url = '{{route('maincat.create') }}';
$.ajax({
url :url , 
type:'GET',
success:function(res){
  $('#amr').html(res);

}
});
});


$('#allmaincat').click(function(){
var url = '{{route('maincat.index')}}'; 
$.ajax({
url:url,
type:'GET',
success:function(res){
  $('#amr').html(res);
}
});
});

$('#allsubcat').click(function(){
var url='{{route('subcat.index')}}';
$.ajax({
url: url, 
type:'GET',
success:function(res){
$('#amr').html(res);
}

});
});

$('#addsubcat').click(function(){
var url = '{{route('subcat.create')}}';
$.ajax({
url:url,
type:'GET',

success:function(res){
$('#amr').html(res)

}
});
});

$('#allprdouct').click(function(){
var  url = '{{route('product.index')}}';
$.ajax({
url:url,
type:'GET',
success:function(res){
  $('#amr').html(res);
}


});


});

$('#addproduct').on('click' , function(){
var url = '{{ route('product.create') }}';
$.ajax({
url:url,
type:'GET',
success:function(res){
  $('#amr').html(res);

}



});

});



});

</script>
