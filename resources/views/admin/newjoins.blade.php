@extends('layouts.admin')
@section('topline','User List')
@section('content')
@if($message= Session::get('success'))
<div class="alert alert-success">
  <i class="fas fa-check"></i> {{$message}}
</div>
@endif

@if(count($user)==0)
<h3>No user is registered yet.</h3>
@else
<div class="card shadow mb-4">
  <div class="card-body">
  <table class="table table-bordered">
  
  <thead>
    <tr>
      <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Name</div></th>
      <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Email</div></th>
      <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Contact Number</div></th>
      <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Action</div></th>
    </tr>
  </thead>

    <tbody>
      @foreach($user as $us)
      <tr>
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$us->name}}</div></td>
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$us->email}}</div></td>
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{get_contact($us->id)}}</div></td>
        <td>
        <a href="{{route('admin.viewuser',['id'=>$us->id])}}" class = "btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
        <a href="{{route('admin.delete',['id'=>$us->id])}}" class = "btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>

</table>
  </div>
</div>
@endif
<div class="float-right mb-4">
{{ $user->links() }}
</div>

@endsection