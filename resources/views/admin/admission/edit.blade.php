@extends('layouts.panel')

@section('title')
    Admissions 
@endsection

@section('page_title')
    Admissions | <a href="/sysAdmin/admissions" class="btn btn-link">Go back</a>
@endsection
    
@section('breadcrumb')
  Admissions 
@endsection

@section('content')
  
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> {{$admission->name}} </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    @include('inc.messages')
                    {!! Form::open(['action' => ['Users\Admin\AdmissionController@update', $admission->id], 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('admission_score', 'Applicant Score')}}
                            <input type="text" name="admission_score" class="form-control" placeholder="Test Score" value="{{$admission->admission_score}}" onkeypress="return onlyNumberKey(event)" >
                            {{--{{Form::text('admission_score', $admission->admission_score, ['id' => 'admission_score', 'class' => 'form-control number_only' . ($errors->has('admission_score') ? ' form-control number_only is-invalid' : null), 'placeholder' => 'Enter score', 'autocomplete' => 'off'])}}--}}
                            @error('admission_score') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
                        </div>
                        {{Form::hidden('_method', 'PUT')}}
                        <div class="col-md-12">
                            {{Form::submit('Save', ['id' => 'action_button', 'class' => 'btn btn-success btn-block'])}}
                        </div> 
                    {!! Form::close() !!}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection

@section('script')
    <!-- DataTables -->
    <script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
          });
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });

        function onlyNumberKey(evt) {
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode;
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            {
                return false;
            }
            return true;
        }
      </script>
@endsection