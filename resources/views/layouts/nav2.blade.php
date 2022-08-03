<!DOCTYPE html>
<html>
<head>
<title>{{$footer->title}}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="{{$footer->meta}}">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="../../public/css/styles.css">
<link rel="stylesheet" href="../../public/css/custom.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<style>

.emp-profile{
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


table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
  margin-top: 20px;
  margin-bottom: 20px;
}

th, td {
  padding: 15px;
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

@include('layouts.user_top2')
    <div class="container emp-profile">
        <br/><br>
    @yield('content')

                        
                </div>
                
                
                <div class="row">
                    <div class="col-md-4">
                    </div>
                         
                
                              
                
                           @yield('nav')

                         
                 </div>       
                        
</div>
@include('layouts.user_footer2')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
</body>
</html>