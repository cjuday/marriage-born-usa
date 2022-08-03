@extends('layouts.nav')
               @section('content')
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                          @foreach($userMoreInfo as $userMoreInfo)
                          @if(!is_null($userMoreInfo->image))
                            <img src="{{asset('images/'.$userMoreInfo->image)}}" style="border: outset;"  class="responsive">
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
                                        {{$userMoreInfo->name}}
                                    </h2>
                                    <h4 class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                      {{$userMoreInfo->occupation}}
                                    </h4>
                                             
     
                     @endforeach       
                      

                   @endsection
                     

                      @section('nav')  
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

