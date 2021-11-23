@extends('layouts.panel')

@section('title')
    Classroom Results
@endsection

@section('style')
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('panel/plugins/toastr/toastr.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/plugins//datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('page_title') 
    Classroom Results
@endsection
    
@section('breadcrumb')
    Classroom Results
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                  @if (!empty($results))
                   {!! Form::open(['route' => ['update.result'], 'id' => 'attendance_form', 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
                             <input type="hidden" name="result_id" id="result_id" class="form-control input-sm" value="{{$result_slug->id}}" readonly/>
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" name="student" id="student" class="form-control input-sm" value="{{$student->full_name}}" readonly/>
                                    <input type="text" name="classroom" id="classroom" class="form-control input-sm" value="{{$student->classroom->classroom_title}}" readonly/>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="session" id="session" class="form-control input-sm" value="{{$year->session}}" readonly/>
                                    @if ($year->term == 1)
                                        <input type="text" name="term" id="term" class="form-control input-sm" value="First Term" readonly/>
                                    @elseif($year->term == 2)
                                        <input type="text" name="term" id="term" class="form-control input-sm" value="Second Term" readonly/>
                                    @else
                                        <input type="text" name="term" id="term" class="form-control input-sm" value="Third Term" readonly/>
                                    @endif
                                </div>
                            </div> 
                            <br>
                                <table id="example1" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th width="5%">S/N</th>
                                            <th width="60%">Subject</th>
                                            <th width="10%">C.A</th>
                                            <th width="10%">Exam</th>
                                            <th width="10%">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($results as $res)
                                            <tr>
                                                <td> {{$loop->iteration}} </td>
                                                <td> {{$res->subject->subject_title}} </td>
                                                <td> 
                          @php
        $total_ca = $res->ca_1 + $res->ca_2 ;
    @endphp                      
                                                {{$total_ca}}</td>
                                                <td> {{$res->exam_score}}</td>
                                                <td> {{$res->total_score}}</td>
                                            </tr>
                                        @empty
                                            No data
                                        @endforelse
                                        <tr>
                                            <td colspan="4" align="right">Attendance</td>
                                            <td><input type="text" name="attendance" id="attendance" class="form-control input-sm" value="{{$attendance_per_cent}}%" readonly/></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" align="right">Total</td>
                                            <td><input type="text" name="grand_score" id="grand_score" class="form-control input-sm" value="{{$result_total_score}}" readonly/></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" align="right">Average</td>
                                            <td><input type="text" name="average_score" id="average_score" class="form-control input-sm" value="{{$result_average_score}}" readonly/></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" align="right">Grade</td>
                                            <td><input type="text" name="grade" id="grade" class="form-control input-sm" value="{{$grade}}" readonly/></td>
                                        </tr>
                                        @if ($year->term == 3)
                                            <tr>
                                                <td colspan="4" align="right">Session Average</td>
                                                <td><input type="text" name="session_average" id="session_average" class="form-control input-sm" value="{{$session_average}}" readonly/></td>
                                            </tr>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" align="center">Teacher's Comment
                                            </td>
                                            <td colspan="2" align="center"><input type="text" name="comment" id="comment" class="form-control input-sm" value="{{$result->comment}}"/>
                                                @error('comment') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" align="center">
                                                {{Form::submit('Save', ['id' => 'action_button', 'class' => 'btn btn-success btn-block'])}}
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table> 
                        {!! Form::close() !!}
                    @endif

                    
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
    <!-- Toastr -->
    <script src="{{asset('panel/plugins/toastr/toastr.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

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

    <script>
        $(function () {
          $("#example1").DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
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