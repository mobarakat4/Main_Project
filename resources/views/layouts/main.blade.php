<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- title -->
	<title>@yield('title')</title>
	@yield('style')

	<!-- favicon -->
	<link rel="icon" type="image/x-icon" href="{{ asset('assets/img/pet-shop_8334320.png') }}" />
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
	<!-- owl carousel -->
	<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
	<!-- magnific popup -->
	<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
	<!-- animate css -->
	<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
	<!-- mean menu css -->
	<link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
	<!-- main style -->
	<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/kotta.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/chatstyle.css')}}">



</head>
<body>

	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="/">
								<img src="{{ asset("assets/img/pet-shop_8334320.png") }}" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="{{ Request::is('/') ? 'current-list-item' : '' }}"><a href="/">Home</a>
									{{-- <ul class="sub-menu">
										<li><a href="index.html">Static Home</a></li>
										<li><a href="index_2.html">Slider Home</a></li>
									</ul> --}}
								</li>
								<li {{ Request::is('category') ? "class=current-list-item" : '' }}><a href="{{ route('category.index') }}">Categories</a></li>
								<li {{ Request::is('products') ? "class=current-list-item" : '' }}><a href="{{ route('product.index') }}">Products</a></li>

								<li>
									<div class="header-icons">
										<a {{ Request::is('cart') ? "class=my-active" : '' }} class="shopping-cart " href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart " ></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
										<a  {{ Request::is('profile') ? "class=my-active" : '' }} href="{{ route('user.profile') }}">{{ auth()->user()->username }}</a>
										<a href="{{ route('user.logout') }}">log out</a>

									</div>

								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<form action="{{ route('user.search') }} " method="GET">

								<h3>Search For:</h3>
								<input type="text" name="search" placeholder="Keywords">
								<button type="submit">Search <i class="fas fa-search"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->

	<!-- home page slider -->
	@yield('header')
	<!-- end home page slider -->

	@yield('content')
    <button id="chatButton">Chat with Bot</button>

    <div id="chatPopup" class="popup">
        <div class="popup-content">
            <span class="close">&times;</span>
            <div id="chatWindow">
                <div id="chatMessages"></div>
                <input type="text" id="userMessage" placeholder="Type your message...">
                <button id="sendMessage">Send</button>
            </div>
        </div>
    </div>


	@include('user.components.footer')
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<script src="{{ asset('assets/js/kotta.js') }}"></script>
	<!-- jquery -->
	<script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
	<!-- bootstrap -->
	<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
	<!-- count down -->
	<script src="{{ asset('assets/js/jquery.countdown.js') }}"></script>
	<!-- isotope -->
	<script src="{{ asset('assets/js/jquery.isotope-3.0.6.min.js') }}"></script>
	<!-- waypoints -->
	<script src="{{ asset('assets/js/waypoints.js') }}"></script>
	<!-- owl carousel -->
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	<!-- magnific popup -->
	<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
	<!-- mean menu -->
	<script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
	<!-- sticker js -->
	<script src="{{ asset('assets/js/sticker.js') }}"></script>
	<!-- main js -->
	<script src="{{ asset('assets/js/main.js') }}"></script>
	<script src="{{ asset('assets/js/chatscripts.js') }}"></script>
	@yield('script')
</body>
</html>

