@extends('layouts.nav')
               @section('content')
   
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img" >
                          @foreach($user as $user)
                          
                            @if(!is_null($user->image))
                            <img src="{{asset('images/'.$user->image)}}" style="border: outset;"  class="responsive">
                            @else
                            <img src="{{asset('images/blank.png')}}" style="border: outset;"  class="responsive lg">
                            @endif
                            <div class="file btn btn-lg btn-primary">
                             <a href="{{route('user.photo')}}" style="color: white">Change Photo</a>
                                
                            </div>
                        </div>
                    </div>
              
                    <div class="col-md-6">
                        <div class="profile-head" >
                                    <h2 class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                        {{$user->name}}
                                    </h2>
                                    <h4 class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                      {{$user->occupation}}
                                    </h4>
@endsection
                     

                      @section('nav')          

                                

 
                    <div class="col-md-6" >
                    @if (Session::has('success'))
                          <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ Session::get('success') }}</strong>
                           </div>
                                @endif
                                @if (Session::has('error'))
                          <div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ Session::get('error') }}</strong>
                           </div>
                                @endif

                                <form method="post" action="{{route('user.verifyfile')}}" enctype="multipart/form-data" style="margin-top: 8px;">
@csrf
   

     <div class="form-group">
     <label for="image">Document Type:</label><br/>
     <input type="text" class="form-control" name="type" Placeholder="E.g. Passport" >
     </div>


  <div class="form-group">
        
        <label for="image">Upload File/Image:</label><br/>
        <input type="file" name="image" >

    </div>

    <button class="btn btn-primary name="submit" value="submit">Submit for verification</button>


    </form> <!--end of pulle-left-->


                            </div>
                        </div>
                    </div>
 @endforeach 
@endsection

