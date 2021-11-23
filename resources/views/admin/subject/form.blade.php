<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="form-group">
            {{Form::label('subject_title', 'Subject Title')}}
            {{Form::text('subject_title', old('subject_title') ?? $subject->subject_title, ['id' => 'subject_title', 'class' => 'form-control' . ($errors->has('subject_title') ? ' form-control is-invalid' : null), 'placeholder' => 'Enter subject title', 'autocomplete' => 'off'])}}
            @error('subject_title') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
        <div class="form-group">
            {{Form::label('sub_title', 'Subtitle')}}
            {{Form::text('sub_title', old('sub_title') ?? $subject->sub_title, ['id' => 'sub_title', 'class' => 'form-control' . ($errors->has('sub_title') ? ' form-control is-invalid' : null), 'placeholder' => 'Subject description', 'autocomplete' => 'off'])}}
            @error('sub_title') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
        <div class="col-md-12">
            {{Form::submit('Save', ['id' => 'action_button', 'class' => 'btn btn-success btn-block'])}}
        </div> 
    </div>
</div>