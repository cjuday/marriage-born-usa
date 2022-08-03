@extends('layouts.admin')
@section('topline','Add Payment Method')
@section('content')
    
<form method="post" action="{{route('admin.addpayments')}}" >

   <input type="hidden" name="_token" value="{{ csrf_token() }}">

@if (session()->has('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

   
  

    
     <div class="form-group">
        
       <label for="offer_name">Method Name</label>
       <input type="text" name="name" class="form-control" Placeholder="Method Name..">        

    </div>

    <div class="form-group">
        
       <label for="offer_name">Method Instruction</label>
       <textarea name="inst" cols="7" rows="10" class="form-control" placeholder="Method Instruction.."></textarea>       

    </div>

    

    <div class="form-group">
        
       <label for="offer_name">Field 1 Name</label>
       <input type="text" name="field1" class="form-control" Placeholder="Field 1..">        

    </div>

    

    <div class="form-group">
        
       <label for="offer_name">Field 2 Name</label>
       <input type="text" name="field2" class="form-control" Placeholder="Field 2..">        

    </div>

    

    <div class="form-group">
        
       <label for="offer_name">Field 3 Name</label>
       <input type="text" name="field3" class="form-control" Placeholder="Field 3..">        

    </div>

    <div class="form-group">
        
       <label for="offer_name">Field 4 Name</label>
       <input type="text" name="field4" class="form-control" Placeholder="Field 4..">        

    </div>

    <div class="form-group">
        
       <label for="offer_name">Field 5 Name</label>
       <input type="text" name="field5" class="form-control" Placeholder="Field 5..">        

    </div>
    
     


    <button class="btn btn-primary" name="submit" value="submit">Add Payment Method</button>
<br/><br/>

    </form>
@endsection