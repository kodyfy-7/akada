@extends('layouts.panel')

@section('title')
  Dashboard
@endsection

@section('pageStatus')
    Dashboard
@endsection

@section('page_title')
  Dashboard 
@endsection

@section('breadcrumb')
  Dashboard
@endsection

@section('style')
    <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('panel/css/toastr/toastr.min.css')}}">
@endsection

@section('content')
  <div class="container-fluid">
    @if($payment_status)
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-ban"></i> Alert!</h5>
          School fees payment not made!!! <br> <a class="btn" href="#payment-modal" data-toggle="modal">Click here to pay.</a>
        </div>
      </div>
    </div>  
    <div class="modal fade" id="payment-modal">
      <div class="modal-dialog payment-modal">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Fee payment for {{$year->session}} - @if($year->term == 1)
              first
            @elseif($year->term == 2)
              second
            @else
              third
            @endif
            term</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          {!! Form::open(['route' => 'fee.payment', 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
          <div class="modal-body">
            <dl class="row">
              <dt class="col-sm-4">Wallet balance: </dt>
              <dd class="col-sm-8">&#8358;{{$wallet->account_balance}}</dd>
              <dt class="col-sm-4">Amount due:</dt>
              <dd class="col-sm-8">&#8358;{{$classroom_fee->fee}}</dd>
              <dt class="col-sm-4">Status:</dt>
              <dd class="col-sm-8">@if($wallet->account_balance <= $classroom_fee->fee)Insufficient balance <small><a href="{{route('my.transaction')}}" class="btn btn-sm btn-success">Fund wallet</a></small> @else Sufficient balance @endif</dd>
            </dl>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="hidden" name="wallet_id" value="{{$wallet->id}}">
            <input type="hidden" name="old_balance" value="{{$wallet->account_balance}}">
            <input type="hidden" name="amount_due" value="{{$classroom_fee->fee}}">
            <input type="hidden" name="payment_id" value="{{$payment_status->id}}">
            @if($wallet->account_balance <= $classroom_fee->fee)
            {{Form::submit('Process school fees', ['id' => 'action_button', 'class' => 'btn btn-success', 'disabled' => 'disabled'])}}
            @else {{Form::submit('Process school fees', ['id' => 'action_button', 'class' => 'btn btn-success'])}}
            @endif
            
          </div>
          {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    @endif
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3>@if($year->term == 1)
              First
            @elseif($year->term == 2)
              Second
            @else
              Third
            @endif
            Term</h3>
  
            <p>{{$year->session}}</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>&#8358;{{number_format($wallet->account_balance)}}</h3>

            <p>Wallet Balance</p>
          </div>
          <div class="icon">
            <i class="fas fa-credit-card"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$studentInfo->classroom->classroom_title}}</h3>

            <p>Current Class</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{$total_class_subjects}}</h3>

            <p>Total Class Subjects</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
  </div>
@endsection

@section('script')
  <!-- Toastr -->
  <script src="{{asset('panel/js/toastr/toastr.min.js')}}"></script>

  <script>
    @if(Session::has('success'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.success("{{ session('success') }}");
    @endif
  
    @if(Session::has('error'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.error("{{ session('error') }}");
    @endif
  
    @if(Session::has('info'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.info("{{ session('info') }}");
    @endif
  
    @if(Session::has('warning'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.warning("{{ session('warning') }}");
    @endif
  </script>
@endsection