

  <div class="container emp-profile">
                 @extends('layouts.nav')
               @section('content')

                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                          @foreach($userMoreInfo as $userMoreInfo)
                            <img src="{{asset('images/'. $userMoreInfo->image)}}"  class="responsive" style="border: outset;">
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="image"/>
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
    
<form method="post" action="{{route('user.update')}}" enctype="multipart/form-data" style="margin-top: 8px;">
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

   <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
   

     



     <div class="form-group">
        
    <label for="dob">Date of Birth</label>
        <input type="Date" name="dob"  class="form-control" value="{{$userMoreInfo->dob}}" >

    </div>


 <div class="form-group">
        
        <label for="edu_degree">Education Degree</label>
        <input type="text" name="edu_degree" value="{{$userMoreInfo->edu_degree}}" class="form-control">

    </div>


     <div class="form-group">
        
        <label for="edu_subject">Education Subject</label>
        <input type="text" name="edu_subject" value="{{$userMoreInfo->edu_subject}}"  class="form-control">

    </div>

 <div class="form-group">
        
        <label for="contact">Contact no.</label>
        <input type="text" name="contact" value="{{$userMoreInfo->contact}}"  class="form-control">

    </div>


     <div class="form-group">
        
        <label for="religion">Religion</label>
        <input type="text" name="religion" value="{{$userMoreInfo->religion}}"  class="form-control">

    </div>

     

    <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" value="Single" name="marital_status">Single
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" value="Divorced" name="marital_status">Divorced
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" value="Widow" name="marital_status" >Widow (Female)
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" value="Widower" name="marital_status">Widower (Male)
  </label>
</div>
<br>
 <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" value="Married" name="marital_status">Married (Male)
  </label>
</div>
   <div class="form-group">
        
        <label for="spouses">Spouse</label>
        <input type="number" name="spouses" value="{{$userMoreInfo->spouses}}" class="form-control">

    </div>   

       <div class="form-group">
        
        <label for="offspring">Offspring (Number of Children)</label>
        <input type="number" name="offspring"  class="form-control" value="{{$userMoreInfo->offspring}}">

    </div> 

           <div class="form-group">
        
        <label for="occupation">Occupation</label>
        <input type="text" name="occupation"  class="form-control" value="{{$userMoreInfo->occupation}}">

    </div>

    <div class="form-group">
        
        <label for="Country">Country</label>
        <input type="text" name="Country"  class="form-control" value="{{$userMoreInfo->Country}}">

    </div> 

    <div class="form-group">
        
        <label for="City">City</label>
        <input type="text" name="City"  class="form-control" value="{{$userMoreInfo->City}}">

    </div> 

    <div class="form-group">
        
        <label for="Area">Area</label>
        <input type="text" name="Area"  class="form-control" value="{{$userMoreInfo->Area}}">

    </div> 

    <div class="form-group">
        
        <label for="hobby">Hobby</label>
        <input type="text" name="hobby"  class="form-control" value="{{$userMoreInfo->hobby}}">

    </div> 

    <div class="form-group">
        
        <label for="Bio">Bio</label>
        <input type="text" name="Bio"  class="form-control" value="{{$userMoreInfo->Bio}}">

    </div>  


    <button class="btn btn-dark" name="submit" value="submit">Submit</button>


    </form>

   






</div> <!--end of pulle-left-->
                            </div>
 
  </div>
   
 @endforeach 
@endsection
 


