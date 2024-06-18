@extends('layouts.main')

@section('title')
    Favourites Products
@endsection
@section('style')
<style>

    .cat-img{
        height: 243px;
        width: 243px;


    }

    </style>
@endsection
{{-- ------------------header-----------------  --}}
@section('header')
    @include('user.components.headers.favourites')
@endsection
{{-- ------------------content----------------- --}}
@section('content')

    <!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">

			{{-- <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
							@foreach ($categories as $cat )
                            <li data-filter=".{{$cat->name}}">{{ $cat->name }}</li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div> --}}

			<div class="row product-lists">
                @foreach ($favouriteProducts as $product)

                <div class="col-lg-4 col-md-6 text-center {{ $product->category->name }}">
                    <div class="single-product-item  ">
                        <div class="product-image">
                            <a href="{{ route('products.show', ['id' => $product->id])  }}"><img width="243" height="243" src="{{ asset("assets/img/products/$product->image_path") }}" alt=""></a>
                        </div>
                        <h3 class="pr-header">{{ $product->name }}
                            <button class="favourite-btn" data-product-id="{{ $product->id }}">
                                @if(Auth::user()->favourites->contains($product->id))
                                    <i class="fas fa-heart icon-favourite active"></i>
                                @else
                                    <i class="fas fa-heart icon-favourite ">dsfsdf</i>
                                @endif
                            </button>
                        </h3>

                        <p class="product-price "><span>Per One</span> {{ $product->price }}$ </p>
                        {{-- <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a> --}}
						<button class="cart-btn pr-butt" onclick="addToCart({{ $product->id }})">
							<i class="fas fa-shopping-cart"></i> Add to Cart
						</button>

                    </div>
                </div>
                @endforeach

			</div>


		</div>
	</div>




@endsection
