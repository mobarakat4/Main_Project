@extends('layouts.admin')
@section('head','Create Products')
@section('content')
<div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        {{-- <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Basic Layout</h5>
          <small class="text-muted float-end">Default label</small>
        </div> --}}
        <div class="card-body">
          <form>
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Product Name</label>
              <input type="text" class="form-control" id="basic-default-fullname" placeholder="Product name" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Product Name in Arabic</label>
              <input type="text" class="form-control" id="basic-default-fullname" placeholder="arabic Product name" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Price</label>
              <input type="number" class="form-control" id="basic-default-fullname" placeholder="Enter Price" />
            </div>
            <div class="mb-3">
                <label for="defaultSelect" class="form-label">Choose Category</label>
                <select id="defaultSelect" class="form-select">
                  <option>none</option>
                  @foreach ($cats as $cat)
                  <option value="{{$cat->id}}">{{$cat->name}}</option>
                  @endforeach
                </select>
              </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Enter product image</label>
                <input class="form-control" type="file" id="formFile" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-message">description</label>
              <textarea
                id="basic-default-message"
                class="form-control"
                placeholder="Write description about the product"
              ></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
          </form>
        </div>
      </div>
    </div>
    
  </div>
@endsection
