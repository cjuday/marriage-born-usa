@extends('layouts.front_layouts')

@section('content')

<div class="container-fluid loginx">
  <div class="login" align="center">
  <div class="card-header"style="background-color: black; color: white; "><h1>User Login</h1></div>
    <div class="card-body" style="background-color: black; color: white;">
    <form method="POST" action="{{ route('user.userlogin') }}">
    @csrf
    
@if ($errors->any())
    <div class="alert alert-danger" align="left">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if ($message = Session::get('success'))
                          <div class="alert alert-success alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                           </div>
                                @endif
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="exampleInputEmail1">Email address:</label>
    <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="email">
  </div>


<div class="form-group col-md-6">
    <label for="exampleInputPassword1">Password:</label>
    <input type="password" class="form-control" placeholder="Password" name="password">
  </div>

</div> 
 
  <input class="btn btn-success" type="submit" name="submit"></form>
</div> 
    <div class="card-footer" style="background-color: black; color: white;">Don't have an account? <a href="{{route('user.userregister')}}">Register now!</a></div>
  </div>

  </div>
</div>


@endsection