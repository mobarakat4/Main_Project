@extends('layouts.main')
@section('style')
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    
@endsection

@section('header')
    @include('user.components.headers.profile')
@endsection

@section('content')

<div class="container card my-4">
    <h5 class="card-header" style="background-color: white">Profile Details</h5>
    <!-- Account -->
    @error('image')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    @if(session('success'))
        <span class="alert alert-success">{{ session('success') }}</span>
    @endisset
    <div class="card-body">
      <div class="d-flex align-items-start align-items-sm-center my-4 gap-4">
        <img
        src="{{ optional(auth()->user())->image_path ? asset('assets/img/users/'.auth()->user()->image_path) : asset('assets/img/users/blank-profile-picture-973460_1280.webp') }}"
          alt="user-avatar"
          class="d-block rounded"
          height="100"
          width="100"
          id="uploadedAvatar"
        />
        <div class="button-wrapper">
          <form action="{{ route('profile.update.image') }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
              <span class="d-none d-sm-block">Upload new photo</span>
              <i class="bx bx-upload d-block d-sm-none"></i>
              <input
              type="file"
              id="upload"
              name='image'
              class="account-file-input"
              hidden
              accept="image/png, image/jpeg"
              />
            </label>
            <button type="submit" class="btn btn-outline-info account-image-reset mb-4">
              <i class="bx bx-reset d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Change</span>
            </button>
          </form>

          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
        </div>
      </div>
    </div>
    <hr class="my-0" />
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <form id="formAccountSettings" action="{{ route('profile.update') }}" method="POST" >
        @method('PUT')
        @csrf
        <div class="row">
          <div class="mb-3 col-md-6">
            <label for="Name" class="form-label">Name</label>
            <input
              class="form-control"
              type="text"
              id="Name"
              name="name"
              value="{{ auth()->user()->name }}"
            />
          </div>
         
          <div class="mb-3 col-md-6">
            <label for="email" class="form-label">E-mail</label>
            <input
              class="form-control"
              type="text"
              id="email"
              name="email"
              value="{{ auth()->user()->email }}"
              placeholder="john.doe@example.com"
            />
          </div>
          
          <div class="mb-3 col-md-6">
            <label class="form-label" for="phoneNumber">Phone Number</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text">EG (+20)</span>
              <input
                type="text"
                id="phoneNumber"
                name="phone"
                class="form-control"
                value="{{ auth()->user()->phone ? auth()->user()->phone : '' }}"
                placeholder="202 555 0111"
              />
            </div>
          </div>
          <div class="mb-3 col-md-6">
            <label for="address" class="form-label">Address</label>
            <input 
            type="text" 
            value="{{ auth()->user()->address ? auth()->user()->address : '' }}" 
            class="form-control" 
            id="address" 
            name="address" 
            placeholder="Address" 
            />
          </div>
          
          
        </div>
        <div class="mt-2">
          <button type="submit" class="btn btn-primary me-2">Save changes</button>
          <button type="reset" class="btn btn-outline-secondary">Cancel</button>
        </div>
      </form>
    </div>
    <!-- /Account -->
  </div> 
    
@endsection
@section('script')
        <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('assets/js/mainlogin.js') }}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
@endsection