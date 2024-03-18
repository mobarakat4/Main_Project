@extends('layouts.main')
@section('title')
    search
@endsection
@section('content')

    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Search Results</h2>
                <ul class="list-group">
                    @foreach ($products as $product)
                        <a href="{{ route('products.show',['id' => $product->id]) }}">
                            <li class="list-group-item">{{ $product->name }}</li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection