@extends('layouts.panel')

@section('title')
    Employees
@endsection

@section('page_title')
    Employees | <a href="/sysAdmin/employees" class="btn btn-link">Go back</a>
@endsection
    
@section('breadcrumb')
  Employees 
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                        src="/storage/{{$employee->employee_image}}"
                        alt="Employee profile picture">
                </div>

                <h3 class="profile-username text-center">{{$employee->firstname}} {{$employee->middlename}} {{$employee->lastname}}</h3>
                
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <i class="fas fa-lg fa-chalkboard-teacher"></i></span> <a class="float-right">
                        @if ($employee->employee_role > 1)
                            Teacher
                        @else
                            Administrator
                        @endif
                        </a>
                    </li>
                    @if ($employee->employee_role > 1)
                        <li class="list-group-item">
                            <i class="fas fa-lg fa-chalkboard-teacher"></i></span> <a class="float-right">
                            @if ($employee->classroom_id !=null)
                                {{$employee->classroom->classroom_name .' || '. $employee->classroom->classroom_attribute}}
                            @else
                                                                
                            @endif
                            </a>
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-lg fa-book-open"></i></span> <a class="float-right">
                            @if ($employee->subject_id !=null)
                                {{$employee->subject->subject_title}}
                            @else
                                                                
                            @endif
                            </a>
                        </li>
                    @endif
                </ul>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#bio" data-toggle="tab">Bio</a></li>
                <!--<li class="nav-item"><a class="nav-link" href="#fees" data-toggle="tab">Fees</a></li>
                <li class="nav-item"><a class="nav-link" href="#attendance" data-toggle="tab">Attendance</a></li>
                <li class="nav-item"><a class="nav-link" href="#result" data-toggle="tab">Report</a></li>-->
            </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="bio">
                    <p class="text-muted text-sm"><b>Username: </b>
                        @if ($employee->employee_role > 1)
                            {{$employee->teacher->username}}
                        @else
                            {{$employee->admin->username}}
                        @endif
                    </p>    
                    <p class="text-muted text-sm"><b>Date of Birth: </b> {{$employee->dob}}</p>
                    <p class="text-muted text-sm" style="text-transform: capitalize"><b>Gender: </b> {{$employee->gender}}</p>
                    <p class="text-muted text-sm"><b>Employment Date: </b> {{$employee->created_at->diffForHumans()}}</p>
                    <p class="text-muted text-sm"><b>Phone Number: </b> {{$employee->phone_number}}</p>
                    <p class="text-muted text-sm"><b>Address: </b> {{$employee->address}}</p>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="fees">
                    
                </div>
                <!-- /.tab-pane -->


                <div class="tab-pane" id="result">
                    
                </div>
                <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
