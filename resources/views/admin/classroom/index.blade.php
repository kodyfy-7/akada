@extends('layouts.panel')

@section('title')
    Classrooms 
@endsection

@section('style')
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('panel/plugins/toastr/toastr.min.css')}}">
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
            @isset($subjects_offered)
              <p>Data for {{$classroom->classroom_title}} <small>{{$classroom->sub_title}}</small></p>
            @endisset
            <form method="GET" action="{{ route('get.data.per.class') }}">
              @csrf
              <div class="form-group row">
                
                <div class="col-md-8 offset-md-2">
                  <label for="classroom_id" class="col-form-label text-md-right">{{ __('Classroom') }}</label>
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
                <div class="col-md-8 offset-md-2">
                  <button type="submit" class="btn btn-primary btn-block">
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
    
    @isset($students)
      <div class="row">
        <div class="col-md-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                Students
              </h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove"><i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
              @if(count($students)>0)
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th>SN</th>
                  <th>Name & Reg. No</th>
                  <th>View</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($students as $student)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$student->full_name}}
                      <small>
                        {{$student->registration_number}}
                      </small>
                      </td>
                      <td>
                        <a href="{{route("student.profile",$student->student_slug)}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="View Student"><i class="fas fa-eye"></i>
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              @else
                    
              @endif
            </div>
            <!-- /.card-body -->            
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
      <div class="row">
        <div class="col-md-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                Subject Offered
              </h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove"><i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
              @isset($subjects_offered)
                <div class="row">
                  <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                        <th>SN</th>
                        <th>Subject</th>
                        <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($subjects_offered as $subject_offered)
                        <tr>
                          <td>**</td>
                          <td>{{$subject_offered->subject_title}}<small>{{$subject_offered->sub_title}}</small></td>
                          <td>Action</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-6">
                    {!! Form::open(['route' => 'classrooms.save.subject', 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
                    <table id="subject_table" class="table">
                      <tr>
                        <th>Add Subjects</th>
                        <th width="5%"><button type="button" name="add_row" id="add_row" class="btn btn-success btn-xs">+</button></th>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-group">
                            <select name="subject[]" class="form-control" id="subject1" required>
                              <option value="">Select subject</option>
                              @foreach($subjects as $subject)
                                  <option value="{{$subject->id}}">{{$subject->subject_title}} <small>{{$subject->sub_title}}</small>
                                  </option>
                              @endforeach
                          </select>      
                          </div>                                           
                        </td>
                        <td></td>
                      </tr>
                      
                    
                    </table>
                    <div class="col-md-12">
                      <input type="hidden" value="{{$classroom_id}}" name="classroom_id">
                      {{Form::submit('Save', ['id' => 'action_button', 'class' => 'btn btn-success btn-block'])}}
                    </div> 
                    {!! Form::close() !!}
                </div>
                </div>
              @endisset
                
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

  @isset($students)
  <script>
    var count = 1;         
    $(document).on('click', '#add_row', function(){
      count++;
      $('#total_item').val(count);
      var html_code = '';
      html_code += '<tr id="row_id_'+count+'">';      
      html_code += '<td><select name="subject[]" class="form-control" id="subject'+count+'"><option value="">Select subject</option>@foreach($subjects as $subject)<option value="{{$subject->id}}">{{$subject->subject_title}} <small> {{$subject->sub_title}}</small></option>                                        @endforeach</select>      </td>';           
      html_code += '<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">X</button></td>';
      html_code += '</tr>';
        $('#subject_table').append(html_code);
    });
                    
    $(document).on('click', '.remove_row', function(){
      var row_id = $(this).attr("id");
      $('#row_id_'+row_id).remove();
      count--;
      $('#total_item').val(count);
    });
  </script>
  @endisset
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

