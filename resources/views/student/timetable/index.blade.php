@extends('layouts.panel')

@section('title')
Timetable for {{$classroom->classroom_title}}
@endsection

@section('pageStatus')
    Timetable for {{$classroom->classroom_title}}
@endsection

@section('page_title')
  Timetable for {{$classroom->classroom_title}} 
@endsection

@section('breadcrumb')
  Timetable for {{$classroom->classroom_title}}
@endsection

@section('style')
    <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('panel/css/toastr/toastr.min.css')}}">
@endsection

@section('content')
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
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

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Withdraw Requests</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Details</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
@endsection

@section('script')
  <!-- Toastr -->
  <script src="{{asset('panel/js/toastr/toastr.min.js')}}"></script>

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