@extends('layouts.panel')

@section('title')
    Classroom
@endsection

@section('page_title')
  Classrooms | <a href="{{route('classrooms.index')}}" class="btn btn-link">Go back</a>
@endsection
    
@section('breadcrumb')
  Classrooms 
@endsection

@section('content')
    
  <div class="row">
    <div class="col-md-12">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">New Classroom</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove"><i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          {!! Form::open(['route' => 'classrooms.store', 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="form-group">
                  {{Form::label('classroom_title', 'Classroom Title')}}
                  {{Form::text('classroom_title', old('classroom_title'), ['id' => 'classroom_title', 'class' => 'form-control' . ($errors->has('classroom_title') ? ' form-control is-invalid' : null), 'placeholder' => 'J.S.1, J.S.2...', 'autocomplete' => 'off'])}}
                  @error('classroom_title') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
                </div>
                <div class="form-group">
                  {{Form::label('sub_title', 'Subtitle')}}
              
                  {{Form::text('sub_title', old('sub_title'), ['id' => 'sub_title', 'class' => 'form-control' . ($errors->has('sub_title') ? ' form-control is-invalid' : null), 'placeholder' => 'A, B, Science, Commercial, Art...', 'autocomplete' => 'off'])}}
                @error('sub_title') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror           
                </div>
              </div>
              <div class="col-md-4">
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
                              <option value="{{$subject->id}}">{{$subject->subject_title}} <small> | {{$subject->sub_title}}</small>
                              </option>
                          @endforeach
                      </select>      
                      </div>                                           
                    </td>
                    <td></td>
                  </tr>
                </table>
              </div>
              <div class="col-md-12">
                {{Form::submit('Save', ['id' => 'action_button', 'class' => 'btn btn-success btn-block'])}}
              </div> 
            </div>
          {!! Form::close() !!}
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

  <script>
    var count = 1;         
    $(document).on('click', '#add_row', function(){
      count++;
      $('#total_item').val(count);
      var html_code = '';
      html_code += '<tr id="row_id_'+count+'">';      
      html_code += '<td><select name="subject[]" class="form-control" id="subject'+count+'"><option value="">Select subject</option>@foreach($subjects as $subject)<option value="{{$subject->id}}">{{$subject->subject_title}} <small> | {{$subject->sub_title}}</small></option>                                        @endforeach</select>      </td>';           
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
    
@endsection