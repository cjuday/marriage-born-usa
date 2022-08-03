@extends('layouts.admin')

@section('text')

<h1>Websetting - Footer</h1></h1>

@endsection

@section('content')



<div class="container">
    
    <div class="col-lg-6 margin-tb" style="margin-left: 100px; margin-bottom: 15px;">

        <div class="pull-left" style="margin-left: 30px; " >
  <form action="{{route('websetting.footer')}}" method="POST">
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

@if(session('success'))
   <div class="alert alert-success">  <h2>{{session('success')}}</h2></div>
@endif
       <div class="form-group">
           
            <label>Footer Text</label>
   
            <input type="text" name="footer" class="form-control">
           
       </div> 
     
  
  
      <button class="btn btn-dark" name="submit" value="submit">Submit</button>
</form>

</div> <!--pull-left-->
</div> <!--col-lg-6-->

</div>



<style>
.container{
  margin-left:20px;
}

</style>

@endsection