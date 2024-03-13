
@extends('user.auth.layout')
@section('title')
reset password
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
            <h4 class="my-6 text-center">Reset Password</h4>
            {{-- <p class="mb-4">Please sign-in to your account and start the adventure</p> --}}
            @error('password')
              <div class=" p-1 d-flex"><span class="text-danger">{{ $message }}</span></div>
            @enderror
            <form id="formAuthentication" class="mb-3" action="{{ route('user.resetPassword', ['email' => request()->email])}}" method="POST">
              @csrf
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">New Password</label>
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
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Confirm Password</label>
                </div>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="password_confirmation"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password"
                  />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Change</button>
              </div>
            </form>

            {{-- <p class="text-center">
              <span>New on our platform?</span>
              <a href="auth-register-basic.html">
                <span>Create an account</span>
              </a>
            </p> --}}
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>
    
@endsection