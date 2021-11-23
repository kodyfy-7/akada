@extends('layouts.panel')

@section('title')
    Input Subject Scores
@endsection

@section('style')
<!-- Toastr -->
<link rel="stylesheet" href="{{asset('panel/plugins/toastr/toastr.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/plugins//datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('page_title') 
Input Subject Scores 
@endsection
    
@section('breadcrumb')
    Scores
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
                    <form method="GET" action="{{ route('get.result.per.class') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="classroom_id" class="col-md-4 col-form-label text-md-right">{{ __('Classroom') }}</label>
                            <div class="col-md-6">
                                <select name="classroom_id" class="form-control" id="classroom_id" required>
                                    <option value="">Select classroom</option>                                   
                                        @foreach($classrooms as $classroom)
                                            <option value="{{$classroom->classroom_id}}">{{$classroom->classroom->classroom_title}} </option>
                                        @endforeach
                                </select>     
                            </div> 
                        </div>            
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Get data') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <hr>

                    @isset($results)
                    <p>Classroom: {{$classroom->classroom->classroom_title}}</p>
                    <p>Subject: {{$subject->subject_title}}</p>
                        {!! Form::open(['route' => 'subject.result.per.class', 'id' => 'attendance_form', 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
                        <select name="type" class="form-control" id="type" required>
                            <option value="">Select assessment type</option>                                   
                            <option value="1">First assessment</option> 
                            <option value="2">Second assessment</option> 
                            <option value="3">Examination</option> 
                        </select> 
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Student</th>
                                    <th>Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($results as $result)
                                    <tr>
                                        <td> {{$loop->iteration}} </td>
                                        <td> {{$result->student->full_name}} </td>
                                        <td>
                                            <input type="text" name="score[]" class="form-control" placeholder="Score" onkeypress="return onlyNumberKey(event)" >
                                            <input type="hidden" name="result_id[]" value="{{$result->id}}" >
                                        </td>
                                    </tr>
                                @empty
                                    No data
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S/N</th>
                                    <th>Student</th>
                                    <th>CA Score</th>
                                    <th>Exam Score</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                {{Form::submit('Save', ['id' => 'action_button', 'class' => 'btn btn-success btn-block'])}}
                            </div>
                        </div>
                    {!! Form::close() !!}  
                    @endisset
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