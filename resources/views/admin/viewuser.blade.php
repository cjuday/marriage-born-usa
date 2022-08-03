
<div class="container emp-profile">
               @extends('layouts.adminview')
               @section('content')
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img" >
                          @foreach($user as $user)
                          
                            <img src="{{asset('images/'. $user->image)}}" style="border: outset;"  class="responsive">
                            <div class="file btn btn-lg btn-primary">
                             <a href="{{route('user.photo')}}" style="color: white">Change Photo</a>
                                
                            </div>
                        </div>
                    </div>
              
                    <div class="col-md-6">
                        <div class="profile-head" >
                                    <h4 style="color: purple;">
                                        {{$user->name}}
                                    </h4>
                                    <h6>
                                      {{$user->occupation}}
                                    </h6>


 @endforeach                    
@endsection
                     

                      @section('nav')          

                    <div class="col-md-6" >

                        <div class="tab-content profile-tab" id="myTabContent" style="border-top:1px solid #C0C0C0'">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="margin-top: 8px;">
                                    
                       
                                <h3 style="border:outset;">Basic Information</h3>
                                
                                 @foreach($basic as $basic)
                                        
                                           <div class="row">
                                            <div class="col-md-6">
                                                <label>Id No.</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$basic->id}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$basic->name}}</p>
                                            </div>
                                        </div>
                                           <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$basic->email}}</p>
                                            </div>
                                        </div>
                                       
 
                                   @endforeach
                             <h3 style="border:outset;">Personal Information</h3>
                                
                                 @foreach($more as $more)
                                 <div class="row">
                                            <div class="col-md-6">
                                                <label>Id No.</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$more->id}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$more->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Age</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$more->age}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Education</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$more->edu_degree}} in {{$more->edu_subject}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$more->occupation}}</p>
                                            </div>
                                        </div>
                       @endforeach
                                
                                
                                
                                  <h3 style="border:outset;">Partner Preference</h3>
                                     
                                     @foreach($preference as $preference)
                                         <div class="row">
                                            <div class="col-md-6">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$preference->occupation}}</p>
                                            </div>
                                        </div>
                                                                                <div class="row">
                                            <div class="col-md-6">
                                                <label>Age</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> from {{$preference->age_from}} to {{$preference->age_to}} </p>
                                            </div>
                                        </div>
                                        
                                                                                                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Education</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>  {{$preference->edu_degree}}  </p>
                                            </div>
                                        </div>
                                        
                                                                                                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>City</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$preference->city}} </p>
                                            </div>
                                        </div>
 
                                     @endforeach 
                            
                            </div>
                        </div>
                    </div>
   </div>

@endsection

