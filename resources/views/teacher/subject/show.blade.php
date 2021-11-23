@extends('layouts.panel')

@section('title')
    Class
@endsection

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/plugins//datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('page_title') 
    Class 
@endsection
    
@section('breadcrumb')
    Class
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('inc.messages')
        </div>
        <div class="col-md-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ auth()->user()->classroom->classroom_name }} ||
                    {{ auth()->user()->classroom->classroom_attribute }}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    {{ $classroom->classroom_name }} | <small>{{ $classroom->classroom_attribute }}</small>


                    @if (!empty($results))
                    {!! Form::open(['action' => 'Users\Teacher\ClassroomController@store', 'id' => 'attendance_form', 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('score_type', 'Select Type')}}
                            {{Form::select('score_type', ['1' => 'Test', '2' => 'Exam'], null,['id' => 'score_type', 'class' => 'form-control' . ($errors->has('score_type') ? ' form-control is-invalid' : null), 'placeholder' => 'Select Type'])}}
                            
                            @error('score_type') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Topic</th>
                                    <th>Classroom</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($results as $result)
                                    <tr>
                                        <td> {{$loop->iteration}} </td>
                                        <td> {{$result->student->name}} 
                                        </td>
                                        <td>
                                            <input type="hidden" name="result_id[]" value="{{$result->id}}" >
                                            <input type="text" name="test_mark[]" class="form-control" placeholder="Test Score" > <input type="text" name="exam_mark[]" class="form-control" placeholder="Exam Score" > 
                                        </td>
                                    </tr>
                                @empty
                                    No data
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S/N</th>
                                    <th>Topic</th>
                                    <th>Classroom</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                {{Form::submit('Save', ['id' => 'action_button', 'class' => 'btn btn-success btn-block'])}}
                            </div>
                        </div>
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
    <!-- DataTables -->
    <script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

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