@extends('layouts.nav')
               @section('content')
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img" >
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
                   
@endsection
                     

                      @section('nav')          

                    <div class="col-md-6">
                                

                                <form method="POST" action="{{ route('user.personal') }}">
                                    
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
        <input type="Date" name="dob"  class="form-control"  value="{{$userMoreInfo->dob}}">

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
    <input type="radio" class="form-check-input" value="Widow" name="marital_status">Widow (Female)
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" value="Widower" name="marital_status">Widower (Male)
  </label>
</div>

<div class="form-group">
        
        <label for="Bio">Occupation</label>
        <input type="text" name="occupation" value="{{$userMoreInfo->occupation}}" class="form-control">

    </div>
 
   <div class="form-group">
        
        <label for="spouses">Spouse</label>
        <input type="number" name="spouses" value="{{$userMoreInfo->spouses}}" class="form-control">

    </div>   

       <div class="form-group">
        
        <label for="offspring">Offspring (Number of Children)</label>
        <input type="number" name="offspring" value="{{$userMoreInfo->offspring}}" class="form-control">

    </div> 

      <div class="form-group">
        
        <label for="hobby">Hobby</label>
        <input type="text" name="hobby" value="{{$userMoreInfo->hobby}}" class="form-control">

    </div> 

    <div class="form-group">
        
        <label for="Bio">Bio</label>
        <input type="text" name="Bio" value="{{$userMoreInfo->Bio}}" class="form-control">

    </div> 

 <button class="btn btn-primary" name="submit" value="submit">Update Profile</button>

                                </form>
                                <br/>
                       
                            
                    </div>
   </div>
 @endforeach 
@endsection

