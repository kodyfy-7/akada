@extends('layouts.panel')

@section('title')
    Classrooms | {{ config('app.name', 'kodyEdu') }}
@endsection

@section('page_title')
    Classrooms | <a href="/sysAdmin/classrooms" class="btn btn-link">Go back</a>
@endsection
    
@section('breadcrumb')
  Classrooms > {{$classroom->classroom_name}} >
  @if (!empty($classroom->classroom_attribute))
    @if ($classroom->classroom_attribute = 1)
        Science
    @elseif($classroom->classroom_attribute = 2)
        Commercial
    @else
        Art
    @endif
  @else
      
  @endif
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('inc.messages')
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-header">
                    <h3 class="card-title">Students list</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <div class="row d-flex align-items-stretch">
                        @if (!empty($students))
                            <table id="example1" class="table table-striped">
                                <thead>
                                    <tr align="center">
                                        <th width="10%">S/N</th>
                                        <th width="35%">Info</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($students as $student)
                                        <tr align="center">
                                            <td> {{$loop->iteration}} </td>
                                            <td> {{$student->name}} <br> <small>{{$student->reg_id}}</small> </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-warning btn-xs" href="/sysAdmin/students/{{$student->student_slug}}/"><i class="fas fa-fw fa-eye"></i></a>
                                                </div>
                                                    
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" align="center"><strong>No data!</strong></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr align="center">
                                        <th>S/N</th>
                                        <th>Info</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-header">
                    <h3 class="card-title">Subjects list</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-success btn-tool" data-toggle="modal" data-target="#modal-subjects" data-toggle="tooltip" title="Add subjects">
                            <i class="fas fa-plus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <div class="row d-flex align-items-stretch">
                        @if (!empty($classroom_subjects))
                            <table id="example1" class="table table-striped">
                                <thead>
                                    <tr align="center">
                                        <th width="10%">S/N</th>
                                        <th width="35%">Info</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($classroom_subjects as $classroom_subject)
                                        <tr align="center">
                                            <td> {{$loop->iteration}} </td>
                                            <td> {{$classroom_subject->subject->subject_title}}  </td>
                                            <td>
                                                <div class="btn-group">
                                                    {!!Form::open(['action' => ['Users\Admin\ClassroomController@destroy_subject', $classroom_subject->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                        {{Form::hidden('_method', 'DELETE')}}
                                                        {{Form::button('<i class="fa fa-fw fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs'])}}
                                                    {!!Form::close()!!}
                                                </div>
                                                
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" align="center"><strong>No data!</strong></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr align="center">
                                        <th>S/N</th>
                                        <th>Info</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-subjects">
            <div class="modal-dialog">
              <div class="modal-content bg-primary">
                <div class="modal-header">
                  <h4 class="modal-title">Profile</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                {!! Form::open(['action' => 'Users\Admin\ClassroomController@save_subject', 'id' => 'subject_form', 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="modal-body">
                        <input type="hidden" name="classroom" value="{{$classroom->id}}">
                        <table id="subject_table" class="table">
                            <tr>
                              <th>Add Subjects</th>
                              <th width="5%"><button type="button" name="add_row" id="add_row" class="btn btn-success btn-xs"><i class="fas fa-plus"></i></button></th>
                            </tr>
                            <tr>
                              <td>
                                <div class="form-group">
                                  <select name="subject[]" class="form-control" id="subject1" required>
                                    <option value="">Select subject</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->subject_title}} <small> |{{$subject->subject_attribute}}</small>
                                        </option>
                                    @endforeach
                                </select>      
                                </div>                                           
                              </td>
                              <td></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Save Subject') }}
                        </button>
                    </div>
                
                {!! Form::close() !!}
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
    <!-- /.row -->
@endsection

@section('script')

  <script>
    var count = 1;         
    $(document).on('click', '#add_row', function(){
      count++;
      $('#total_item').val(count);
      var html_code = '';
      html_code += '<tr id="row_id_'+count+'">';      
      html_code += '<td><select name="subject[]" class="form-control" id="subject'+count+'"><option value="">Select subject</option>@foreach($subjects as $subject)<option value="{{$subject->id}}">{{$subject->subject_title}} <small>| {{$subject->subject_attribute}}</small></option>                                        @endforeach</select>      </td>';           
      html_code += '<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row"><i class="fas fa-trash"></i></button></td>';
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
    
@endsection


