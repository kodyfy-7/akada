@extends('layouts.panel')

@section('title')
    Subjects
@endsection

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/plugins//datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('page_title')
    Subjects | <a href="/sysAdmin/subjects/create" class="btn btn-link">Add new subject</a>
@endsection

@section('breadcrumb')
    Subjects 
@endsection

@section('content')
  
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of Subjects</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    @if (count($subjects) > 0)
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr align="center">
                                    <th width="10%">S/N</th>
                                    <th width="40%">Subject Title</th>
                                    <th width="40%">Teacher</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $subject)
                                    <tr align="center">
                                        <td> {{$loop->iteration}} </td>
                                        <td> <span style="text-transform: capitalize;">{{$subject->subject_title}} <small>{{$subject->sub_title}}</small></span> </td>
                                        <td> 
                                            @if (empty($subject->employee))
                                                <span class="badge bg-danger">No Teacher</span>
                                            @else
                                                <span class="badge bg-info" tyle="text-transform: capitalize;">{{$subject->employee->full_name}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-xs" href="/admin/subjects/{{$subject->subject_slug}}/edit"><i class="fas fa-fw fa-edit"></i></a>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr align="center">
                                    <th width="10%">S/N</th>
                                    <th width="40%">Subject Title</th>
                                    <th width="40%">Teacher</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    @else
                        
                    @endif
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
      </script>
@endsection