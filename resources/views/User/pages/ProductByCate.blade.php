@extends('user.layout.master')
@section('titleuser')
Motor Cycle | {{$category->name}} 
@endsection
@section('banner-route')
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="{{route('trang-chu')}}">Trang Chủ</a></li>
			<li><a href="#">
				@if($category->parent_id==1)
				Xe Máy
				@elseif($category->parent_id==2)
				Xe Phân Khối Lớn
				@else
				Phụ Tùng
				@endif
			</a></li>
			<li class="active">{{$category->name}} </li>
		</ul>
	</div>
</div>
@endsection

@section('aside')
<div id="aside">
	<!-- Search -->
	<div class="header-search">
		<h3 class="aside-title active">Tìm Kiếm</h3>
		<form action="{{route('search-product-user')}}" method="post">
			@csrf
			<input class="input search" name="search" type="text" placeholder="Nhập Từ Khóa">
			<button type="submit" class="search-btn"><i class="fa fa-search" style="padding-left: 50px;"></i></button>
		</form>
	</div>
	<!-- /Search -->
	<h4>Sắp Xếp Theo Giá</h4>
	<form action="{{route('more-product',$id)}}" method="get" accept-charset="utf-8">
		<div class="form-check">
			<input class="form-check-input" name="sortprice" type="radio" value="1" id="defaultCheck1">
			<label class="form-check-label" for="defaultCheck1">
				0 - 1.000.000
			</label>
		</div>
		<div class="form-check">
			<input class="form-check-input" name="sortprice" type="radio" value="2" id="defaultCheck2">
			<label class="form-check-label" for="defaultCheck2">
				1.000.000 - 30.000.000
			</label>
		</div>
		<div class="form-check">
			<input class="form-check-input" name="sortprice" type="radio" value="3" id="defaultCheck2">
			<label class="form-check-label" for="defaultCheck2">
				30.000.000  -120.000.000
			</label>
		</div>
		<div class="form-check">
			<input class="form-check-input" name="sortprice" type="radio" value="4" id="defaultCheck2">
			<label class="form-check-label" for="defaultCheck2">
				120.000.000 - 700.000.000
			</label>
		</div>
		<div class="form-check">
			<input class="form-check-input" name="sort-price" type="radio" value="5" id="defaultCheck2">
			<label class="form-check-label" for="defaultCheck2">
				-- Tất Cả --
			</label>
		</div>
		<button type="submit" class="btn btn-danger" name="sort"> Sắp Xếp</button>
	</form>
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
<!-- store top filter -->
<div class="store-filter clearfix">
	<div class="pull-left">
		<div class="sort-filter">
			<form id="sort-product" action="{{route('more-product',$id)}}" method="get" >
				@csrf
				<span class="text-uppercase">Sắp Xếp Theo</span>
				<select class="input" name="sort">
					<option value="1">Tên A-Z</option>
					<option value="2">Tên Z-A</option>
					<option value="3">Giá Tăng Dần</option>
					<option value="4">Giá Giảm Dần</option>
				</select>
				<button type='submit' class="btn btn-danger">Tìm</button>
			</form>
		</div>
	</div>
</div>
<!-- /store top filter -->
<div id="store">
	<!-- row -->
	<div class="row">
		<div class="col-md-12">
			<H3>{{$category->name}} : {{$sortby}}</H3>
		</div>
		<!-- Product Single -->
		@foreach($listProductByCate as $pcProduct)
		<div class="col-md-4 col-sm-6 col-xs-6">
			<div class="product product-single">
				<div class="product-thumb">
					<!-- <div class="product-label">
						<span>New</span>
						<span class="sale">-20%</span>
					</div> -->
					<a href="{{route('product-detail',$pcProduct->id)}}"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Xem Chi Tiết</button></a>
					<img src="{{asset('upload/product/'.$pcProduct->image_path)}}" alt="" height="175px">
				</div>

				<form action="{{route('save.cart')}}" method="post">
					@csrf
					<div class="product-body">
						<h3 class="product-price">{{number_format($pcProduct->price)}} VND </h3>

						<h2 class="product-name"><a href="#">{{$pcProduct->name}}</a></h2>
						<input type="hidden" name="productid_hidden" value="{{$pcProduct->id}}">

						<div class="product-btns">
							<h5>Còn {{$pcProduct->quantity}} Sản Phẩm </h5>
							<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm Giỏ Hàng</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		@endforeach
		<!-- /Product Single -->

	</div>
	<!-- /row -->
</div>
<!-- /STORE -->


@endsection


