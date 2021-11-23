@extends('layouts.panel')

@section('title')
    Attendance
@endsection

@section('style')
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('panel/plugins/toastr/toastr.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('panel/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('panel/plugins//datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('page_title')
    Attendance 
@endsection
    
@section('breadcrumb')
    Student Attendance
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $employee->classroom->classroom_title .' || '. $employee->classroom->sub_title }} </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove"><i class="fas fa-times"></i></button>
                </div>
            </div>
            @if (count($students) > 0)
                {!! Form::open(['route' => 'attendance.store', 'id' => 'attendance_form', 'method' =>'POST']) !!}
                    <div class="card-body">
                        <table id="example1" class="table  table-striped">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name & Reg. No</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td> {{$loop->iteration}} </td>
                                        <td> {{$student->full_name}} <br> {{ $student->registration_number }}</td>
                                        <td>
                                            <div id="attendance" class="btn-group" data-toggle="buttons">
                                                <label class="btn btn-success" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                  <input required type="radio" name="attendance[{{ $student->id }}]" value="Present"> &nbsp; Present &nbsp;
                                                </label>
                                                <label class="btn btn-danger" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                  <input required type="radio" name="attendance[{{ $student->id }}]" value="Absent"> Absent
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <input class="btn btn-primary btn-block" type="submit" value="Submit Attendance">
                    </div>
                    <!-- /.card-footer-->
                {!! Form::close() !!}
            @endif
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
    <script src="{{asset('panel/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('panel/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('panel/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('panel/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

    
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
      </script>
@endsection