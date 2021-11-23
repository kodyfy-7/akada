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
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Student</th>
                                <th>Result status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($results as $result)
                                <tr>
                                    <td> {{$loop->iteration}} </td>
                                    <td> {{$result->student->full_name}} </td>
                                    <td>
                                        @if ($result->result_status === 1)
                                            <span class="badge badge-success">Set</span>
                                        @else
                                            <span class="badge badge-warning">Not set</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="/teacher/classroom-result/{{$result->result_slug}}">
                                            <i class="fas fa-folder">
                                            </i>
                                        </a> 
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
                                <th>Result status</th>
                            </tr>
                        </tfoot>
                    </table>
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