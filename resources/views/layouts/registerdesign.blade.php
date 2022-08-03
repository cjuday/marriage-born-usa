<!DOCTYPE html>
<html>   
<header>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style type="text/css">
    .nav-link{

      color:white;
      
    }
    .navbar-brand{
      color:white;
    }

    .container{

      margin-top:37px;
    }
    
   
    .navbar .container img{
        
        height:246px;
    }


.white{
        position:relative;
    width:100%;
    height:664px;
    
   
    background:linear-gradient(90deg, rgba(5,35,113,1) 0%, rgba(78,9,121,1) 35%, rgba(0,212,255,1) 100%);;
}

.process{
    
    position:relative;
    width:100%;
    height:100px;
    background:transparent;
    text-align:center;
   
}

.white .col-md-2{
    
    background:purple;
    
}

.col-md-2 .inner {margin: 5px; background: #99f; text-align: center;}
.container .row .col-sm{
    
    background:white;
    color:black;
}

body{
      background-image: url("{{asset('images/img3.jpg')}}") ;
  background-repeat: no-repeat;
  height:100%;
   background-size: cover;
    
}

@media only screen 
  and (min-device-width: 310px) 
  and (max-device-width: 420px){
.navbar{
    background-color: black;
    height: 477px;
}

.nav .container {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: 199px;
}

}








a img{
    
    height:200px;
}


*{margin:0;
padding:0;
box-sizing:border-box;
font-family: 'Poppins', sans-serif;}



footer{

position:relative;
width:100%;
height:auto;
padding:50px 100px;
background:#111;
display:flex;
justify-content: space-between;
flex-wrap: wrap;


}

footer .container{

display:flex;
flex-direction:
justify-content: space-between;
flex-wrap: wrap;

}


 footer .container .{

margin-right:30px;
}
 footer .container .sec.aboutus{
width:40%
}

 footer .container .sec.aboutus img {
  
   position:relative;
color: white;
font-weight:500;
margin-bottom:15px;
height: 219px;
    width: 377px;
    
    background-color:#87CEEB;
  
}
\
 footer .container h2{
  
   position:relative;
color: #fff;
font-weight:500;
margin-bottom:15px;
  
}

 footer .container h2:before{
content:'';
position:absolute;
bottom: -5px;
Left:0
width:50px;
height:2px;
background: #foo;
}

.quicklinks{

position: relative;
width:25%;

}
 .quicklinks ul li{

list-style: none;

}
 .quicklinks h2{

color: white;

}
 .quicklinks ul li a{

color:#999;
text-decoration: none;
margin-bottom:10px;
display: inline-block;

}




@media (max-width:991px) {
footer{padding:40px;}
footer .container{
    
    flex-direction:column;
}

.navbar .container{

display:flex;
flex-direction:column;
justify-content: space-between;
flex-wrap: wrap;

}

.white{
    
height:1624px;
}

.col-md-4{
    
    max-width:50%;
    margin-bottom:17px;
}
.row{
    
    flex-direction: column;
   
    align-items: center;
}
.navbar .container{
    
    font-size:41px;
    font-weight:bold;
}

.navbar .container img {
    height: 322px;
}
 .quicklinks ul li a{

font-size:34px;
font-weight:bold;

}

.quicklinks {
   
    width: 39%;}
    
    .quicklinks h2{
        font-size:36px;
        
    }

 footer .container .sec.aboutus img {
  
   
height: 307px;
    width: 700px;
  
}

.copyright p{
 
 font-size:32px;   
}
}

}

  
  
@media (min-width: 1200px)
.container {
    max-width: 1140px;
}
@media (min-width: 992px)
.container {
    max-width: 960px;
}
@media (min-width: 768px)
.container {
    max-width: 720px;
}
@media (min-width: 576px)
.container {
    max-width: 540px;
}
.container {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
 .top-content{
     background:white;
     border-radius:5px;
     text-align:center;
     
 } 
  
  
  </style>
</head>
<body>

<nav class="navbar" style="background-color:black;">

  <div class="container" style="text-align:center;" > 

     <img style="background-color:#87CEEB;" src="{{asset('images/logo.png')}}">

   

    <ul class="nav">
    
      <li class="nav-item">
        <a class="nav-link" href="{{route('user.login')}}">Login</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="{{route('user.userregister')}}">Register</a>
      </li>
    </ul>

  </div>


   </div>


</nav>





@yield('content')

<br><br>
<!--footer-->
<footer>

<div class="container">
<div class="sec aboutus">

<img src="{{asset('images/logo.png')}}">



</div> <!--aboutus end-->
<div class="sci quicklinks">
    
    <h2>Important Links</h2>

                           <ul >
                            <li><a href="#">Terms and Conditions</a></li>    
                           <li><a  href="#">Privacy Policy</a></li> 
                           <li><a  href="#">FAQs</a></li> 
                           
                               
                               
                           </ul>
</div>
<div class="sci quicklinks">
    
    <h2>Help & Support</h2>

                           <ul >
                            <li><a  href="">24*7 Live Support</a></li>
     <li><a  href="">Contact Us</a></li>
     <li><a  href="">Feedback</a></li> 
                           
                               
                               
                           </ul>
</div>

</div> <!--container end-->

</footer>

<!--footerEnd-->

<div class="copyright-text" style="text-align: center;">
    
    <p>Copyright &copy MarriageBornUSA. All Right Reserved.</p>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
</body>
</html>