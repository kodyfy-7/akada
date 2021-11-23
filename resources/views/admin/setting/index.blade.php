@extends('layouts.panel')

@section('title')
  Settings
@endsection

@section('page_title')
  Settings
@endsection
    
@section('breadcrumb')
  Settings
@endsection

@section('style')
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('panel/plugins/toastr/toastr.min.css')}}">
@endsection

@section('content')
    
  <div class="row">
    <div class="col-md-3">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Result Status</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove"><i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <a class="btn btn-warning btn-block" href="#result-modal" data-toggle="modal">Update result</a>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="modal fade" id="result-modal">
            <div class="modal-dialog result-modal">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Results</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <h4>You re about to 
                    @if ($year->result_status == 0)
                      publish results
                    @else
                      unpublish results
                    @endif
                    for {{$year->session}} - @if($year->term == 1)
                      first
                    @elseif($year->term == 2)
                      second
                    @else
                      third
                    @endif term.
                  </h4>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  {!! Form::open(['route' => 'result.status', 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                      {{Form::hidden('year_id', $year->id)}}
                      @if ($year->result_status == 0)
                        {{Form::submit('Open Result Viewing', ['id' => 'action_button', 'class' => 'btn btn-success btn-block'])}}
                      @else
                        {{Form::submit('Close Result Viewing', ['id' => 'action_button', 'class' => 'btn btn-success btn-block'])}}
                      @endif
                      
                    </div>
                  {!! Form::close() !!}
                  
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-3">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Upgrade Year</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove"><i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <a class="btn btn-secondary btn-block" href="#year-modal" data-toggle="modal">Upgrade year</a>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="modal fade" id="year-modal">
            <div class="modal-dialog year-modal">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Upgrade year</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <h4>You are about to upgrade session {{$year->session}} - @if($year->term == 1)
                      first
                    @elseif($year->term == 2)
                      second
                    @else
                      third
                    @endif term.
                  </h4>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  {!! Form::open(['route' => 'year.upgrade', 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                      {{Form::hidden('year_id', $year->id)}}
                      @if ($year->result_status == 0)
                        {{Form::submit('Results not published yet', ['id' => 'action_button', 'class' => 'btn btn-success btn-block', 'disabled' => 'disabled'])}}
                      @else
                        {{Form::submit('Process', ['id' => 'action_button', 'class' => 'btn btn-success btn-block'])}}
                      @endif
                      
                    </div>
                  {!! Form::close() !!}
                  
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
    @if($year->term == 1)
    <div class="col-md-3">
    @else 
    <div class="col-md-6">
    @endif
    
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Year Settings</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove"><i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          {!! Form::open(['route' => 'year.settings', 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="row justify-content-center">
              <div class="col-md-8">
                {{Form::hidden('year_id', $year->id)}}
                <div class="form-group">
                  {{Form::label('session', 'Session')}}
                  {{Form::text('session', $year->session, ['id' => 'session', 'class' => 'form-control' . ($errors->has('session') ? ' form-control is-invalid' : null), 'placeholder' => '2000/2001', 'autocomplete' => 'off'])}}
                  @error('session') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
                </div>
                <div class="form-group">
                  {{Form::label('term', 'Term')}}
                  {{Form::select('term',  ['1' => 'First', '2' => 'Second', '3' => 'Third'], $year->term,['id' => 'term', 'class' => 'form-control' . ($errors->has('term') ? ' form-control is-invalid' : null), 'placeholder' => 'Select term'])}} 
                  @error('term') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
                </div>
                <div class="form-group">
                  {{Form::label('days_per_session', 'Days in session *')}}
                  {{Form::text('days_per_session', $year->days_per_session, ['id' => 'days_per_session', 'class' => 'form-control' . ($errors->has('days_per_session') ? ' form-control is-invalid' : null), 'placeholder' => '90', 'autocomplete' => 'off'])}}
                  @error('days_per_session') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
                </div>
                <div class="form-group">
                  {{Form::label('admission_score', 'Admission Score')}}
                  {{Form::text('admission_score', $year->admission_score, ['id' => 'admission_score', 'class' => 'form-control' . ($errors->has('admission_score') ? ' form-control is-invalid' : null), 'placeholder' => '45', 'autocomplete' => 'off'])}}
                  @error('admission_score') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
                </div>

                <div class="col-md-12">
                  {{Form::submit('Save', ['id' => 'action_button', 'class' => 'btn btn-success btn-block'])}}
                </div> 
        
              </div>
            </div>
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
    @if($year->term == 1)
      <div class="col-md-3">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Admission Status</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            {!! Form::open(['route' => 'admission.status', 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
              {{Form::hidden('year_id', $year->id)}}
              {{Form::submit('Change Admission Status', ['id' => 'action_button', 'class' => 'btn btn-success btn-block'])}}
            </div>
            {!! Form::close() !!}
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <div class="modal fade" id="admission-modal">
              <div class="modal-dialog admission-modal">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Results</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h4>You re about to 
                      @if ($year->result_status == 0)
                        publish results.
                      @else
                        unpublish results.
                      @endif
                      for {{$year->session}} - @if($year->term == 1)
                        first
                      @elseif($year->term == 2)
                        second
                      @else
                        third
                      @endif term.
                    </h4>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {!! Form::open(['route' => 'result.status', 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
                      <div class="form-group">
                        {{Form::hidden('year_id', $year->id)}}
                        @if ($year->result_status == 0)
                          {{Form::submit('Open Result Viewing', ['id' => 'action_button', 'class' => 'btn btn-success btn-block'])}}
                        @else
                          {{Form::submit('Close Result Viewing', ['id' => 'action_button', 'class' => 'btn btn-success btn-block'])}}
                        @endif
                        
                      </div>
                    {!! Form::close() !!}
                    
                  </div>
                  {!! Form::close() !!}
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    @else
      
    @endif
  </div>
  <!-- /.row -->

@endsection

@section('script')
  <!-- Toastr -->
  <script src="{{asset('panel/plugins/toastr/toastr.min.js')}}"></script>

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