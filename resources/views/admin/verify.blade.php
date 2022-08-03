@extends('layouts.admin')
@section('topline','Verifications Request')
@section('content')

@if (session()->has('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(count($request)>0)
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">User</div></th>
          <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Submitted Data</div></th>
          <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">File</div></th>
          <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Options</div></th>
        </thead>
        <tbody>
          @foreach($request as $upgrade)
            <tr>
              <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{get_unm($upgrade->user)}}</div></td>
              <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$upgrade->type}}</div></td>
              <td><a href="{{asset('files/'.$upgrade->file)}}">{{$upgrade->file}}</td>
              <td><button class="btn btn-sm btn-success" onclick="location.href='{{route('admin.acceptver',['id'=>$upgrade->id])}}'"><i class="fas fa-check"></i></button> 
              <button class="btn btn-sm btn-danger" onclick="location.href='{{route('admin.denyver',['id'=>$upgrade->id])}}'"><i class="fas fa-times"></i></button></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@else
<h2>No verification request at this moment.</h2>
@endif
@endsection