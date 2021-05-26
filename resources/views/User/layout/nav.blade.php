<!-- NAVIGATION -->
<div id="navigation">
	<!-- container -->
	<div class="container">
		<div id="responsive-nav">
			<!-- menu nav -->
			<div class="menu-nav">
				<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
				<ul class="menu-list" >
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
					<li><a href="{{route('news')}}">Tin Tức</a></li>
					<li><a href="#">Thông Tin Cửa Hàng</a></li>					
					<li><a href="{{route('contact')}}">Liên Hệ</a></li>
				</ul>
			</div>
			<!-- menu nav -->
		</div>
	</div>
	<!-- /container -->
</div>
			<!-- /NAVIGATION -->