@extends('layouts.admin')
@section('topline','Payment History')
@section('content')
@foreach($request as $r)
<div class="card shadow mb-4">
    <div class="card-body">
        <i class="fas fa-bell"></i> <span class="text-xs font-weight-bold text-success text-uppercase mb-1 ml-2">{{$r->name}}</span> <span class="text-xs font-weight-bold text-dark text-uppercase mb-1">requested a review of payment with the payment of package</span> <span class="text-xs font-weight-bold text-success text-uppercase mb-1">{{pdet($r->offer_id)->offer_name}}</span> <span class="text-xs font-weight-bold text-dark text-uppercase mb-1">package by the payment method</span> <span class="text-xs font-weight-bold text-success text-uppercase mb-1">{{get_pname($r->payt)}}</span><span class="text-xs font-weight-bold text-dark text-uppercase mb-1">. Please check <a href="{{route('admin.paymentDetails',['id'=>$r->id])}}">list of upgrade request</a>.</span>
        <br/>
        <span class="text-xs font-weight-bold text-primary text-uppercase mb-1">Current Status: </span>
        @if($r->status=="Reviewed and Accepted")
        <span class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$r->status}}</span>
        @elseif($r->status=="Reviewed and Declined")
        <span class="text-xs font-weight-bold text-danger text-uppercase mb-1">{{$r->status}}</span>
        @else
        <span class="text-xs font-weight-bold text-warning text-uppercase mb-1">{{$r->status}}</span>
        @endif
    </div>
</div>
@endforeach
@endsection