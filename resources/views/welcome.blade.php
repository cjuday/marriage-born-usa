@extends('layouts.front_layouts')

@section('content')
<div id="slider" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{asset('images/img1.jpg')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('images/img2.jpg')}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('images/img3.jpg')}}" alt="Third slide">
    </div>
  </div>
</div>

<div class="white">
    <div class="process">
        <h1 style="color:white;">How It Works</h1>
    </div>
<div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4">
          <div class="wrapper first text-left">
            <div class="top-content" >
             
<h3 style="color:black">Register</h3>
             
            </div>
        <div class="top-content" >   <img src="{{asset('images/step1.jpg')}}"> </div> <!--image-->
            
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
          <div class="wrapper text-left">
          
           <div class="top-content" >
             
<h3 style="color:black">Preference</h3>

              
              
            </div>
             <div class="top-content" >   <img src="{{asset('images/pref.jpg')}}">  </div>  <!--image-->
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
          <div class="wrapper third text-left">
            <div class="top-content" >
             
<h3 style="color:black">Your Match</h3>
              
            </div>
              <div class="top-content" >   <img src="{{asset('images/match.jpg')}}"> </div>  <!--image-->
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>
@endsection
