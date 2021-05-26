<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Moto Shop</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}" />
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->


	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="{{asset('frontend/css/slick.css')}}" />
	<link type="text/css" rel="stylesheet" href="{{asset('frontend/css/slick-theme.css')}}" />
	<link type="text/css" rel="stylesheet" href="{{asset('frontend/css/toastr.css')}}" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="{{asset('frontend/css/nouislider.min.css')}}" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{asset('frontend/css/style.css')}}" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>

	<body>
		@section('checkout')
		<?php 
		$content=Cart::content(); 
// echo '<pre>';
// print_r($content);
// echo '</pre>';

		?>
		<!-- HEADER -->
		<header>
			<!-- header -->
			<div id="header">
				<div class="container">
					<div class="pull-left">
						<!-- Logo -->
						<div class="header-logo">
							<a class="logo" href="#">
								<img src="{{asset('frontend/img/logo.png')}}" alt="">
							</a>
						</div>
						<!-- /Logo -->

						<!-- Search -->
						<div class="header-search">
							<form action="{{route('search-product')}}" method="get">
								<input class="input" name="search" type="text" placeholder="Enter your product">
								<button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
							</form>
						</div>
						<!-- /Search -->
					</div>
					<div class="pull-right">
						<ul class="header-btns">
							<!-- Account -->
							<li class="header-account dropdown default-dropdown">
								<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
									<div class="header-btns-icon">
										<i class="fa fa-user-o"></i>
									</div>
									<?php if(Auth::user()){ ?>
										<strong class="text-uppercase">{{Auth::user()->name}} <i class="fa fa-caret-down"></i></strong>
									<?php }else{ ?>
										<strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
									<?php } ?>
								</div>
								
								<ul class="custom-menu">
									<!-- <li><a href="#"><i class="fa fa-user-o"></i></a></li> -->
									<!-- <li><a href="#"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
										<li><a href="#"><i class="fa fa-exchange"></i> Compare</a></li>-->
										
										<?php if(Auth::user()){ ?>
											<li><a href="{{route('logout-user')}}"><i class="fa fa-user-circle"></i> Profile</a></li>
											<li><a href="{{route('checkout')}}"><i class="fa fa-check"></i>Checkout</a></li>
											<li><a href="{{route('logout-user')}}"><i class="fa fa-unlock-alt"></i> Logout</a></li>
										<?php }else{ ?>
											<li><a href="{{route('login.user')}}"><i class="fa fa-unlock-alt"></i> Login</a></li>
											<li><a href="{{route('login.user')}}"><i class="fa fa-user-plus"></i> Create An Account</a></li>

										<?php } ?>


										
									</ul>
								</li>
								<!-- /Account -->

								<!-- Cart -->
								
								<li class="header-cart dropdown default-dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<div class="header-btns-icon">
											<i class="fa fa-shopping-cart"></i>
											<span class="qty">{{$content->count()}}</span>
										</div>
										<strong class="text-uppercase">My Cart</strong>
										<br>
										
									</a>
									<div class="custom-menu">
										<div id="shopping-cart">
											<div class="shopping-cart-list">
												@foreach($content as $v_content)
												<div class="product product-widget">
													<div class="product-thumb">
														<img src="{{asset('frontend/img/'.$v_content->options->image)}}" wight="40" alt="">
													</div>
													<div class="product-body">
														<h3 class="product-price">{{number_format($v_content->price).' VND'}}  <span class="qty">x {{$v_content->qty}}</span></h3>
														<h2 class="product-name"><a href="#">{{$v_content->name}}</a></h2>
													</div>
													<button class="cancel-btn"><i class="fa fa-trash"></i></button>
												</div>
												@endforeach
											</div>
											<div class="sub-total">
												<!-- <strong class="text-uppercase empty">Tổng : </strong> -->
												<h3>Tổng : {{Cart::subtotal().' VND'}}</h3>
											</div>
											
											<div class="shopping-cart-btns">
												<a href="{{route('show.cart')}}"><button class="main-btn">View Cart</button></a>
												<a href="{{route('checkout')}}"><button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button></a>
											</div>
										</div>
									</div>
								</li>
								<!-- /Cart -->

								<!-- Mobile nav toggle-->
								<li class="nav-toggle">
									<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
								</li>
								<!-- / Mobile nav toggle -->
							</ul>
						</div>
					</div>
					<!-- header -->
				</div>
				<!-- container -->
			</header>
			<!-- /HEADER -->

			<!-- NAVIGATION -->
			<div id="navigation">
				<!-- container -->
				<div class="container">
					<div id="responsive-nav">
						<!-- menu nav -->
						<div class="menu-nav">
							<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
							<ul class="menu-list">
								<li><a href="{{route('trang-chu')}}">Home</a></li>
								<li class="dropdown mega-dropdown"><a href="{{route('all-product')}}" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Sản Phẩm <i class="fa fa-caret-down"></i></a>
									<div class="custom-menu">
										<div class="row">
											@foreach($list_all_category as $cate)
											<div class="col-md-4">
												<ul class="list-links">
													<li><a href="{{route('more-category-product',$cate->id)}}"><h3 class="list-links-title">{{$cate->name}}</h3></a></li>
													@foreach($cate->children as $parent)
													<li><a href="{{route('more-product',$parent->id)}}">{{$parent->name}}</a></li>
													@endforeach
												</ul>
											</div>
											@endforeach
										</div>
									</div>
								</li>
								<li><a href="#">Tin Tức</a></li>
								<li><a href="#">Đặt Hàng</a></li>
								<li><a href="#">Liên Hệ</a></li>
							</ul>
						</div>
						<!-- menu nav -->
					</div>
				</div>
				<!-- /container -->
			</div>
			<!-- /NAVIGATION -->

			<!-- Main -->

			@yield('banner')

			@yield('content-main')

			<!-- /Main -->




			<!-- section -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">						
						@yield('checkout')
						<div id="aside" class="col-md-3">
							@yield('aside')
						</div>
						<div id="aside" class="col-md-9">
							@yield('content')
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /section -->

			<!-- FOOTER -->
			<footer id="footer" class="section section-grey">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- footer widget -->
						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="footer">
								<!-- footer logo -->
								<div class="footer-logo">
									<a class="logo" href="#">
										<img src="./img/logo.png" alt="">
									</a>
								</div>
								<!-- /footer logo -->

								<p>Mô Tô Shop Tự tin đem lại sự thoải mái cho bạn. Là Đại Lý Số 1 về xe máy và phụ kiện</p>

								<!-- footer social -->
								<ul class="footer-social">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
								</ul>
								<!-- /footer social -->
							</div>
						</div>
						<!-- /footer widget -->

						<!-- footer widget -->
						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="footer">
								<h3 class="footer-header">My Account</h3>
								<ul class="list-links">
									<li><a href="#">My Account</a></li>
									<li><a href="#">My Wishlist</a></li>
									<li><a href="#">Compare</a></li>
									<li><a href="#">Checkout</a></li>
									<li><a href="#">Login</a></li>
								</ul>
							</div>
						</div>
						<!-- /footer widget -->

						<div class="clearfix visible-sm visible-xs"></div>

						<!-- footer widget -->
						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="footer">
								<h3 class="footer-header">Customer Service</h3>
								<ul class="list-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Shiping & Return</a></li>
									<li><a href="#">Shiping Guide</a></li>
									<li><a href="#">FAQ</a></li>
								</ul>
							</div>
						</div>
						<!-- /footer widget -->

						<!-- footer subscribe -->
						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="footer">
								<h3 class="footer-header">Stay Connected</h3>
								<p>Nhập Gmail để nhận thêm nhiều ưu đãi</p>
								<form>
									<div class="form-group">
										<input class="input" placeholder="Enter Email Address">
									</div>
									<button class="primary-btn">Join Newslatter</button>
								</form>
							</div>
						</div>
						<!-- /footer subscribe -->
					</div>
					<!-- /row -->
					<hr>
					<!-- row -->
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center">
							<!-- footer copyright -->
							<div class="footer-copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</div>
							<!-- /footer copyright -->
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</footer>
			<!-- /FOOTER -->

			<!-- jQuery Plugins -->
			<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
			<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
			<script src="{{asset('frontend/js/slick.min.js')}}"></script>
			<script src="{{asset('frontend/js/nouislider.min.js')}}"></script>
			<script src="{{asset('frontend/js/jquery.zoom.min.js')}}"></script>
			<script src="{{asset('frontend/js/main.js')}}"></script>
			<script src="{{asset('frontend/js/toastr.min.js')}}"></script>
			@if(session('thongbao'))
			<script type="text/javascript">
				toastr.success('{{session('thongbao')}}', 'Thông Báo', {timeOut: 4000});
			</script>
			@endif
			@if(session('error'))
			<script type="text/javascript">
				toastr.error('{{session('error')}}', 'Thông Báo', {timeOut: 4000});
			</script>
			@endif
			
		</body>

		</html>
