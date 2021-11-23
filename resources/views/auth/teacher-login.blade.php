@extends('layouts.auth-app')

@section('title')
 Teacher Login Page
@endsection

@section('page_title')
  Sign in as teacher
@endsection
@section('content')
  <form method="POST" action="{{ route('teacher.login.submit') }}">
    @csrf
    <div class="input-group mb-3">
      <input type="text" name="username" class="form-control {{ $errors->has('username') ? 'error' : '' }}" required="">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-envelope"></span>
        </div>
      </div>
      <!-- Error -->
      @if ($errors->has('username'))
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>

        </span>
      @endif
    </div>
    <div class="input-group mb-3">
      <input type="password" name="password" class="form-control {{ $errors->has('username') ? 'error' : '' }}" required placeholder="Password">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
      <!-- Error -->
      @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>

        </span>
      @endif
    </div>
    <div class="row">
      <div class="col-12">
        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
      </div>
      <!-- /.col -->
    </div>
  </form>
@endsection
