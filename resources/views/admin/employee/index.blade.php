@extends('layouts.panel')

@section('title')
    Employees
@endsection

@section('page_title')
    Employees | <a href="/sysAdmin/employees/create" class="btn btn-link">Add new employee</a>
@endsection
    
@section('breadcrumb')
  Employees 
@endsection

@section('content')
  
    <div class="row">
        <div class="col-md-12">
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
                        @if (!empty($employees))
                            @forelse ($employees as $employee)
                                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                    <div class="card bg-light">
                                        <div class="card-header text-muted border-bottom-0">
                                            @if ($employee->role_id > 1)
                                                Teacher
                                            @else
                                                Administrator
                                            @endif
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="lead"><b>{{$employee->full_name}}</b></h2>
                                                    @if ($employee->role_id > 1)
                                                        <p class="text-muted text-sm"><b>Class: </b> 
                                                            @if (is_null($employee->classroom_id))
                                                                Not attached
                                                            @else
                                                                {{$employee->classroom->classroom_title}}
                                                            @endif
                                                        </p>
                                                        <p class="text-muted text-sm"><b>Subject: </b> 
                                                            @if (is_null($employee->subject_id))
                                                                Null
                                                            @else
                                                                {{$employee->subject->subject_title}}
                                                            @endif
                                                        </p>
                                                    @endif
                                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> {{$employee->email}}</li>
                                                    </ul>
                                                </div>
                                                <div class="col-5 text-center">
                                                    <img src="{{$employee->employee_image}}"
                                                    alt="employee profile picture" class="img-circle img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="btn-group">
                                                <a href="/admin/employees/{{$employee->employee_slug}}/edit" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-user"></i> Edit Profile
                                                </a>
                                                <a href="/admin/employees/{{$employee->employee_slug}}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-user"></i> View Profile
                                                </a>
                                                {{--{!!Form::open(['action' => ['Users\Admin\EmployeeController@destroy', $employee->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                                                {!!Form::close()!!}--}}
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    
                                                </div>
                                                <div class="col-md-6 pull-right">
                                                    
                                                </div>
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
                    <p>Displaying {{$employees->count()}} of {{$employees->total()}} employee(s)</p>
                    {{$employees->links()}}
                </div>
                <!-- /.card-footer -->
            </div>
        </div>
    </div>
    <!-- /.row -->

@endsection
