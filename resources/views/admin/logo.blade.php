@extends('layouts.admin')
@section('topline','Logo Settings')
@section('content')
<form action="{{route('websetting.logo')}}" method="POST" enctype="multipart/form-data">
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
   <div class="alert alert-success"> <i class="fas fa-check"></i> {{session('success')}}</div>
@endif
  
   <div class="row">
       <div class="col-md-6">
            <div class="form-group">
            <label for="image">* Logo</label>
            <input type="file" name="image" class="form-control">
            </div>
       </div>
   </div>
      
  
      <button class="btn btn-primary" type="submit">Update Logo</button>
</form>
<br/><br/>
* Current Logo<br/>
<img src="{{asset('/images/'.$x.'')}}" width="290px">
<br/>
@endsection