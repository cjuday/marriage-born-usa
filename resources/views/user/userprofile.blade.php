<div class="container emp-profile">
 @extends('layouts.nav')
    @section('content')
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                          @foreach($userMoreInfo as $userMoreInfo)
                            <img src="{{asset('images/'. $userMoreInfo->image)}}"  class="responsive" style="border: outset;">
                           <div class="file btn btn-lg btn-primary">
                             <a href="{{route('user.photo')}}" style="color: white">Change Photo</a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                     <h4 style="color: purple;">
                                        {{$userMoreInfo->name}}
                                    </h4>
                                    <h6>
                                      {{$userMoreInfo->occupation}}
                                    </h6>
                                             
     
                            
                      
                  
                
                     

                   @endsection
                     

                      @section('nav')  
<div class="col-md-6">
                        <div class="tab-content profile-tab" id="myTabContent" style="border-top:1px solid #C0C0C0;">


                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$userMoreInfo->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Age</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$userMoreInfo->age}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Education</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$userMoreInfo->edu_degree}} in {{$userMoreInfo->edu_subject}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$userMoreInfo->occupation}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Location</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$userMoreInfo->Area}}, {{$userMoreInfo->City}}</p>
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-md-6">
                                                <label>Hobby</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$userMoreInfo->hobby}}</p>
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-md-6">
                                                <label>Bio</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$userMoreInfo->Bio}}</p>
                                            </div>
                                        </div>
                              
                            
                            </div>
                        </div>
                    </div>
   </div>
 @endforeach 
@endsection

