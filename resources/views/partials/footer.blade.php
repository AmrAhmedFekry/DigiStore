 <div class="col-md-12 footer-box">
        <div class="row">
            <div class="col-md-4">
                <h1 id="result">Send a Quick Query </h1>
                <hr>

{!! Form::open(['data-parsley-validate' => '']) !!}
               <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
{{ Form::text('name' , null , array('class'=>'form-control' ,'placeholder'=>'Name' , 'required'=>'' , 'maxlength'=>'50' , 'id'=>'name')) }}
                            </div>
                        </div>
            <div class="col-md-6 col-sm-6">
                            <div class="form-group">
{{form::text('email' , null ,array('class'=>'form-control' , 'placeholder'=>'Email address' ,'required'=>'' ,'data-parsley-type'=>'email' , 'id'=>'email'))}}
                            </div>
                        </div>
                    </div>
                        <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
{{form::textarea('message' ,null ,array('class'=>'form-control' , 'placeholder'=>'Message' ,'rows'=>'3' , 'required'=>'' , 'id'=>'message'))}}
                            </div>
                            <div class="form-group">
{{form::button('Submit Request' , array('class'=>'btn btn-primary' , 'id'=>'submit'))}}
                            </div>
                        </div>
                    </div>
               {!! Form::close() !!}
            </div>

            <div class="col-md-4">
                <h1>Our Location</h1>
                <hr>
                <p>
                     234, New york Street,<br />
                                    Just Location, USA<br />
                    Call: +09-456-567-890<br>
                    Email: info@yourdomain.com<br>
                </p>

                2014 www.yourdomain.com | All Right Reserved
            </div>
            <div class="col-md-4 social-box">
                <h1>We are Social </h1>
                <hr>
                <a href="#"><i class="fa fa-facebook-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-twitter-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-google-plus-square fa-3x c"></i></a>
                <a href="#"><i class="fa fa-linkedin-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-pinterest-square fa-3x "></i></a>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nec nisl odio. Mauris vehicula at nunc id posuere. Curabitur nec nisl odio. Mauris vehicula at nunc id posuere. 
                </p>
            </div>
        </div>
        <hr>
    </div>
    <!-- /.col -->
    <div class="col-md-12 end-box ">
        &copy; 2014 | &nbsp; All Rights Reserved | &nbsp; www.yourdomain.com | &nbsp; 24x7 support | &nbsp; Email us: info@yourdomain.com
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
</script>
<script type="text/javascript">
    $(function(){
        function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
};

        $("#submit").click(function(){

           var name = $('#name').val();
           var message = $('#message').val();
           var email = $('#email').val();

           if (isValidEmailAddress(email)) {
           if (name && message) {

             var url = '{{route('message.store')}}' ;
             var  data = {name:name , message:message , email:email};

             token = $('input[name=_token]').val();
             $.ajax({
             url: url ,
             headers: {'X-CSRF-TOKEN': token},
             type:'POST',
             data:data,
             datatype: 'JSON',
             
             success:function(res){
            $('#result').replaceWith("Your Request is send , we will mail you soon");
             }

             });











           }
           }
          


        });
    

    });

</script>