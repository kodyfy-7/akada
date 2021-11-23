
        <div class="form-group">
            {{Form::label('classroom_title', 'Classroom Name')}}
            {{Form::text('classroom_title', old('classroom_title') ?? $classroom->classroom_title, ['id' => 'classroom_title', 'class' => 'form-control' . ($errors->has('classroom_title') ? ' form-control is-invalid' : null), 'placeholder' => 'J.S.1, J.S.2...', 'autocomplete' => 'off'])}}
            @error('classroom_title') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
        <div class="form-group">
            {{Form::label('sub_title', 'Description')}}
  
                {{Form::text('sub_title', old('sub_title') ?? $classroom->sub_title, ['id' => 'sub_title', 'class' => 'form-control' . ($errors->has('sub_title') ? ' form-control is-invalid' : null), 'placeholder' => 'A, B, Science, Commercial, Art...', 'autocomplete' => 'off'])}}
                @error('sub_title') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror          
        </div>
        
        <div class="col-md-12">

                  {{Form::submit('Save', ['id' => 'action_button', 'class' => 'btn btn-success btn-block'])}}

                </div> 
       