<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style type="text/css">
  
  .nav-link{

    color:white;
  }

    .nav-link:hover{

    color:#d6ced0;
  }

</style>


</head>
<body>
<nav class="navbar navbar-expand-sm" style="background-color: #f70a45; color:white;">
  <a class="navbar-brand" href="#">Logo</a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="{{route('user.userdash')}}">Dashboard</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Just Joined</a>
    </li>
      <li class="nav-item">
      <a class="nav-link" href="#">Match</a>
    </li>

  <li class="nav-item">
      <a class="nav-link" href="{{route('user.userprofile')}}">My Profile</a>
    </li>

      <li class="nav-item">
      <a class="nav-link" href="{{route('user.logout')}}">Logout</a>
    </li>

  </ul>
</nav>


@yield('content')

<!--Contents-->


</body>
</html>
