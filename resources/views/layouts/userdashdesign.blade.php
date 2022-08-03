<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f70a45;
  position: fixed;
  height: 100%;
  overflow: auto;
  text-align: center;
}

.sidebar a {
  display: block;
  color: white;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #04AA6D;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
     text-align: center;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}



@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}

.responsive {
  width: 100%;
  height: auto;
  border-radius:50%;
  margin-top: 15px;
}
</style>
</head>
<body>


<div class="sidebar">
    @foreach($user as $user)
        <a href="{{route('user.userdash')}}"> <img src="{{asset('images/'. $user->image)}}"  class="responsive"> </a>
            

        <a>   {{$user->name}} </a>
        @endforeach
<a  href="{{route('user.userprofile')}}">My Profile</a>
        <a href="#contact">Just Joined</a>
  <a href="#about">Match</a>
  
  <a href="{{route('user.logout')}}">Logout</a>
  
</div>

@yield('content')

</body>
</html>
