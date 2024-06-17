@extends('layouts.admin')

@section('title')
DashBoard
@endsection
@section('head')
  Dashboard
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-center row">
          <div class="col-sm-7">
            <div class="card-body">
              <h3 class="card-title text-primary mb-4">Welcome Admin</h3>
              

              {{-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> --}}
            </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img
                src="../assets/img/illustrations/man-with-laptop-light.png"
                height="125"
                alt="View Badge User"
                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                data-app-light-img="illustrations/man-with-laptop-light.png"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 order-1">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <a href="">
                <h6 class="fw-semibold d-block mb-4 ">Total Products</h6>
                <h3 class="card-title mb-2 ">{{ $countProducts }}</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +{{ $countNewProducts }}</small>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <a href="#">
                <h6 class="fw-semibold d-block mb-4 ">Total Users</h6>
                <h3 class="card-title text-nowrap mb-1">{{ $countUsers }}</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +{{ $countNewUsers }}</small>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 order-1">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <a href="#">

                <h6 class="fw-semibold d-block mb-4 ">Total Categories</h6>
                <h3 class="card-title mb-2 ">{{ $countCategories }}</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +{{ $countNewCategories }}</small>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <a href="#">

                <h6 class="fw-semibold d-block mb-4 ">Total Orders</h6>
                <h3 class="card-title text-nowrap mb-1">{{ $countOrders }}</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +{{ $countNewOrders }}</small>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection