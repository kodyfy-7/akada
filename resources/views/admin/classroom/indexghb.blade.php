@extends('layouts.panel')

@section('title')
    Classrooms 
@endsection

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/plugins//datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('page_title')
    Classrooms | <a href="{{url("/admin/classrooms/create")}}" class="btn btn-link">Add new classroom</a>
@endsection
    
@section('breadcrumb')
  Classrooms 
@endsection

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body pb-0">
            <form class="mb-3" method="get">
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" id="filter" name="filter" value="{{$filter}}">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
            </form>
            <div class="row d-flex align-items-stretch">
                @if (!empty($classrooms))
                    @forelse ($classrooms as $classroom)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                            <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-0">
                                    {{$classroom->classroom_title}}
                                    @isset ($classroom->sub_title)
                                    || $classroom->sub_title
                                    @endisset
                                </div>
                                <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="text-muted text-sm"><b>Class Teacher: </b> 
                                            @isset($classroom->employee->full_name)
                           {{$classroom->employee->full_name}}            @endisset</p>
                                        <p class="text-muted text-sm"><b>Students: </b> 
                            {{$classroom->students->count()}}
                                  </p>
                                    </div>
                                </div>
                                </div>
                                <div class="card-footer">
                                <div class="text-right">
                                    <a href="
{{url("/admin/classrooms/$classroom->classroom_slug/edit")}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit Classroom">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    <a href="/sysAdmin/classrooms/{{$classroom->classroom_slug}}" class="btn btn-sm btn-primary"  data-toggle="tooltip" title="View Classroom">
                                        <i class="fas fa-eye"></i> 
                                    </a>
                                </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 col-sm-12 col-md-12 ">
                            <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-0">
                                    <span style="text-align: center">No data.</span>
                                </div>
                            </div>
                        </div>
                    @endforelse
                @endif
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            {{$classrooms->links()}}
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->


    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-sm">
          <div class="modal-content bg-danger">
              <div class="modal-header">
                <h4 class="modal-title">Delete data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
              </div>
              <div class="modal-footer">
                  <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
          </div>
        </div>
    </div>
    <!-- /.modal -->

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

