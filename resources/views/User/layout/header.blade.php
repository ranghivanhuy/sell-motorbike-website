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
					<form action="{{route('search-product-user')}}" method="post">
						@csrf
						<input class="input" name="search" type="text" placeholder="Nhập Từ Khóa">
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
							
							<?php if(Auth::user()){ ?>
								<div class="header-btns-icon">
									<i class="fa fa-user-secret"></i>
								</div>
								<strong class="text-uppercase">Xin Chào, {{Auth::user()->name}} <i class="fa fa-caret-down"></i></strong>
							<?php }else{ ?>
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">Tài Khoản <i class="fa fa-caret-down"></i></strong>
							<?php } ?>
						</div>

						<ul class="custom-menu">
							<?php if(Auth::user()){ ?>
								<li><a href="{{route('profile-user',Auth::user()->id)}}"><i class="fa fa-user-circle"></i> Thông Tin Của Tôi</a></li>
								<li><a href="{{route('checkout')}}"><i class="fa fa-check"></i>Thanh Toán</a></li>
								<li><a href="{{route('logout-user')}}"><i class="fa fa-unlock-alt"></i> Đăng Xuất</a></li>
							<?php }else{ ?>
								<li data-toggle="modal" data-target="#exampleModal"><a ><i class="fa fa-unlock-alt"> Đăng Nhập</i> </a></li>
								<li data-toggle="modal" data-target="#exampleModalCenter"><a><i class="fa fa-user-plus"> Đăng Ký</i></a></li>

								<!-- <li><a href="{{route('login.user')}}"><i class="fa fa-user-plus"></i> Create An Account</a></li> -->

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
							<strong class="text-uppercase">Giỏ Hàng Của Tôi</strong>
							<br>

						</a>
						<div class="custom-menu">
							<div id="shopping-cart">
								<div class="shopping-cart-list">
									<?php $total=0; ?>
									@foreach($content as $v_content)
									<div class="product product-widget">
										<div class="product-thumb">
											<img src="{{asset('upload/product/'.$v_content->options->image)}}" wight="40" alt="">
										</div>
										<div class="product-body">
											<h3 class="product-price">{{number_format($v_content->price).' VND'}}  <span class="qty">x {{$v_content->qty}}</span></h3>
											<h2 class="product-name"><a href="#">{{$v_content->name}}</a></h2>
										</div>
										<button class="cancel-btn">
											<form action="{{route('delete.cart',$v_content->rowId)}}" method="post">
												@csrf
												@method('delete')
												<button class="cancel-btn" type="submit"><i class="fa fa-trash"></i></button>
											</form>
										</button>
										<!-- <button class="cancel-btn"><i class="fa fa-trash"></i></button> -->
									</div>
									<?php 
									$subtotal=$v_content->price*$v_content->qty;
									$total+=$subtotal;
									?>
									@endforeach
								</div>
								<div class="sub-total">
									<!-- <strong class="text-uppercase empty">Tổng : </strong> -->
									<h3>Tổng : <?php echo number_format($total). ' VND'; ?></h3>
								</div>

								<div class="shopping-cart-btns">
									<a href="{{route('show.cart')}}"><button class="main-btn">Xem Giỏ Hàng</button></a>
									<?php if(Auth::user()){ ?>
									<a href="{{route('checkout')}}"><button class="primary-btn">Thanh Toán <i class="fa fa-arrow-circle-right"></i></button></a>
								<?php } ?>
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