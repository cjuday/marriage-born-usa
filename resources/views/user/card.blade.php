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





<div class="row">
 <div class="col-50">
    <div class="container">	
<div class="col-25">
            <h3>Payment</h3>
            
            <form method="POST" action="{{ route('user.payment') }}">
                                              
                                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            
                {{$det->instructions}}
              </br/><br/>
           
             <label for="offer_name">Packages</label>
            <select name="offer_id" class="form-control">
                 @foreach($package as $package)
                
                	
                @if(udata(Auth::id())->pkg!=$package->offer_id)
                <option value="{{$package->offer_id}}">{{$package->offer_name}}</option>
                @endif
   
             @endforeach    
                
                </select>

            @if(!empty($det->form_1))
              <label for="cname">{{$det->form_1}}</label>
              <input type="text" name="form1" placeholder="Enter {{$det->form_1}}">
            @endif

            @if(!empty($det->form_2))
              <label for="cname">{{$det->form_2}}</label>
              <input type="text" name="form2" placeholder="Enter {{$det->form_2}}">
            @endif

            @if(!empty($det->form_3))
              <label for="cname">{{$det->form_3}}</label>
              <input type="text" name="form3" placeholder="Enter {{$det->form_3}}">
            @endif

            @if(!empty($det->form_4))
              <label for="cname">{{$det->form_4}}</label>
              <input type="text" name="form4" placeholder="Enter {{$det->form_4}}">
            @endif

            @if(!empty($det->form_5))
              <label for="cname">{{$det->form_5}}</label>
              <input type="text" name="form5" placeholder="Enter {{$det->form_5}}">
            @endif
            
            <input type="hidden" name="payt" value="{{$_GET['m']}}">
            <input type="submit" value="Request Upgrade" class="btn btn-primary">

            </div>
          </div>

        </div>
       
          
       
      </form>
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

   </style>
 @endforeach 
@endsection

