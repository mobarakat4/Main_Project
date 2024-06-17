@extends('user.auth.layout')
@section('title')
تسجيل الدخول
@endsection
@section('style')
  <style>

    .authentication-inner{
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .card{

      width: 400px;
    }
  </style>
@endsection
@section('content')

<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->

          <!-- /Logo -->
          <h4 class="mb-2">Welcome </h4>
          <p class="mb-4">Please sign-in </p>
          {{-- this when  send error message --}}
          @if(session('error'))
          <div class=" p-1 d-flex "><span class="text-danger">{{ session('error') }}</span></div>
          @endif
          {{-- this when sent success message --}}

          <form id="formAuthentication" class="mb-3" action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Username</label>
              <input
                type="text"
                class="form-control"
                id="email"
                name='username' value="{{ old('username') }}" class="form-control" placeholder="Username"
                autofocus
              />
            </div>
            @error('username')
              <div class=" p-1 d-flex"><span class="text-danger">{{ $message }}</span></div>
            @enderror
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                <a href="{{ route('show_forgotPassword_page') }}">
                  <small>Forgot Password?</small>
                </a>
              </div>
              <div class="input-group input-group-merge">
                <input
                  type="password"
                  id="password"
                  class="form-control"
                  name="password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="password"
                />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
              @error('password')
              <div class="p-1  d-flex "><span class=" text-danger">{{ $message }}</span></div>
              @enderror
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
          </form>

          
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>
  <!-- /.login-box -->
@endsection
