<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>@yield('titleuser','Motor Cycle')</title>
	<link type="text/css" rel="stylesheet" href="{{asset('frontend/css/form.css')}}" />
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
		?>
		<!-- HEADER -->
		@include('User.layout.header')
		@include('User.layout.nav')
		<!-- banner -->
		@yield('banner-route')
		<!-- /banner -->
		<!-- main -->
		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">						
					@yield('mcontent')
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
		<!-- /main -->
		<!-- FOOTER -->
		@include('User.layout.footer')
		<!-- /FOOTER -->

		<!-- modal login-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<div class="container-contact100">
							<div class="wrap-contact100">
								<h3 style="text-align: center;margin-bottom: 15px;">
									Form ????ng Nh???p
								</h3>
								<form class="contact100-form validate-form"action="{{route('user.login')}}" method="post">
									@csrf
									<div class="wrap-input100">
										<span class="label-input100">Email C???a B???n</span>
										<input class="input100" type="text" name="email" placeholder=" Vui l??ng Nh???p Email" value="{{old('email')}}">
										@error('email') 
										<div class="alert alert-danger">{{$message}}</div>
										@enderror
									</div>
									<div class="wrap-input100">
										<span class="label-input100">M???t Kh???u C???a B???n</span>
										<input class="input100" type="password" name="password" placeholder=" Vui L??ng Nh???p password" value="{{old('password')}}" >
										@error('password') 
										<div class="alert alert-danger">{{$message}}</div>
										@enderror
									</div>



									<div class="container-contact100-form-btn">
										<div class="wrap-contact100-form-btn">
											<div class="contact100-form-bgbtn"></div>
											<button type="submit" class="contact100-form-btn">
												????ng Nh???p
											</button>
										</div>
									</div>
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end modal login -->
		<!-- register -->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<div class="container-contact100">
							<div class="wrap-contact100">
								<h3 style="text-align: center;margin-bottom: 15px;">
									????ng K?? T??i Kho???n
								</h3>
								<form class="contact100-form validate-form" action="{{route('user.create')}}" method="post">
									@csrf
									<div class="wrap-input100">
										<span class="label-input100">T??i Kho???n ????ng K??</span>
										<input class="input100" type="text" name="name" value="{{old('name')}}" placeholder="Vui l??ng ??i???n t??n c???a b???n" >	
										@error('name') 
										<div class="alert alert-danger">{{$message}}</div>
										@enderror				
									</div>
									<div class="wrap-input100">
										<span class="label-input100">Email c???a B???n</span>
										<input class="input100" type="email" name="re_email" value="{{old('re_email')}}" placeholder="Vui l??ng nh???p ?????a ch??? email">
										@error('re_email') 
										<div class="alert alert-danger">{{$message}}</div>
										@enderror
									</div>
									<div class="wrap-input100">
										<span class="label-input100">Nh???p M???t Kh???u C???a B???n</span>
										<input class="input100" type="password" name="re_password" value="{{old('re_password')}}" placeholder="Vui l??ng nh???p password">
										@error('re_password') 
										<div class="alert alert-danger">{{$message}}</div>
										@enderror
									</div>

									<div class="wrap-input100">
										<span class="label-input100">?????a Ch??? C???a B???n</span>
										<input class="input100" type="text" name="address" value="{{old('address')}}" placeholder="Vui l??ng nh???p ?????a ch???">
										@error('address') 
										<div class="alert alert-danger">{{$message}}</div>
										@enderror
									</div>

									<div class="wrap-input100">
										<span class="label-input100">Nh???p S??? ??i???n Tho???i C???a B???n</span>
										<input class="input100" type="text" name="phone" value="{{old('phone')}}" placeholder="Vui l??ng nh???p s??? ??i???n tho???i">
										@error('phone') 
										<div class="alert alert-danger">{{$message}}</div>
										@enderror
									</div>

									<div class="container-contact100-form-btn">
										<div class="wrap-contact100-form-btn">
											<div class="contact100-form-bgbtn"></div>
											<button type="submit" class="contact100-form-btn">
												????ng K??
											</button>
										</div>
									</div>
								</form>

							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- end register -->







		<!-- jQuery Plugins -->
		<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
		<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('frontend/js/slick.min.js')}}"></script>
		<script src="{{asset('frontend/js/nouislider.min.js')}}"></script>
		<script src="{{asset('frontend/js/jquery.zoom.min.js')}}"></script>
		<script src="{{asset('frontend/js/main.js')}}"></script>
		<script src="{{asset('frontend/js/toastr.min.js')}}"></script>
		<script src="{{asset('frontend/js/fixedmenu.js')}}"></script>
		@if(session('thongbao'))
		<script type="text/javascript">
			toastr.success('{{session('thongbao')}}', 'Th??ng B??o', {timeOut: 2000});
		</script>
		@endif
		@if(session('error'))
		<script type="text/javascript">
			toastr.error('{{session('error')}}', 'Th??ng B??o', {timeOut: 2000});
		</script>
		@endif

	</body>

	</html>
