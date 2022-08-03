@extends('layouts.logindesign')
@section('content')


<br><br>

<div class="container" style="background-color: black; color: white; width:550px; height:415px;">
     <div class="card-header"style="background-color: black; color: white; width:534px; text-align:center; "><h3>Contact Us</h3></div>
  <form action="">
 
    <label for="name">First Name</label>
    <input class="form-control" type="text" id="name" name="name" placeholder="Your name.."><br>


    <label for="email">Email Address</label>
    <input class="form-control" type="text" id="email" name="email" placeholder="example@example.com"><br>
  

    <label for="subject">Subject</label>
    <textarea class="form-control" id="subject" name="subject" placeholder="Write something.." ></textarea>

   
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 <br>
 <input  class="btn btn-success" type="submit" value="Submit">
  </form>
</div>
    
<br><br>


@endsection