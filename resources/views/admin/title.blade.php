@extends('layouts.admin')
@section('topline','Website Settings')
@section('content')
<form action="{{route('websetting.title')}}" method="POST">
@csrf
@if(session('success'))
   <div class="alert alert-success"><i class="fas fa-check" ></i> {{session('success')}}</div>
@endif
   <div class="row">
      <div class="col-md-6">
         <div class="form-group">
            <label for="title">* Website title</label>
            <input type="text" name="title" value="{{$x->title}}" class="form-control">        
         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group">
            <label for="title">* Meta Tags</label>
            <input type="text" name="meta" value="{{$x->meta}}" class="form-control">        
         </div>
      </div>
   </div>       
   
   <div class="row">
      <div class="col-md-6">
         <div class="form-group">
            <label for="title">* Footer Text</label>
            <input type="text" name="footer" value="{{$x->footer}}" class="form-control">        
         </div>
      </div>
   </div>
                    
                    
   <button class="btn btn-primary" type="submit">Update Settings</button>
</form>
@endsection