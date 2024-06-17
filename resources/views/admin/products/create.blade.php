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
          <form method="POST" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Product Name</label>
              <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="basic-default-fullname" placeholder="Product name" />
              @error('name')
              <div class=" p-1 d-flex"><span class="text-danger">{{ $message }}</span></div>
            @enderror
            </div>

            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Product Name in Arabic</label>
              <input type="text" name="name_ar" value="{{ old('name_ar') }}" class="form-control" id="basic-default-fullname" placeholder="arabic Product name" />
              @error('name_ar')
              <div class=" p-1 d-flex"><span class="text-danger">{{ $message }}</span></div>
                @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Price</label>
              <input type="number" name="price" value="{{ old('price') }}" class="form-control" id="basic-default-fullname" placeholder="Enter Price" />
              @error('price')
              <div class=" p-1 d-flex"><span class="text-danger">{{ $message }}</span></div>
            @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">count</label>
              <input type="number" name="count" value="{{ old('count') }}" class="form-control" id="basic-default-fullname" placeholder="Enter number of Items" />
              @error('count')
              <div class=" p-1 d-flex"><span class="text-danger">{{ $message }}</span></div>
            @enderror
            </div>
            <div class="mb-3">
                <label for="defaultSelect" class="form-label">Choose Status</label>
                <select name="status" id="defaultSelect" value="{{ old('status') }}" class="form-select">
                    @if(old('status') == null)
                        <option value="1" selected>Active</option>
                        <option value="0" >DisActive</option>
                        @elseif (old('status')== 1)
                        <option value="1" selected>Active</option>
                        <option value="0" >DisActive</option>
                        @else
                        <option value="0" selected>DisActive</option>
                        <option  value="1" >Active</option>
                    @endif
                </select>
                @error('status')
                <div class=" p-1 d-flex"><span class="text-danger">{{ $message }}</span></div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="defaultSelect" class="form-label">Choose Category</label>
                <select name="category"  id="defaultSelect" class="form-select">
                  <option>none</option>
                  @foreach ($cats as $cat)
                    @if (old('category')==$cat->id)
                        <option value={{$cat->id}} selected>{{ $cat->name }}</option>
                    @else
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endif
                  @endforeach
                </select>
                @error('category')
              <div class=" p-1 d-flex"><span class="text-danger">{{ $message }}</span></div>
            @enderror
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Enter product image</label>
                <input name="image" value="{{ old('image') }}" class="form-control" type="file" id="formFile" />
                @error('image')
              <div class=" p-1 d-flex"><span class="text-danger">{{ $message }}</span></div>
            @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-message">description</label>
              <textarea
                id="basic-default-message"
                class="form-control"
                placeholder="Write description about the product"
                name="description"
              >{{old('description')}}</textarea>
              @error('description')
              <div class=" p-1 d-flex"><span class="text-danger">{{ $message }}</span></div>
            @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
          </form>
        </div>
      </div>
    </div>

  </div>
@endsection
