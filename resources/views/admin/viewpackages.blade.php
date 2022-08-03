@extends('layouts.admin')
@section('topline','Package Management')
@section('content')

@if (session()->has('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

<div class="float-right">
    <button class="btn btn-success" onclick="location.href='{{route('admin.offers')}}'">+Add New Package</button>
</div>
<br/>
<br/>

<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Packages</div></th>
          <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Features</div></th>
          <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Duration</div></th>
          <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Amount</div></th>
          <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Options</div></th>
        </thead>
        <tbody>
          @foreach($upgrade as $upgrade)
            <tr>
              <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$upgrade->offer_name}}</div></td>
              <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$upgrade->features}}</div></td>	 
              <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$upgrade->duration}}</div></td>
              <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">USD {{$upgrade->amount}}</div></td>
              <td><button class="btn btn-primary btn-sm" onclick="location.href='{{route('admin.editoff',['id'=>$upgrade->offer_id])}}'"><i class="fas fa-edit"></i></button> <button class="btn btn-danger btn-sm" onclick="location.href='{{route('admin.deloffer',['id'=>$upgrade->offer_id])}}'"><i class="fas fa-trash"></i></button></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection