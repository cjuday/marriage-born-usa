@extends('layouts.admin')
@section('topline','Edit Payment Method')
@section('content')
<form method="post" action="{{route('admin.editpayments')}}" >
@csrf

@if (session()->has('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

     <div class="form-group">
        
       <label for="offer_name">Method Name</label>
       <input type="text" name="name" class="form-control" value="{{$request->name}}">        

    </div>

    <div class="form-group">
        
       <label for="offer_name">Method Instruction</label>
       <textarea name="inst" cols="7" rows="10" class="form-control">{{$request->instructions}}</textarea>       

    </div>

    

    <div class="form-group">
        
       <label for="offer_name">Field 1 Name</label>
       <input type="text" name="field1" class="form-control" value="{{$request->form_1}}">        

    </div>

    

    <div class="form-group">
        
       <label for="offer_name">Field 2 Name</label>
       <input type="text" name="field2" class="form-control" value="{{$request->form_2}}">        

    </div>

    

    <div class="form-group">
        
       <label for="offer_name">Field 3 Name</label>
       <input type="text" name="field3" class="form-control" value="{{$request->form_3}}">        

    </div>

    <div class="form-group">
        
       <label for="offer_name">Field 4 Name</label>
       <input type="text" name="field4" class="form-control" value="{{$request->form_4}}">        

    </div>

    <div class="form-group">
        
       <label for="offer_name">Field 5 Name</label>
       <input type="text" name="field5" class="form-control" value="{{$request->form_5}}">        

    </div>

    <input type="hidden" name="id" value="{{$request->id}}">
    
     


    <button class="btn btn-primary" name="submit" value="submit">Update Method</button>
    <br/>
   <br/>

    </form>



@endsection