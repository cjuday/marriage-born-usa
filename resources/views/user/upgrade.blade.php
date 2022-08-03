@extends('layouts.nav')
               @section('content')
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                          @foreach($userMoreInfo as $userMoreInfo)
                          @if(!is_null($userMoreInfo->image))
                            <img src="{{asset('images/'.$userMoreInfo->image)}}" style="border: outset;"  class="responsive">
                            @else
                            <img src="{{asset('images/blank.png')}}" style="border: outset;"  class="responsive lg">
                            @endif
                            <div class="file btn btn-lg btn-primary">
                             <a href="{{route('user.photo')}}" style="color: white">Change Photo</a>
                                
                            </div>
                        </div>
                    </div>
              
                    <div class="col-md-6">
                        <div class="profile-head" >
                                    <h2 class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                        {{$userMoreInfo->name}}
                                    </h2>
                                    <h4 class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                      {{$userMoreInfo->occupation}}
                                    </h4>
                                             
     
                            
                      
                  
                
                     

                   @endsection
                     

                      @section('nav')  
<div class="col-md-6">
                               
                            <h3>Membership Plans</h3>
  
 
               <table class="offers">
               	
                 <thead>
                     <th>Packages</th>
                     <th>Features</th>
                     <th>Duration</th>
                     <th>Amount</th>
                      </thead>
                 
                 	
            
                

                 <tbody>
                 	  
                 	 @foreach($upgrade as $upgrade)
                 	  <tr>
                 	<td>{{$upgrade->offer_name}}</td>
                 	<td>{{$upgrade->features}}</td>	 
                 	<td>{{$upgrade->duration}}</td>
                 	<td>USD {{$upgrade->amount}}</td>
                 	  </tr>
                 	@endforeach
                 	  

                 	  
                 </tbody>
                 	
                

               </table>
              
<!--form-->




<!--container-->

<div class="row">
 <div class="col-50">
    <div class="container">	
<div class="col-25">
            <h3>Payment</h3>
            
 <div class="dropdown">
  <button class="dropbtn">Payment Method</button>
  <div class="dropdown-content">
    @foreach($pay as $p)
      <a href="{{route('user.card')}}?m={{$p->id}}">{{$p->name}}</a>
    @endforeach
  </div>
</div>
           
            
    </div>
  </div>



</div>
                            </div>
                        </div>
          
          
                    </div>
   </div>
   
   <style>
       
       

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}



.btn:hover {
  background-color: #45a049;
}

/* Style The Dropdown Button */
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
   </style>
 @endforeach 
@endsection

