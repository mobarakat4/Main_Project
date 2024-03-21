@extends('user.auth.layout')
@section('title')
sign up
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
      <!-- Register Card -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          
          <!-- /Logo -->
          <h4 class="mb-2 text-center">Sign Up</h4>
          {{-- <p class="mb-4">Make your app management easy and fun!</p> --}}

          <form id="formAuthentication" class="mb-3" action="{{ route('user.register') }}" method="POST">
            @csrf
            @error('name')
              <div class="p-1  d-flex "><span class=" text-danger">{{ $message }}</span></div>
              @enderror
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                placeholder="Enter your username"
                value="{{ old('name') }}"
                autofocus
              />
            </div>
            @error('username')
              <div class="p-1  d-flex "><span class=" text-danger">{{ $message }}</span></div>
              @enderror
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input
                type="text"
                class="form-control"
                id="username"
                name="username"
                placeholder="Enter your username"
                value="{{ old('username') }}"
                
              />
            </div>
            @error('email')
              <div class="p-1  d-flex "><span class=" text-danger">{{ $message }}</span></div>
              @enderror
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input 
              type="text" 
              class="form-control" 
              id="email" 
              name="email" 
              placeholder="Enter your email" 
              value="{{ old('email') }}"/>
            </div>
            @error('password')
              <div class="p-1  d-flex "><span class=" text-danger">{{ $message }}</span></div>
              @enderror
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">Password</label>
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

            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                <label class="form-check-label" for="terms-conditions">
                  I agree to
                  <a href="javascript:void(0);">privacy policy & terms</a>
                </label>
              </div>
            </div>
            <button class="btn btn-primary d-grid w-100">Sign up</button>
          </form>

          <p class="text-center">
            <span>Already have an account?</span>
            <a href="{{ route('user.login') }}">
              <span>Sign in instead</span>
            </a>
          </p>
        </div>
      </div>
      <!-- Register Card -->
    </div>
  </div>
</div>
  
@endsection  