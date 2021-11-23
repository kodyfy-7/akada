@extends('layouts.panel')

@section('title')
  Employees
@endsection

@section('page_title')
  Employees | <a href="{{route('employees.index')}}" class="btn btn-link">Go back</a>
@endsection
    
@section('breadcrumb')
  Employees
@endsection

@section('style')
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('panel/plugins/toastr/toastr.min.css')}}">
@endsection

@section('content')
    
  <div class="row">
    <div class="col-md-12">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">New  Employee</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove"><i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          {!! Form::open(['route' => 'employees.store', 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
          <div class="form-group">

            {{Form::label('email', 'Email Address *')}}

            {{Form::email('email', old('email') ?? $employee->email, ['id' => 'email', 'class' => 'form-control' . ($errors->has('email') ? ' form-control is-invalid' : null), 'placeholder' => 'abc@email.com', 'autocomplete' => 'off'])}}
            @error('email') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
            @include('admin.employee.form')
          {!! Form::close() !!}
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

@endsection

@section('script')
  <!-- Toastr -->
  <script src="{{asset('panel/plugins/toastr/toastr.min.js')}}"></script>

  <script>
    $(document).ready(function(){
        $("#role_id").change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                if(optionValue){
                    $(".box").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else{
                    $(".box").hide();
                }
            });
        }).change();
    });

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