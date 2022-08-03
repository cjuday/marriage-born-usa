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

                    <div class="col-md-6">
                                

                                <form method="POST" action="{{ route('user.contact') }}" style="margin-top: 8px;">


                                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                     
                                      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                                    
                                        <div class="form-group">
        
        <label for="City">Contact Number</label>
        <input type="text" name="City" placeholder="Your Current Contact Number"  value="{{$user->contact}}"  class="form-control">

    </div>
    
<br>
 <button class="btn btn-primary" name="submit" value="submit">Update Profile</button>

                                </form>
                        </div>
                    </div>
   
 @endforeach 
@endsection

