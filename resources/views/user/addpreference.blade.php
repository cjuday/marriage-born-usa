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
                       
                   @endforeach
                   
                   @endsection
                     

                      @section('nav')
    
    
<form method="post" action="{{route('user.addpreference')}}" enctype="multipart/form-data" style="margin-top: 8px;">

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
        
        <label for="edu_degree">Education Degree</label>
        <input type="text" name="edu_degree"  class="form-control">

    </div>


    <div class="form-group">
        
        <label for="age_from">Age From</label>
        <input type="number" name="age_from" class="form-control">

    </div> 
 
      <div class="form-group">
        
        <label for="age_to">Age To</label>
        <input type="number" name="age_to" class="form-control">

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
    <input type="radio" class="form-check-input" value="Widow" name="marital_status">Widow (Female)
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" value="Widower" name="marital_status">Widower (Male)
  </label>
</div>
 
   <div class="form-group">
        
        <label for="spouses">Spouse</label>
        <input type="number" name="spouses" class="form-control">

    </div>   

       <div class="form-group">
        
        <label for="offspring">Offspring (Number of Children)</label>
        <input type="number" name="offspring" class="form-control">

    </div> 

           <div class="form-group">
        
        <label for="occupation">Occupation</label>
        <input type="text" name="occupation" class="form-control">

    </div>


    <div class="form-group">
        
        <label for="City">City</label>
        <input type="text" name="city" class="form-control">

    </div> 

   

    <button class="btn btn-dark" name="submit" value="submit">Submit</button>


    </form>

   






</div> <!--end of pulle-left-->
                            </div>
 
  
   
</div> 
@endsection
 


