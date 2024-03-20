@extends('layouts.main')
@section('header')
    @include('user.components.headers.checkout')
    
@endsection
@section('title','checkout')
@section('style')
    <style>
       form {
    margin: 0;
    padding: 0;
    border: none;
}

    </style>
@endsection
@section('content')
    	<!-- check out section -->
	<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
                
                    
                    <div class="col-lg-8">
                        <div class="checkout-accordion-wrap">
                            <div class="accordion" id="accordionExample">
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    shipping details
                                    </button>
                                </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="billing-address-form">
                                        <form id="myForm" action="{{ route('order.checkout') }}" method="POST">
                                            @csrf
                                            {{-- <p><input type="text" placeholder="Name" value></p> --}}
                                            {{-- <p><input type="email" placeholder="Email" ></p> --}}
                                            <p><input 
                                                type="text"
                                                name="address" 
                                                placeholder="Address" 
                                                value="{{ auth()->user()->address ? auth()->user()->address : "" }}"
                                            ></p>
                                            <p><input 
                                                type="text"
                                                name="phone"
                                                placeholder="Phone"  
                                                value="{{ auth()->user()->phone ? auth()->user()->phone : "" }}"
                                            ></p>
                                            {{-- <p><textarea name="bill" id="bill" cols="30" rows="10" placeholder="Say Something"></textarea></p> --}}
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="order-details-wrap">
                            <table class="order-details">
                                <thead>
                                    <tr>
                                        <th>Your order Details</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody class="order-details-body">
                                    <tr>
                                        <td>Product</td>
                                        <td>Total</td>
                                    </tr>
                                    @foreach ($products as $product )
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>${{ $product->price }}</td>
                                    </tr>
                                        
                                    @endforeach
                                   
                                    
                                </tbody>
                                <tbody class="checkout-details">
                                    <tr>
                                        <td>Subtotal</td>
                                        <td>${{ $total }}</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td>$50</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td>${{ $total+50.00 }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-primary mt-4 rounded btn-lg" id="submitBtn">Checkout</button>
                        </div>
                    </div>
                
			</div>
		</div>
	</div>
	<!-- end check out section -->
@endsection
@section('script')
    <script>
        document.getElementById('submitBtn').addEventListener('click', function() {
            document.getElementById('myForm').submit();
        });
    </script>
@endsection