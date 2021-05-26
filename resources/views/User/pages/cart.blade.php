@extends('user.layout.master')
@section('titleuser')
Motor Cycle | Giỏ Hàng
@endsection
@section('banner-route')
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="{{route('trang-chu')}}">Trang Chủ</a></li>
			<li class="active">Giỏ Hàng</li>
		</ul>
	</div>
</div>
@endsection

@section('mcontent')
<?php 
$content=Cart::content();
?>
<!-- <form id="checkout-form" class="clearfix"> -->
	<div class="col-md-12">
		<div class="order-summary clearfix">
			<div class="section-title">
				<h3 class="title">Giỏ Hàng</h3>
			</div>
			<table class="shopping-cart-table table">
				<thead>
					<tr>
						<th class="">Hình Ảnh</th>
						<th class="">Mô Tả</th>
						<th class="text-center">Giá</th>
						<th class="text-center">Số Lượng</th>
						<th class="text-center">Tổng</th>
						<th class="text-right"></th>
					</tr>
				</thead>
				<tbody>
					<?php $total=0; ?>
					@foreach($content as $v_content)
					<tr>
						<td class="thumb"><img src="{{asset('upload/product/'.$v_content->options->image)}}" wight="70" alt=""></td>
						<td class="details">
							<a href="#">{{$v_content->name}}</a>

							
						</td>
						<td class="price text-center"><strong>{{number_format($v_content->price).' VND'}} </strong></td>

						
						<!-- <form action="{{route('updatecart',$v_content->rowId)}}" method="post">
							@csrf
							@method('PUT')
						</form> -->
						
						<td class="qty text-center">
							<form action="{{route('updatecart',$v_content->rowId)}}" method="post">
								@csrf
								@method('put')
								<input class="input" name="quatity_cart" type="number" min="1" max="10" value="{{$v_content->qty}}">
								<input name="product_id_hidden" type="hidden" value="{{$v_content->id}}">

								<button type="submit" class="btn btn-info btn-sm"> Cập nhật</button>
							</form>
						</td>

						
						<td class="total text-center"><strong class="primary-color">
							<?php 
							$subtotal=$v_content->price*$v_content->qty;
							
							$total+=$subtotal;
							echo number_format($subtotal).' VND';
							?>
						</strong></td>

						<td class="text-right">
							<form action="{{route('delete.cart',$v_content->rowId)}}" method="post">
								@csrf
								@method('delete')
								<button type="submit" class="main-btn icon-btn"><i class="fa fa-close"></i></button>
							</form>
						</td>

					</tr>

					@endforeach
					@if($content->count()!=0)
					<tr>
						<form action="{{route('check-coupon')}}" method="post">
							@csrf
							<td>
								<input class="input" name="coupon_code" type="text" placeholder="Nhập Giảm Giá (nếu có)">
							</td>
							<td style="text-align: center;">
								<button type="submit" name="checkcoupon" class="btn btn-info">Submit Giảm Giá</button>
							</td>
						</form>

					</tr>
					@else 
					<tr>
						<td colspan="5" style="text-align: center;" ><h4 style="color: green">Vui Lòng Chọn Sản Phẩm Trước Khi Thanh Toán</h4></td>
						
					</tr>
					@endif

				</tbody>
				@php  
					$coupon_number=0;
					$total_sum=0;
					$number='';
					if(Session::get('coupon')){
						foreach(Session::get('coupon') as $cou){
							if($cou['coupon_condition']==1){
								$coupon_number=$cou['coupon_number'];
								$number=$coupon_number. ' %';
								$total_sum=$total-($total*$cou['coupon_number'])/100;
							}
							else if($cou['coupon_condition']==2){
								$coupon_number=$cou['coupon_number'];
								$number=$coupon_number. ' VND';
								$total_sum=$total-$coupon_number;
							}
						}
					}else(
						$total_sum = $total 
					)
					@endphp
				<tfoot>
					@if($content->count()!=0)
					<tr>
						<th class="empty" colspan="3"></th>
						<th>Tổng</th>
						@foreach($content as $v_content)
						@endforeach
						<th colspan="2" class="total"><?php echo number_format($total). ' VND'; ?></th>
					</tr>
					<tr>
						<th class="empty" colspan="3"></th>
						<th>Mã Giảm Giá</th>
						<th colspan="2" class="total">{{$number}}</th>
					</tr>
					<tr>
						<th class="empty" colspan="3"></th>
						<th> Tổng Cộng</th>
						<th colspan="2" class="total">{{number_format($total_sum)}} VND</th>
					</tr>
					@endif
				</tfoot>
			</table>


		</div>

	</div>
	<!-- </form> -->
	@if($content->count()!=0)
	<div class="pull-right">
		<?php if(Auth::user()){ ?>
			<a href="{{route('checkout')}}"><button class="primary-btn">Thanh Toán</button></a>
		<?php }else{ ?>
			<a href="{{route('checkout-login')}}"><button class="primary-btn">Thanh Toán</button></a>

		<?php } ?>

	</div>
	@endif
	@endsection