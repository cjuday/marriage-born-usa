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
                        <div class="profile-head">
                        <h2 class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                        {{$user->name}}
                                    </h2>
                                    <h4 class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                      {{$user->occupation}}
                                    </h4>
                   
@endsection
                     

                      @section('nav')          

                    <div class="col-md-6">
                                

                                <form method="POST" action="{{ route('user.basic') }}" style="margin-top: 8px;">

                                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    
                                        <div class="form-group">
        
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="name"  value="{{Auth::user()->name}}"  class="form-control">

    <label for="name">Name</label>
        <input type="email" name="email" placeholder="example@example.com"  value="{{Auth::user()->email}}"  class="form-control">
        <br/>

 <button class="btn btn-primary" name="submit" value="submit">Update Details</button>

                                </form>
                       
                            
                            </div>
                        </div>
                    </div>
   
 @endforeach 
@endsection

