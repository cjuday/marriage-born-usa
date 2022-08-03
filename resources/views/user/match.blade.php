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

@endforeach 
                   
@endsection
                     

                      @section('nav')          

                                 @if ($message = Session::get('success'))
                          <div class="alert alert-success alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                           </div>
                                @endif

<div class="col-md-6">
                                       @foreach($match as $match)  
                                       <div class="card shadow mb-4">
                                           <div class="card-body">
                                           <div class="text-sm font-weight-bold text-dark text-uppercase mb-1">Name</div>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$match->name}}</div>
                                            <br/>
                                            <div class="text-sm font-weight-bold text-dark text-uppercase mb-1">Age</div>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$match->age}}</div>
                                            <br/>
                                            <a class="btn btn-primary" href="{{route('user.viewprof',['id'=>$match->id])}}">View Profile</a>
                                           </div>
                                       </div>
                                        @endforeach  
                              
                            
                            </div>
   </div>
 
@endsection

