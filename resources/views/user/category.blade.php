@extends('layouts.main')


@section('title')

Categories
@endsection




@section('content')


	<!-- categories -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center ">
					<div class="section-title">	
						<h3><span class="orange-text">Our</span> Categories</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>

			<div class="row">
                @foreach ($categories as $cat )
                    
				<div class="col-lg-4 col-md-6 text-center ">
					<div class="single-product-item my-cat">
						<div class="product-image">
							<a href="/products"><img class=".cat-img" src="{{ asset("$cat->image") }}" alt=""></a>
						</div>
						<h3>{{ $cat->name }}</h3>
					</div>
				</div>
                @endforeach
				{{-- <div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-2.jpg" alt=""></a>
						</div>
						<h3>Berry</h3>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-3.jpg" alt=""></a>
						</div>
						<h3>Lemon</h3>
					</div>
				</div> --}}
			</div>
		</div>
	</div>
	<!-- end categories section -->
    
@endsection