@extends('layouts.panel')

@section('title')
    Admissions
@endsection

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('panel/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('panel/plugins//datatables-responsive/css/responsive.bootstrap4.min.css')}}">

    @section('style')
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('panel/plugins/toastr/toastr.min.css')}}">
@endsection
@endsection

@section('page_title')
    Admissions
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
                    <h3 class="card-title">Admission list</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                    </div>
                </div>
                {!! Form::open(['route' => 'process_admission', 'id' => 'status_form', 'method' =>'POST']) !!}
                    <div class="card-body">
                        
                        @if (!empty($admissions))
                        
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Classroom</th>
                                        <th>Score</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($admissions as $admission)
                                        <tr>
                                            <td> {{$loop->iteration}} </td>
                                            <td> {{$admission->full_name}} </td>
                                            <td> {{$admission->classroom->classroom_title}} </td>
                                            <td> {{$admission->applicant_score}} </td>
                                            <td>
                                                <
                                                <input type="hidden" name="applicant_id[]" value="{{$admission->id}}" >
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Classroom</th>
                                        <th>Score</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>

                        @else
                            
                        @endif
                </div>
                <!-- /.card-body -->
                <div class="card-footer">    
                    @if (count($admissions) > 0)

                        {{Form::button('<i class="fa fa-check"></i>', ['type' => 'submit', 'class' => 'btn btn-success btn-xs btn-block', 'title' => 'Process Admision'])}}                        
                    @endif
                </div>
                <!-- /.card-footer-->
                {!! Form::close() !!}
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

    </script>
@endsection