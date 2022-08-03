@extends('layouts.nav2')
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
              
                    <div class="col-md-8">
                        <div class="profile-head" >
                        <b>From:</b> 
                                     <h2 class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                        {{$userMoreInfo->name}}
                                    </h2>
                                    <b>To:</b> 
                                    <h2 class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                        {{$userMoreInfo2->name}}
                                    </h2>                       
     
                     @endforeach       
                      

                   @endsection
                     

                      @section('nav')  
                      <form method="post" action="{{route('user.msgsent')}}" >
                            @csrf
                            <div class="input-group mb-3">
                            <input type="text" class="form-control" name="text" placeholder="Enter your message">                       
                            <input type="hidden" name="to" value="{{$userMoreInfo2->id}}">
  <div class="input-group-append">
   
  <button type="submit" class="btn btn-primary">Send</button>
  </div></div>
                            </form>
                                    @foreach($x as $match)  
                                        @if($match->uby==Auth::id())
                                        <div class="card shadow mb-4 row col-md-8">
                                           <div class="card-body">
                                                <i class="fas fa-bell"></i> <a href="{{route('user.userdash')}}">{{get_unm($match->uby)}}</a> 
                                                <br/>
                                                {{$match->content}}
                                           </div>
                                        </div>
                                        @else
                                        <div class="card shadow mb-4 row col-md-8">
                                           <div class="card-body">
                                                <i class="fas fa-bell"></i> <a href="{{route('user.viewprof',['id'=>$match->uby])}}">{{get_unm($match->uby)}}</a>
                                                <br/>
                                                {{$match->content}}
                                           </div>
                                        </div>
                                        @endif
                                    @endforeach
</div>  
</div>
 
@endsection

