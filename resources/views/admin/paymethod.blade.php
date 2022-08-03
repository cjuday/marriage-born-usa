@extends('layouts.admin')
@section('topline','Payment Methods')
@section('content')

@if (session()->has('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

<div class="float-right">
    <button class="btn btn-success" onclick="location.href='{{route('admin.addpay')}}'">+Add New Methods</button>
</div>
<br/>
<br/>

@if(count($request)==0)
<h2>No payment method added yet.</h2>
@else
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered">
  
  <thead>
    <tr>
      <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Name</div></th>
      <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Field 1</div></th>
      <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Field 2</div></th>
      <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Field 3</div></th>
      <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Field 4</div></th>
      <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Field 5</div></th>
      <th><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Options</div></th>
    </tr>
  </thead>

    <tbody>
      @foreach($request as $us)
      <tr>
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$us->name}}</div></td>
        @if(empty($us->form_1))
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">Empty</div></td>
        @else
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$us->form_1}}</div></td>
        @endif
        
        @if(empty($us->form_2))
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">Empty</div></td>
        @else
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$us->form_2}}</div></td>
        @endif

        @if(empty($us->form_3))
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">Empty</div></td>
        @else
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$us->form_3}}</div></td>
        @endif

        @if(empty($us->form_4))
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">Empty</div></td>
        @else
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$us->form_4}}</div></td>
        @endif

        @if(empty($us->form_5))
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">Empty</div></td>
        @else
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$us->form_5}}</div></td>
        @endif

        <td><button class="btn btn-primary btn-sm" onclick="location.href='{{route('admin.editpay',['id'=>$us->id])}}'"><i class="fas fa-edit"></i></button> <button class="btn btn-danger btn-sm" onclick="location.href='{{route('admin.deletepay',['id'=>$us->id])}}'"><i class="fas fa-trash"></i></button></td>
      </tr>
      @endforeach
    </tbody>

</table>
    </div>
  </div>
</div>

@endif

@endsection