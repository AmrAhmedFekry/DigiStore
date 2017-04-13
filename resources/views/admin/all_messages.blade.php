 <div class="row">
    <div class="col-md-8">
        <h1>All Messages</h1>
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
                   <th>
                    Message
                   </th>
                  
                </tr>
            </thead>


            <tbody>
                @foreach($messages as $message)
                  <tr>
                    <th> {{$message->id}} </th>
                    <td> <p>{{ $message->name }} </p></td>
                     <td> <p>{{ $message->email }} </p></td>
                      <td> <p>{{ $message->message }} </p></td>



     

                   </tr>
                @endforeach


            </tbody>


          </table>
    </div>

