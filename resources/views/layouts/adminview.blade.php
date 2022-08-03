<!DOCTYPE html>
<html>
<head>
	<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<style>
body{
    background: -webkit-linear-gradient(left, #eb254e, #ff005f);
}


.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}




.profile-img{
    text-align: center;
}
.profile-img img{
    width: 72%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;

}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;

}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;

}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}

.row {

border-radius: 0.5rem;

  
 }
 
 .col-md-12{
     margin-top:8px;
 }


 .col-md-12 .atag{
  color: white;
  width: 40%;
  height: 60%;
  float: right;
  margin-top: 50px;
  }

  .atag a{
    color: white;
    padding: 5px;

  }

 .col-md-12 .img{
height: 50%;
  width: 60%;
  float: left; 
  text-align: left;

  margin-top: 12px;
  margin-bottom: 10px;

 }

 ul li.nav-item{

 color: red;
 }

 .footer-head{

  color: white;
  font-size: 20px;
  font-weight: bold;
   font-family: cursive;
   text-align: right;
 }

 .footer-body{
padding: 1px;
   color: white;
  font-size: 15px;
  font-family: Arial; 

 
 }

 .footer-body:hover{
 
 text-decoration: none;
 color: #728FCE

 }

  .footer{

  background: purple;
height: 250px;
width:100%;
}

.img img{
    
    height:200px;background-color:#87CEEB;
}

@media only screen 
  and (min-device-width: 310px) 
  and (max-device-width: 420px) 
  and (-webkit-min-device-pixel-ratio: 1) {
      
  .img img{
      
         height: 92px;
    width: 200px;
      background-color:#87CEEB;
  }    
   .atag a {
    color: white;
    padding: 17px;
    
} 
.col-md-12 .atag{
    
    margin-top:0px;
}

.footer{
    text-align:center;
    height: 550px;
}

input[type=search]{
    
    margin-bottom:10px;
}

}


</style>



</head>
<body>

<div class="row" style="background: purple; ">
      <div class="col-md-12" style=" text-align: right;
">
          
               <form action="{{route('user.search')}}" method="get" >
    
    <div class="input-group">
     <input class="form-control mr-2" type="search" placeholder="Search matches by profession eg: Doctor" name="search" aria-label="Search">
     <button class="btn btn-info" name="submit" type="submit">Search</button>
    </div>
  </form> 
     <div class="img"><a href="#"><img src="{{asset('images/logo.png')}}"></a></div> 
     
     

     
    <div class="atag">
  
 

        
       <a href="#">Verify</a>
  
       <a href="#">Upgrade</a>
     

    </div>  
    
    
        
    

      </div><!--col-lg ends-->

      
    


    </div><!--row ends-->
    <br>

    @yield('content')

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link {{Request::is('admin/amin.viewuser')? 'active':''}}" id="home-tab" data-toggle="tab" href="{{route('user.userdash')}}" role="tab" aria-controls="home" aria-selected="true">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{Request::is('users/user.userprofile')? 'active':''}}" id="home-tab" data-toggle="tab" href="{{route('user.userprofile')}}" role="tab" aria-controls="profile" aria-selected="false">Verification</a>
                                </li>
                                   <li class="nav-item">
                                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#" role="tab" aria-controls="profile" aria-selected="false">Deactivate</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#" role="tab" aria-controls="profile" aria-selected="false">Send Message</a>
                                </li>
                            </ul>

                        </div>
                            
                    </div>
                    <div class="col-md-2">
                        <a class="profile-edit-btn"  href="#" > Delete User </a>
                    </div>

                </div>
                
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p style="font-size: 22px;border: outset;">Personal Information</p>
                            <a href="#">Basic Information</a><br/>
                            
                            <a href="#">Education & Ocupation</a><br/>
                            <a href="#">Partner Preference</a>
                            <p style="font-size: 22px;border: outset;">Contact Details</p>
                            <a href="#"> Location</a><br/>
                            <a href="#"> Email Address</a><br/>
                            <a href="#"> Contact Number</a><br/>
                        </div>

                    </div>
                         
                
                              
                
                           @yield('nav')

                         
                 </div>       
                        

<div class="footer">
<div class="col-md-6" style="float: left;background: purple; margin-top:10px;"><a href="">
  <img style="height:240px; width:325px; background-color:#87CEEB;" src="{{asset('images/logo.png')}}"></a>
</div>

<div class="col-md-3" style="color: white; text-align: justify; margin-top: 10px;
margin-bottom: 10px; float: left;">

<a class="footer-head" href="">Important Links</a><br/><br>

 
                            <a class="footer-body" href="">Terms and Conditions</a><br/>
                            <a class="footer-body" href="">Privacy Policy</a><br/>
                            <a class="footer-body" href="">Terms and Conditions</a><br/>
                            <a class="footer-body" href="">FAQs</a><br/>
                           




</div>

<div class="col-md-3" style="color: white; text-align:left;margin-top: 10px;
margin-bottom: 10px; float: right;">

 <a class="footer-head" href="">Help & Support</a><br/><br>                          
 <a class="footer-body" href="">24*7 Live Support</a><br/>
                            <a class="footer-body" href="{{route('contact')}}"> Contact Us</a><br/>
                            <a class="footer-body" href="">Feedback</a><br/>



</div>



</div>



</body>
</html>