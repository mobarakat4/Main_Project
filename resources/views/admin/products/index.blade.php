@extends('layouts.admin')
@section('head','All Products')
@section('content')
<div class="card">
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h5 class="card-header">Products</h5>
                    <a href="{{ route('admin.product.create') }}" class="btn btn-primary p-2 m-4" >Add Product +</a>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table table-dark">
        <thead>
          <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Status</th>
            <th>image</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($products as $product )
                
            <tr>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $product->name }}</strong></td>
              <td>{{ $product->category->name }}</td>
              <td>
                {{ $product->price }}
              </td>
              <td>
                  @if ($product->active == 1)
                  <span class="badge bg-label-success me-1">
                      Active
                    </span>
                    @else
                    <span class="badge bg-label-danger me-1">
                        DisActive
                    </span>
                @endif
            </td>
              <td>
                  <img src="{{ asset("assets/img/products/$product->image_path") }}" width="50" alt="Avatar" class="rounded" />
              </td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0);"
                      ><i class="bx bx-edit-alt me-1"></i> Edit</a
                    >
                    <a class="dropdown-item" href="javascript:void(0);"
                      ><i class="bx bx-trash me-1"></i> Delete</a
                    >
                  </div>
                </div>
              </td>
            </tr>
            @endforeach

        </tbody>
      </table>
    </div>
  </div>
@endsection