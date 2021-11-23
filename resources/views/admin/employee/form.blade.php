<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="form-group">
            {{Form::label('full_name', 'Full Name *')}}
            {{Form::text('full_name', old('full_name') ?? $employee->full_name, ['id' => 'full_name', 'class' => 'form-control' . ($errors->has('full_name') ? ' form-control is-invalid' : null), 'placeholder' => 'Enter employee name', 'autocomplete' => 'off'])}}
            @error('full_name') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
        </div>
        
        <div class="form-group">
            {{Form::label('employee_role', 'Employee Role *')}}
            {{Form::select('role_id', App\Models\Role::pluck('role', 'id'), old('role_id') ?? $employee->role_id,['id' => 'role_id', 'class' => 'form-control role_id' . ($errors->has('role_id') ? ' form-control role_id is-invalid' : null), 'placeholder' => 'Select role'])}}
            
        </div>
        <div class="2 box">
            <div class="form-group">
                {{Form::label('classroom_id', 'Select Class')}}
                {{Form::select('classroom_id', App\Models\Classroom::pluck('classroom_title', 'id'), old('classroom_id') ?? $employee->classroom_id,['id' => 'classroom_id', 'class' => 'form-control' . ($errors->has('classroom_id') ? ' form-control is-invalid' : null), 'placeholder' => 'Select Classroom'])}}
                @error('classroom_id') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
            </div>
            <div class="form-group">
                {{Form::label('subject_id', 'Select Subject')}}
                {{Form::select('subject_id', App\Models\Subject::pluck('subject_title', 'id'), old('subject_id') ?? $employee->subject_id,['id' => 'subject_id', 'class' => 'form-control' . ($errors->has('subject_id') ? ' form-control is-invalid' : null), 'placeholder' => 'Select Subject'])}}
                @error('subject_id') <span class="text-danger"><small><strong>{{ $message }}</strong></small></span> @enderror
            </div>
        </div>

 <div class="form-group">
            <label for="employee_image" class="">{{ __('Employee Image') }}</label>
        
            <input id="employee_image" type="file" class="@error('employee_image') is-invalid @enderror" name="employee_image"  autofocus>
            @if (!empty($employee->employee_image))
                <span><img class="profile-user-img img-fluid img-circle"
                    src="/storage/{{$employee->employee_image}}"
                    alt="Employee profile picture"></span>
            @endif
        
            @error('employee_image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
        </div>
        <div class="col-md-12">
            {{Form::submit('Save', ['id' => 'action_button', 'class' => 'btn btn-success btn-block'])}}
        </div> 
        
    </div>
</div>

