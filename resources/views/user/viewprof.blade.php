@extends('layouts.nav2')
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
                        </div>
                    </div>
              
                    <div class="col-md-5">
                        <div class="profile-head" >
                                    <h2 class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                        {{$user->name}}
                                    </h2>
                                    <h4 class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                      {{$user->occupation}}
                                    </h4>
                                    </div>
                        @if(is_mem(Auth::guard('users')->user()->id)==0)
                             <div class="alert alert-warning">
                             <h1><a href="{{route('user.upgrade')}}">Upgrade</a> your profile for unlocking more features.</h1>
                        <p style="color:#938E8E">By upgrading you can connect with your matches.</p>
                             </div>
                        @endif
                    </div>
                    <div class="col-md-1" align="right">
                         <a href="{{route('user.sendmsg',['id'=>$user->id])}}" class="btn btn-info">Message</a>

                     </div>
                    

                    <div class="col-md-1">
                         @if(is_ints($user->id)==0)
                         <a href="{{route('user.sendint',['id'=>$user->id])}}" class="btn btn-primary">Send Interest</a>
                         @else
                         <button class="btn btn-success">Interested</button>
                         @endif

                     </div>
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
                                        <h2 class="text-sm font-weight-bold text-primary mb-2 mt-3">Personal Information</h2>

                                            <div class="text-sm font-weight-bold text-dark text-uppercase mb-1">Name</div>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$user->name}}</div>
                                            <br/>
                                        
                                            <div class="text-sm font-weight-bold text-dark text-uppercase mb-1">Age</div>
                                            @if($user->age == 0)
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Not Specified Yet.</div>
                                            @else
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$user->age}} Years</div>
                                            @endif
                                            <br/>

                                            <div class="text-sm font-weight-bold text-dark text-uppercase mb-1">Education</div>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$user->edu_degree}} in {{$user->edu_subject}}</div>
                                            <br/>

                                            <div class="text-sm font-weight-bold text-dark text-uppercase mb-1">Profession</div>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$user->occupation}}</div>
                                            <br/>

                                            <h2 class="text-sm font-weight-bold text-primary mb-2 mt-3">Location Information</h2>

                                            <div class="text-sm font-weight-bold text-dark text-uppercase mb-1">Street Address</div>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$user->street}}</div>
                                            <br/>

                                            <div class="text-sm font-weight-bold text-dark text-uppercase mb-1">City</div>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$user->City}}</div>
                                            <br/>

                                            <div class="text-sm font-weight-bold text-dark text-uppercase mb-1">Zip Code</div>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$user->zip}}</div>
                                            <br/>

                                            <div class="text-sm font-weight-bold text-dark text-uppercase mb-1">State</div>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$user->Area}}</div>
                                            <br/>

                                            <div class="text-sm font-weight-bold text-dark text-uppercase mb-1">Country</div>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$user->Country}}</div>
                                            <br/>

                                            <h2 class="text-sm font-weight-bold text-primary mb-2 mt-3">Additional Information</h2>
                                            
                                            <div class="text-sm font-weight-bold text-dark text-uppercase mb-1">Date of Birth</div>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$user->dob}}</div>
                                            <br/>

                                            <div class="text-sm font-weight-bold text-dark text-uppercase mb-1">Religion</div>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$user->religion}}</div>
                                            <br/>

                                            <div class="text-sm font-weight-bold text-dark text-uppercase mb-1">Marital Status</div>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$user->marital_status}}</div>
                                            <br/>

                                            <div class="text-sm font-weight-bold text-dark text-uppercase mb-1">Number of Spouses</div>
                                            @if($user->spouses==NULL)
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">0</div>
                                            @else
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$user->spouses}}</div>
                                            @endif
                                            <br/>

                                            <div class="text-sm font-weight-bold text-dark text-uppercase mb-1">Number of Childrens</div>
                                            @if($user->offspring==NULL)
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">0</div>
                                            @else
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$user->offspring}}</div>
                                            @endif
                                            <br/>

                                            <div class="text-sm font-weight-bold text-dark text-uppercase mb-1">Hobby</div>
                                            @if($user->offspring==NULL)
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Not Specified Yet</div>
                                            @else
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$user->hobby}}</div>
                                            @endif
                                            <br/>

                                            <div class="text-sm font-weight-bold text-dark text-uppercase mb-1">Bio</div>
                                            @if($user->Bio==NULL)
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Not Specified Yet</div>
                                            @else
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$user->Bio}}</div>
                                            @endif
                                            <br/>

                                            <h2 class="text-sm font-weight-bold text-primary mb-1 mt-3">Contact Information</h2>
                                            <div class="text-sm font-weight-bold text-dark text-uppercase mb-1">Email</div>
                                            @if(is_revem($user->id)==0)
                                            <a href="{{route('user.seemail',['id'=>$user->id])}}" class="btn btn-primary">Reveal Email</a>
                                            @else
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{get_email($user->id)}}</div>
                                            @endif
                                            <br/>

                                            <div class="text-sm font-weight-bold text-dark text-uppercase mb-1">Contact Number</div>
                                            @if(is_revph($user->id)==0)
                                            <a href="{{route('user.seephn',['id'=>$user->id])}}" class="btn btn-primary">Reveal Phone Number</a>
                                            @else
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$user->contact}}</div>
                                            @endif
                                            <br/>
                                            <br/>


                            </div>
                        </div>
                    </div>
 @endforeach 
@endsection

