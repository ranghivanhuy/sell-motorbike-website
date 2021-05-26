@extends('user.layout.master')
@section('titleuser')
Motor Cycle | {{$single_product['name']}}
@endsection

@section('banner-route')

	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{route('trang-chu')}}">Trang Chủ</a></li>
				<li><a href="#">
					@if($single_product->category->parent_id==1)
					Xe Máy
					@elseif($single_product->category->parent_id==2)
					Xe Phân Khối Lớn
					@else
					Phụ Tùng
					@endif
				</a></li>
				<li><a href="#">{{$single_product->category->name}}</a></li>
				<li class="active">{{$single_product['name']}}</li>
			</ul>
		</div>
	</div>

@endsection

@section('mcontent')
<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!--  Product Details -->
			<div class="product product-details clearfix">
				
				
				<div class="col-md-6">
					<!-- <div id="product-main-view"> -->
						<div class="product-view">
							<img src="{{asset('upload/product/'.$single_product->image_path)}}" alt="">
						</div>	
						<!-- </div> -->

					</div>
					<div class="col-md-6">
						<div class="product-body">
							<h2 class="product-name">{{$single_product['name']}}</h2>

							<p><strong>Brand: </strong>{{$single_product->category->name}}</p>
							<p><strong>Description:</strong></p>
							<p>{!!$single_product['description']!!}</p>
							<form action="{{route('save.cart')}}" method="post">
								@csrf


								<h3 class="product-price">{{number_format($single_product['price'])}} VND</h3>
								<div class="product-btns">
									<div class="qty-input">
										<span class="text-uppercase">QTY: </span>
										<input class="input"name="quantity" type="number" value="1" min="1" max="10">
										
									</div>
									
									
									<input type="hidden" name="productid_hidden" value="{{$single_product['id']}}">
									<h5>Còn {{$single_product->quantity}} Sản Phẩm </h5>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm Giỏ Hàng</button>
									
								</div>
							</form>
						</div>
					</div>

					<div class="col-md-12">
						<div class="product-tab">
							<ul class="tab-nav">
								<li><a data-toggle="tab" href="#tab2">Reviews ({{$listcomment['comment']->count()}})</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab2" class="tab-pane fade in">

									<div class="row">
										<div class="col-md-6">
											<div class="product-reviews">
												@foreach($listcomment['comment'] as $cmt)
												<div class="single-review">
													<div class="review-heading">
														<div><a href="#"><i class="fa fa-user-o"></i> {{$cmt->name}}</a></div>
														<div><a href="#"><i class="fa fa-clock-o"></i> {{$cmt->created_at}}</a></div>
														<div class="review-rating pull-right">
															@for($i=0;$i<$cmt->rate;$i++)
															<i class="fa fa-star"></i>
															@endfor
															@for($j=0;$j<5-$cmt->rate;$j++)
															<i class="fa fa-star-o empty"></i>
															@endfor
														</div>
													</div>
													<div class="review-body">
														<p>{{$cmt->content}}</p>
													</div>
												</div>
												@endforeach

												<ul class="reviews-pages">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
												</ul>
											</div>
										</div>
										<div class="col-md-6">
											<h4 class="text-uppercase">Write Your Review</h4>
											<form action="{{route('send-comment-product',$single_product['id'])}}" method="post" class="review-form">
												@csrf
												<div class="form-group">
													<input class="input" type="text" name="name" placeholder="Your Name" />
												</div>
												
												<div class="form-group">
													<textarea class="input" name="content" placeholder="Your review"></textarea>
												</div>
												<div class="form-group">
													<div class="input-rating">
														<strong class="text-uppercase">Đánh Giá Của Bạn: </strong>
														<div class="stars">
															<input type="radio" id="star5" name="rate" value="5" /><label for="star5"></label>
															<input type="radio" id="star4" name="rate" value="4" /><label for="star4"></label>
															<input type="radio" id="star3" name="rate" value="3" /><label for="star3"></label>
															<input type="radio" id="star2" name="rate" value="2" /><label for="star2"></label>
															<input type="radio" id="star1" name="rate" value="1" /><label for="star1"></label>
														</div>
													</div>
												</div>
												<button class="primary-btn">Đánh Giá Của Bạn</button>
											</form>
										</div>
									</div>



								</div>
							</div>
						</div>
					</div>


				</div>
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Sản Phẩm Liên Quan</h2>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				@foreach($relate_product as $rpro)
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<a href="{{route('product-detail',$rpro->id)}}"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i>Xem Chi Tiết</button></a>
							<img src="{{asset('upload/product/'.$rpro->image_path)}}" alt="" height="175px">
						</div>
						<div class="product-body">
							<h3 class="product-price">{{number_format($rpro->price)}} VND</h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="#">{{$rpro->name}}</a></h2>
							<div class="product-btns">
								<h5>Còn {{$rpro->quantity}} Sản Phẩm </h5>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm Giỏ Hàng</button>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<!-- /Product Single -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->


	@endsection