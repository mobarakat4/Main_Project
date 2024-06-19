@extends('layouts.main')

@section('title')
    one-products
@endsection
@section('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
@section('header')
    @include('user.components.headers.single-product')
@endsection
@section('content')
    	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>See more Details</p>
						<h1>Single Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img width="100%" height="100%" src="{{ asset("assets/img/products/$product->image_path") }}" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
					<h3 >{{ $product->name }}
                        <button class="favourite-btn" data-product-id="{{ $product->id }}">
                            @if(Auth::user()->favourites->contains($product->id))
                                <i class="fas fa-heart icon-favourite active"></i>
                            @else
                                <i class="fas fa-heart icon-favourite "></i>
                            @endif
                        </button>
                    </h3>
					<h3>{{ $product->price }}$</h3>
					<div class="rating">
						@for ($i = 1; $i <= 5; $i++)
							@if ($i <= $avgRate)
								<span class="star filled">&#9733;</span>
							@else
								<span class="star">&#9733;</span>
							@endif
						@endfor
					</div>
						{{-- <p class="single-product-pricing"><span>Per one</span> ${{ $product->price }}</p> --}}
					<p>{{ $product->description }}</p>
					<div class="single-product-form">
							{{-- <form action="index.html">
								<input type="number" placeholder="1">
							</form> --}}
							<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#createRate">
								Rate the pet
							</button>
							<button type="button" class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#showRates">
								show all rates
							</button>
							<br>
							{{-- <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a> --}}
							<button class="cart-btn pr-butt" onclick="addToCart({{ $product->id }})">
								<i class="fas fa-shopping-cart"></i> Add to Cart
							</button>
							<br>

							{{-- <p><strong>Categories: </strong>Fruits, Organic</p> --}}
						</div>
						{{-- <h4>Share:</h4>
						<ul class="product-share">
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						</ul> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->
	<div class="modal" id="createRate">
		<div class="modal-dialog modal-dialog-centered">
		  <div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
			  <h4 class="modal-title">Rate</h4>

			  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form action="{{ route('rate.store',['id'=>$product->id]) }}" method="POST">
					@csrf
					<h3>Rating:</h3>
					<div class="rating">
						<input type="radio" id="star5" name="rating" value="5">
						<label for="star5"></label>
						<input type="radio" id="star4" name="rating" value="4">
						<label for="star4"></label>
						<input type="radio" id="star3" name="rating" value="3">
						<label for="star3"></label>
						<input type="radio" id="star2" name="rating" value="2">
						<label for="star2"></label>
						<input type="radio" id="star1" name="rating" value="1">
						<label for="star1"></label>
					</div>
					<div>
						<label for="comment"><h4>Comment:</h4></label>
						<br>
						<textarea name="comment" id="" cols="30" rows="2"></textarea>
					</div>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="submit" class="btn btn-info" data-bs-dismiss="modal">Create</button>
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
				</div>
			</form>

		  </div>
		</div>
	</div>
	<div class="modal" id="showRates">
		<div class="modal-dialog modal-dialog-centered">
		    <div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">All Rates</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<div class="comments">
						@foreach ($rates as $rate)

							<div class="comment border p-4" >
								<div class="comment-header">
									<strong>{{ $rate->user->username }}</strong>
									<span class="comment-date">Posted on: {{ $rate->created_at }}</span>
								</div>
								<div class="comment-body">
									<div class="rating">
										@for ($i = 1; $i <= 5; $i++)
										@if ($i <= $rate->rating)
											<span class="star filled">&#9733;</span>
										@else
											<span class="star">&#9733;</span>
										@endif
										@endfor
									</div>
									<div>
										{{ $rate->comment }}
									</div>
								</div>
							</div>
						@endforeach



					</div>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
				</div>

		    </div>
		</div>
	</div>
	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Related</span> Products</h3>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach ($relatedProducts as $product)

                <div class="col-lg-4 col-md-6 text-center {{ $product->category->name }}">
                    <div class="single-product-item  ">
                        <div class="product-image">
                            <a href="{{ route('products.show', ['id' => $product->id])  }}"><img width="243" height="243" src="{{ asset("assets/img/products/$product->image_path") }}" alt=""></a>
                        </div>
                        <h3>{{ $product->name }}</h3>
                        <p class="product-price "><span>Per One</span> {{ $product->price }}$ </p>
                        {{-- <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a> --}}
						<button class="cart-btn pr-butt" onclick="addToCart({{ $product->id }})">
							<i class="fas fa-shopping-cart"></i> Add to Cart
						</button>

                    </div>
                </div>
                @endforeach
				{{-- <div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
						</div>
						<h3>Strawberry</h3>
						<p class="product-price"><span>Per Kg</span> 85$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-2.jpg" alt=""></a>
						</div>
						<h3>Berry</h3>
						<p class="product-price"><span>Per Kg</span> 70$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-3.jpg" alt=""></a>
						</div>
						<h3>Lemon</h3>
						<p class="product-price"><span>Per Kg</span> 35$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div> --}}
			</div>
		</div>
	</div>
	<!-- end more products -->
@endsection
