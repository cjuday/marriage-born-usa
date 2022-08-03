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
                                       @foreach($x as $match)  
                                       @if($match->uby==Auth::id() && $match->uto!=Auth::id())
                                        <div class="card shadow mb-4 row col-md-8">
                                           <div class="card-body">
                                                <i class="fas fa-bell"></i> <a href="{{route('user.viewprof',['id'=>$match->uto])}}">{{get_unm($match->uto)}}</a> 
                                                <br/>
                                                Unread Messages: {{unread_count($match->uto, $match->uby)}}
                                                <br/>
                                                <a href="{{route('user.sendmsg',['id'=>$match->uto])}}" class="btn btn-primary">Messages</a>
                                           </div>
                                        </div>
                                      @elseif($match->uby!=Auth::id() && $match->uto==Auth::id())
                                      <div class="card shadow mb-4 row col-md-8">
                                           <div class="card-body">
                                                <i class="fas fa-bell"></i> <a href="{{route('user.viewprof',['id'=>$match->uby])}}">{{get_unm($match->uby)}}</a> 
                                                <br/>
                                                Unread Messages: {{unread_count($match->uby, $match->uto)}}
                                                <br/>
                                                <a href="{{route('user.sendmsg',['id'=>$match->uby])}}" class="btn btn-primary">Messages</a>
                                           </div>
                                        </div>
                                      @endif
                                      @endforeach  
                              
                            
                            </div>
   </div>
 
@endsection

