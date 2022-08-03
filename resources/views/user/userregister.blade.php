@extends('layouts.front_layouts')
@section('content')


<div class="container-fluid loginx">
  <div class="login" align="center">
  <div class="card-header"style="background-color: black; color: white; width:550px; "><h2>User Registration</h2></div>
    <div class="card-body" style="background-color: black; color: white; width:550px;">
    <form method="POST" action="{{ route('user.register') }}">
@csrf
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

 <div class="form-row">
  <div class="form-group col-md-6">
    <label for="exampleInputName1">Name</label>
    <input type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Your Name" name="name">

  </div>


  <div class="form-group col-md-6">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">

  </div>

</div> 

 <div class="form-row">
  <div class="form-group col-md-6" >
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>

 <div class="form-group col-md-6">
    <label for="dob">Date of Birth</label>
        <input type="Date" name="dob"  class="form-control" >

    </div>
 </div>   
     <div class="form-group">
 <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" value="Male" name="sex">Male
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" value="Female" name="sex">Female
  </label>
</div>
</div>


 <div class="form-row">
 <div class="form-group col-md-6">
        
        <label for="edu_degree">Education Degree</label>
        <input type="text" name="edu_degree"  class="form-control">

    </div>


     <div class="form-group col-md-6">
        
        <label for="edu_subject">Education Subject</label>
        <input type="text" name="edu_subject"  class="form-control">

    </div>
</div>

 <div class="form-row">
 <div class="form-group col-md-6">
        
        <label for="contact">Contact no.</label>
        <input type="text" name="contact"  class="form-control">

    </div>


     <div class="form-group col-md-6">
        
        <label for="religion">Religion</label>
        <input type="text" name="religion"   class="form-control">

    </div>
</div>
 

 <div class="form-group">
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
 
</div>
         

 <div class="form-row">
           <div class="form-group col-md-6">
        
        <label for="occupation">Occupation</label>
        <input type="text" name="occupation"  class="form-control">

    </div>

    <div class="form-group col-md-6">
        
        <label for="Country">Country</label>
        <input type="text" name="Country"  class="form-control">

    </div> 

  </div>

   <div class="form-row">

    <div class="form-group col-md-6">
        
        <label for="City">City</label>
        <input type="text" name="City"  class="form-control">

    </div> 

    <div class="form-group col-md-6">
        
        <label for="Area">State</label>
        <input type="text" name="Area"  class="form-control">

    </div> 
        
        
</div>
    <div class="form-row">
    <div class="form-group col-md-6">
    <label for="Area">Street Address</label>
        <input type="text" name="street"  class="form-control">
    </div>
        
    <div class="form-group col-md-6">
    <label for="Area">Postal Code</label>
        <input type="text" name="zip"  class="form-control">
    </div>
    </div>
  <input class="btn btn-success" type="submit" value="Sign Up">
</form>
</div> 
    <div class="card-footer" style="background-color: black; color: white;  width:550px;">Already have an account? <a href="{{route('user.login')}}">Login now!</a></div>
  </div>
</div>





@endsection