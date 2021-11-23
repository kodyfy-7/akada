@extends('layouts.panel')

@section('title')
    Timetable
@endsection

@section('style')
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('panel/plugins/toastr/toastr.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/plugins//datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('page_title')
    Timetable| <a href="{{url("/admin/classrooms/create")}}" class="btn btn-link">Add new classroom</a>
@endsection
    
@section('breadcrumb')
  Timetable
@endsection

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body pb-0">
            <form method="GET" action="{{ route('get.time.data.per.class') }}">
              @csrf
              <div class="form-group row">
                <label for="classroom_id" class="col-md-4 col-form-label text-md-right">{{ __('Classroom') }}</label>
                <div class="col-md-6">
                  <select name="classroom_id" class="form-control" id="classroom_id" required>
                    <option value="">Select classroom</option>                                
                      @foreach($classrooms as $classroom)
                        <option value="{{$classroom->id}}">{{$classroom->classroom_title}}
                        <small>
                          {{$classroom->sub_title}}
                        </small>
                        </option>
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
            <br>
            <br>
        </div>
        <!-- /.card-body -->
        
    </div>
    <!-- /.card -->
    
    @isset($monday)
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Timetable for {{$classroom->id}}</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            
            <table class="table table-responsive" border="5" cellspacing="0" align="center"> 

                <!--<caption>Timetable</caption>-->

                <tr> 

                    <td align="center" height="50" 

                        width="100"><br> 

                        <b>Day/Period</b></br> 

                    </td> 

                    <td align="center" height="50" 

                        width="100"> 

                        <b>I<br>9:30-10:20</b> 

                    </td> 

                    <td align="center" height="50" 

                        width="100"> 

                        <b>II<br>10:20-11:10</b> 

                    </td> 

                    <td align="center" height="50" 

                        width="100"> 

                        <b>III<br>11:10-12:00</b> 

                    </td> 

                    <td align="center" height="50" 

                        width="100"> 

                        <b>IV<br>12:40-1:30</b> 

                    </td> 

                    <td align="center" height="50" 

                        width="100"> 

                        <b>V<br>1:30-2:20</b> 

                    </td> 

                    <td align="center" height="50" 

                        width="100"> 

                        <b>VI<br>2:20-3:10</b> 

                    </td> 

                    <td align="center" height="50" 

                        width="100"> 

                        <b>VII<br>3:10-4:00</b> 

                    </td> 
                    
                <td align="center" height="50" 

                        width="100"> 

                        <b>VIII<br>3:10-4:00</b> 

                    </td> 

                </tr> 

                <tr> 

                    <td align="center" height="50"> 

                    <b>Monday</b></td> 
                    @foreach($monday as $monday)
                    
                        <td align="center" height="50">{{$monday->subject_title}}</td> 
                    @endforeach
                </tr> 

                <tr> 

                    <td align="center" height="50"> 

                        <b>Tuesday</b> 

                    </td> 

                    @foreach($tuesday as $tuesday)
                    
                        <td align="center" height="50">{{$tuesday->subject_title}}</td> 
                @endforeach

                </tr> 

                <tr> 

                    <td align="center" height="50"> 

                        <b>Wednesday</b> 

                    </td> 

                    @foreach($wednesday as $wednesday)
                    
                        <td align="center" height="50">{{$wednesday->subject_title}}</td> 
                    @endforeach

                    </td> 

                </tr> 

                <tr> 

                    <td align="center" height="50"> 

                        <b>Thursday</b> 

                    </td> 

                    @foreach($thursday as $thursday)
                    
                        <td align="center" height="50">{{$thursday->subject_title}}</td> 
                    @endforeach

                </tr> 

                <tr> 

                    <td align="center" height="50"> 

                        <b>Friday</b> 

                    </td> 

                    @foreach($friday as $friday)
                    
                        <td align="center" height="50">{{$friday->subject_title}}</td> 
                    @endforeach
                    
                </tr> 

            </table> 
            
            

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    @endisset


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

