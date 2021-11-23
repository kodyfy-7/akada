@extends('layouts.auth-app')

@section('title')
 Welcome
@endsection

@section('page_title')
  Welcome, please select your role.
@endsection
@section('content')
  
      <a href="{{ route('admin.login.submit') }}" title="Username - admin | Password - password"><span class="badge badge-info">Administrator Login</span></a>
      <a href="{{ route('teacher.login.submit') }}" title="Username - teacher | Password - password"><span class="badge badge-primary">Teacher Login</span></a>
      <a href="{{ route('student.login.submit') }}" title="Username - johndoe | Password - password"><span class="badge badge-secondary">Student Login</span></a>        
@endsection


