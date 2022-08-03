<!DOCTYPE html>
<html>   
<head>
<title>Marriage Born USA</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="public/css/styles.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
     <img src="../images/logo.png" height="80px" width="80px" id="logo">
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="/">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('user.login')}}">Login</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="{{route('user.userregister')}}">Register</a>
      </li>
    </ul>
  </div>
</nav>

@yield('content')

<footer>
  <div class="row">
    <div class="col-lg-4 col-md-4">
      <img style="height:160px;width:240px" src="images/logo1.png">
    </div>
    <div class="col-lg-4 col-md-4">
      <h2>Important Links</h2>
        <ul class="list-unstyled">
          <li><a href="#">Terms and Conditions</a></li>    
          <li><a href="#">Privacy Policy</a></li> 
          <li><a href="#">FAQs</a></li> 
        </ul>
    </div>
    <div class="col-lg-4 col-md-4">
      <h2>Help & Support</h2>
        <ul class="list-unstyled">
          <li><a href="">24*7 Live Support</a></li>
          <li><a href="">Contact Us</a></li>
          <li><a href="">Feedback</a></li> 
        </ul>
    </div>
  </div>
</footer>

<!--footerEnd-->

<div class="copyright-text" style="text-align: center;">
<strong>{{$footer->footer}}</strong>
    
   
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
<script type="text/javascript">
        window.addEventListener('scroll', function(){
            if(window.pageYOffset > 100)
            {
                $('#logo').css({'height':'60','width':'60'});
            }else{  
              $('#logo').css({'height':'80', 'width':'80'});
            }
        });
    </script>
</body>
</html>