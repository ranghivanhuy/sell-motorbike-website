@extends('user.layout.master')
@section('titleuser')
Motor Cycle | Trang Chủ
@endsection
@section('banner-route')

<div id="home">
	<!-- container -->
	<div class="container">
		
		<!-- home slick -->
		<div id="home-slick">
			<!-- banner -->
			<div class="banner banner-1">
				<img src="{{asset('frontend/img/banner1.jpg')}}" alt="">
			</div>
			<!-- /banner -->

			<!-- banner -->
			<div class="banner banner-1">
				<img src="{{asset('frontend/img/banner2.jpg')}}" alt="">
			</div>
			<!-- /banner -->

			<!-- banner -->
			<div class="banner banner-1">
				<img src="{{asset('frontend/img/banner3.jpg')}}" alt="">
				<!-- <div class="banner-caption">
					<h1 class="white-color">New Product <span>Collection</span></h1>
					<button class="primary-btn">Shop Now</button>
				</div> -->
			</div>
			<!-- /banner -->
		</div>
		<!-- /home slick -->

	</div>
	<!-- /container -->
</div>
@endsection

@section('aside')
<div id="aside">
	<!-- Search -->
	<div class="header-search">
		<h3 class="aside-title active">Tìm Kiếm</h3>
		<form action="{{route('search-product')}}" method="get">
			<input class="input search" name="search" type="text" placeholder="Nhập Từ Khóa">
			<button type="submit" class="search-btn"><i class="fa fa-search" style="padding-left: 50px;"></i></button>
		</form>
	</div>
	<!-- /Search -->

	<!-- aside widget -->

	<!-- aside widget -->
	<div class="aside">
		<h3 class="aside-title"><a href="{{route('allproduct')}}">Danh Mục</a></h3>
		<ul class="list-links">
			@foreach($list_all_category as $cate)
			<li><a href="{{route('more-category-product',$cate->id)}}"><h5>{{$cate->name}}</h5></a></li>
			@foreach($cate->children as $parent)
			<i class="fal fa-badge-sheriff"><li><a href="{{route('more-product',$parent->id)}}">{{$parent->name}}</a></li></i>
			@endforeach
			<hr>
			@endforeach
		</ul>	
	</div>

	<!-- /aside widget -->
</div>

@endsection


@section('content')

<!-- section title -->
<div class="col-md-12">
	<div class="section-title">
		<h3 class="title"> Sản Phẩm Hot</h3>
	</div>
</div>
<!-- section title -->

<!-- Product Single -->
@foreach($list_highlight_product as $prolh)
<div class="col-md-4 col-sm-6 col-xs-6">
	<div class="product product-single">
		<div class="product-thumb">
			<a href="{{route('product-detail',$prolh->id)}}"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Xem Chi Tiết</button></a>
			<img src="{{asset('upload/product/'.$prolh->image_path)}}" alt="" height="175px">
		</div>
		<form action="{{route('save.cart')}}" method="post">
			@csrf
			<div class="product-body">
				<h3 class="product-price">{{number_format($prolh->price)}} VND</h3>
				<h2 class="product-name">{{$prolh->name}}</h2>
				<input type="hidden" name="productid_hidden" value="{{$prolh->id}}">
				<div class="product-btns">
					<h5>Còn {{$prolh->quantity}} Sản Phẩm </h5>
					<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm Giỏ Hàng</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endforeach
<!-- /Product Single -->
<!-- test -->

<!-- /test -->
<!-- section title -->
<div class="col-md-12">
	<div class="section-title">
		<h3 class="title"> Sản Phẩm Của Shop</h3>
	</div>
	<div class="pull-right"><a href="{{route('allproduct')}}">Xem Thêm</a></div>
</div>
<!-- section title -->

<!-- Product Single -->
@foreach($list_all_product as $key => $product)
<div class="col-md-4 col-sm-6 col-xs-6">
	<div class="product product-single">
		<div class="product-thumb">
			<a href="{{route('product-detail',$product->id)}}"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Xem Chi Tiết</button></a>
			<img src="{{asset('upload/product/'.$product->image_path)}}" alt="" height="175px;">
		</div>
		<form action="{{route('save.cart')}}" method="post">
			@csrf
			<div class="product-body">
				<h3 class="product-price">{{number_format($product->price)}} VND</h3>
				<h2 class="product-name">{{$product->name}}</h2>
				<input type="hidden" name="productid_hidden" value="{{$product->id}}">
				<div class="product-btns">
					<h5>Còn {{$product->quantity}} Sản Phẩm </h5>
					<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm Giỏ Hàng</button>
				</div>
			</div>
		</form>
	</div>
</div>

@endforeach
<!-- /Product Single -->
<div class="col-md-12">
	<div class="section-title">
		<h2 class="title">Tin Tức</h2>
		
	</div>
	@foreach($listpost as $post)
	<p><a href="{{route('news-post',$post->id)}}" style="font-size: 15px; font-weight: bold;" > * {{$post->title}}</a></p>
	@endforeach
</div>
<!-- /row -->
<!-- </div> -->
<!-- /container -->
<!-- </div> -->
@endsection

