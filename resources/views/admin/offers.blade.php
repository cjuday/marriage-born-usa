@extends('layouts.admin')
@section('topline','Add New Membership Package')
@section('content')

<form method="post" action="{{route('admin.updateOffers')}}" >
    @csrf
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
       <input type="text" name="offer_name" class="form-control">        

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


    <button class="btn btn-primary" name="submit" value="submit">Add New Package</button>


    </form>
    <br/><br/>
@endsection