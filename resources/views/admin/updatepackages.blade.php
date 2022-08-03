@extends('layouts.admin')
@section('text')

<h1>Edit/Update Membership Packages</h1></h1>

@endsection


@section('content')


<div class="col-lg-6 margin-tb" style="margin-left: 100px; margin-bottom: 15px;">

    <div class="pull-left" style="margin-left: 30px; " >
    
<form method="post" action="{{route('admin.updateOffers')}}" >

   <input type="hidden" name="_token" value="{{ csrf_token() }}">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

   
  

    
     <div class="form-group">
        
        <label for="offer_name">Packages</label>
            <select name="offer_name" class="form-control">
                <option value="0">Select Package:</option>
                 @foreach($package as $package)
                
                	
    <option value="{{$package->offer_name}}">{{$package->offer_name}}</option>
   
             @endforeach    
                
                </select>

    </div>
    
    <div class="form-group">
        
        <label for="features">Features</label>
        <input type="text" name="features" class="form-control">

    </div>

       <div class="form-group">
        
        <label for="amount">Amount</label>
        <input type="number" name="amount" class="form-control">

    </div>
     <div class="form-group">
        
        <label for="duration">Duration</label>
 <input type="text" name="duration" class="form-control">
    </div>


    <button class="btn btn-dark" name="submit" value="submit">Submit</button>


    </form>

   






</div> <!--end of pulle-left-->
</div> <!--end of margin-tb-->


@endsection