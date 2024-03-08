@extends('auth.authlayout')
@section('title')
تسجيل الدخول
@endsection
@section('content')
<div class="login-box">
    
    <!-- /.login-logo -->
    <div class="card ">
      <div class="card-body login-card-body rounded">
        <p class="login-box-msg">تسجيل الدخول</p>
        @if(session('error'))
        <div class=" p-1 d-flex "><span class="text-danger">{{ session('error') }}</span></div>
        @endif
        <form action="{{ route('admin.login') }}" method="post">
            @csrf
          <div class="input-group mt-3 mb-1">
            <input type="text" name='username' value="{{ old('username') }}" class="form-control" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          @error('username')
              <div class=" p-1 d-flex"><span class="text-danger">{{ $message }}</span></div>
          @enderror
          
          <div class="input-group mt-3 mb-1">
            <input type="password" name='password' class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('password')
              <div class="p-1  d-flex "><span class=" text-danger">{{ $message }}</span></div>
          @enderror
          <div class="row">
            {{-- <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div> --}}
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat rounded mt-3">{{ __('messages.login') }}</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
       
        </div>
        <!-- /.social-auth-links -->
  
     
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
@endsection  