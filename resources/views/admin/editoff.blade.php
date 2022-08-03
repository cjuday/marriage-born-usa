@extends('layouts.admin')
@section('topline','Add New Membership Package')
@section('content')

<form method="post" action="{{route('admin.updateOff')}}" >
@csrf
     <div class="form-group">
        
       <label for="offer_name">Packages</label>
       <input type="text" name="offer_name" value="{{$request->offer_name}}" class="form-control">        

    </div>
    
     <div class="form-group">
        
       <label for="features">Features</label>
       <input type="text" name="features" value="{{$request->features}}" class="form-control">        

    </div>

       <div class="form-group">
        
        <label for="amount">Amount</label>
        <input type="number" name="amount" value="{{$request->amount}}" class="form-control">

    </div>
     <div class="form-group">
        
        <label for="duration">Duration</label>
 <input type="text" name="duration" value="{{$request->duration}}" class="form-control">
    </div>


    <input type="hidden" name="id" value="{{$request->offer_id}}">
    <button class="btn btn-primary" name="submit" value="submit">Update Package</button>


    </form>
    <br/><br/>
@endsection