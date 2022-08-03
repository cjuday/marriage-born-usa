@extends('layouts.admin')
@section('topline','Payment Request')
@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
  @foreach($basic as $basic)
  <h3>Basic Details</h3>
  <div class="row">
          <div class="col-md-4 mb-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Payment Request</div>
          #{{$basic->memid}}
          </div>
          <div class="col-md-4 mb-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Account Name</div>
          {{$basic->name}}
          </div>
          <div class="col-md-4 mb-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Payment Method</div>
          {{get_pname($basic->payt)}}
          </div>
  </div>

  <h3>{{get_pname($basic->payt)}} Details</h3>

  <div class="row">
          <div class="col-md-4 mb-2">
          @if(!empty(form1($basic->payt)))
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{form1($basic->payt)}}</div>
          {{$basic->cname}}
          @endif
          </div>
          <div class="col-md-4 mb-2">
          @if(!empty(form2($basic->payt)))
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{form2($basic->payt)}}</div>
          {{$basic->ccnum}}
          @endif
          </div>
          <div class="col-md-4 mb-2">
          @if(!empty(form3($basic->payt)))
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{form3($basic->payt)}}</div>
          {{$basic->expmonth}}
          @endif
          </div>
  </div>

  <div class="row">
          <div class="col-md-4 mb-2">
  @if(!empty(form4($basic->payt)))
  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{form4($basic->payt)}}</div>
           {{$basic->cvv}}
  @endif
          </div>
          <div class="col-md-4 mb-2">
  @if(!empty(form5($basic->payt)))
  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{form5($basic->payt)}}</div>
           {{$basic->form_5}}
  @endif
          </div>
  </div>

  <h3>Package Details</h3>
  <div class="row">
        <div class="col-md-4 mb-2">
        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Package Name</div>
           {{pdet($basic->offer_id)->offer_name}}
        </div>
        <div class="col-md-4 mb-2">
        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Price</div>
           ${{pdet($basic->offer_id)->amount}}
        </div>
        <div class="col-md-4 mb-2">
        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Package Name</div>
           {{pdet($basic->offer_id)->duration}}
        </div>
  </div>
          
  <h3>Decision</h3>
        @if($basic->status=='Not Reviewed')
        <a href="{{route('admin.statusAccept',['id'=>$basic->memid])}}" class = "btn btn-info">Accept </a>
        <a href="{{route('admin.statusDecline',['id'=>$basic->memid])}}" class = "btn btn-danger">Decline </a>
        @else
                @if($basic->status=='Reviewed and Accepted')
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$basic->status}}</div>
                @elseif($basic->status=='Reviewed and Declined')
                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">{{$basic->status}}</div>
                @endif
        @endif
        @endforeach
  </div>
</div>
@endsection