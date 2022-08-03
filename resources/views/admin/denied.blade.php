@extends('layouts.admin')
@section('topline','Declined Requests')
@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered">
  
  <thead>
    <tr>
      <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">ID</div></th>
      <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Name</div></th>
      <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Status</div></th>
      <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Action</div></th>
    </tr>
  </thead>

    <tbody>
      @foreach($request as $us)
      <tr>
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$us->id}}</div></td>
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$us->name}}</div></td>
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$us->status}}</div></td>
        <td><a href="{{route('admin.paymentDetails',['id'=>$us->id])}}" class = "btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
</table>
    </div>
  </div>
</div>

@endsection