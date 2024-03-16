@extends('layouts.main')

@section('title')
    Cart
@endsection


@section('content')

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									{{-- <th class="product-quantity">Quantity</th>
									<th class="product-total">Total</th> --}}
								</tr>
							</thead>
							<tbody>
								@foreach ( $products as $product )
									
								<tr class="table-body-row" id="product-{{ $product->id }}">
									<td class="product-remove">
										{{-- <a href="#"><i class="far fa-window-close"></i></a> --}}
										<button class="my-but" onclick="removeFromCart({{ $product->id }})"><i class="far fa-window-close"></i></button>
									</td>
									<td class="product-image"><img src={{ $product->image_path }} alt=""></td>
									<td class="product-name">{{ $product->name }}</td>
									<td class="product-price">${{ $product->price }}</td>
									{{-- <td class="product-quantity"><input type="number"  placeholder="1"></td> --}}
									{{-- <td class="product-total">1</td> --}}
								</tr>
								@endforeach
					
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td>${{ $total }}</td>
								</tr>
								<tr class="total-data">
									<td><strong>Shipping: </strong></td>
									<td>$45</td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>${{ $total+45 }}</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="cart.html" class="boxed-btn">Update Cart</a>
							<a href="checkout.html" class="boxed-btn black">Check Out</a>
						</div>
					</div>

					<div class="coupon-section">
						<h3>Apply Coupon</h3>
						<div class="coupon-form-wrap">
							<form action="index.html">
								<p><input type="text" placeholder="Coupon"></p>
								<p><input type="submit" value="Apply"></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<script>

	function removeFromCart(productId) {
		axios.delete(`/cart/${productId}`)
			.then(function (response) {
				console.log(response.data);
				let removedItem = document.getElementById(`product-${productId}`);
            	removedItem.remove();
				// location.reload();
			})
			.catch(function (error) {
				console.log(error);
				// Handle error
			});
}
	</script>
@endsection