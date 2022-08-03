<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <img src="../images/logo.png" height="60px" width="60px" id="logo">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="form-inline my-2 my-lg-0" method="get" action="{{route('user.search')}}">
      <input class="form-control mr-sm-2 ml-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
    
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.userdash')}}"><b>Profile</b></a>
    </li>  
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.justjoined')}}"><b>Just Joined</b></a>
    </li>    
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.match')}}"><b>Matches</b></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.upgrade')}}"><b>Upgrade</b></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.msgs')}}"><b>Messages</b></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.notif')}}"><b>Notifications</b></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.logout')}}"><b>Log Out</b></a>
    </li>
  </ul>
  </div>
</nav>