@extends('user.layout.master')
@section('titleuser')
Motor Cycle | Thanh Toán Giỏ Hàng
@endsection
@section('banner-route')
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="#">Trang Chủ</a></li>
			<li class="active">Thanh Toán</li>
		</ul>
	</div>
</div>
@endsection
@section('mcontent')
<?php 
$content=Cart::content(); 
// echo '<pre>';
// print_r($content);
// echo '</pre>';
?>
<form action="{{route('order')}}" method="post" id="checkout-form" class="clearfix">
	@csrf
	<div class="col-md-6">
		<div class="billing-details">
			
			<div class="section-title">
				<h3 class="title">Thông Tin Người Nhận</h3>
			</div>
			<div class="form-group">
				<input class="input" type="text" name="name" placeholder=" Name" value="{{Auth::user()->name}}">
			</div>
			<div class="form-group">
				<input class="input" type="text" name="address" placeholder="Address" value="{{Auth::user()->address}}">
			</div>
			
			<div class="form-group">
				<input class="input" type="tel" name="phone" placeholder="Telephone" value="{{Auth::user()->phone}}">
			</div>
			
		</div>
	</div>

	<div class="col-md-6">
		<div class="shiping-methods">
			<div class="section-title">
				<h4 class="title">Phí Vận Chuyển</h4>
			</div>
			<div class="input-checkbox">
				<input type="radio" value="0" name="shipping" id="shipping-1" checked>
				<label for="shipping-1">Miễn Phí Vận Chuyển</label>
				<div class="caption">
					<p>Tất cả các sản phẩm đều miễn phí ship trên toàn quốc</p>
				</div>
			</div>
			<div class="section-title">
				<h4 class="title">Phương Thức Thanh Toán</h4>
			</div>
			<div class="input-checkbox">
				<input type="radio" value="0" name="payment" id="shipping-1" checked>
				<label for="shipping-1">Thanh Toán Khi Giao Hàng</label>
				<div class="caption">
					<p>Vui Lòng Kiểm tra hàng kĩ khi nhân viên giao hàng</p>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="order-summary clearfix">
			<div class="section-title">
				<h3 class="title">Xem Lại Giỏ Hàng</h3>
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
					<?php $total=0;  ?>
					@foreach($content as $v_content)
					<tr>
						<td class="thumb"><img src="{{asset('upload/product/'.$v_content->options->image)}}" wight="70" alt=""></td>
						<td class="details"><a href="#">{{$v_content->name}}</a>					</td>
						<td class="price text-center"><strong>{{number_format($v_content->price).' VND'}} </strong></td>
						<td class="qty text-center"><input class="input" name="quatity_cart" type="number" disabled value="{{$v_content->qty}}"></td>				
						<td class="total text-center"><strong class="primary-color">
							<?php 
							$subtotal=$v_content->price*$v_content->qty;
							$total+=$subtotal;
							echo number_format($subtotal).' VND';
							?>
						</strong></td>
					</tr>

					@endforeach
					
				</tbody>
				<tfoot>
					@if($content->count()!=0)
					<tr>
						<th class="empty" colspan="3"></th>
						<th>Tổng</th>
						@foreach($content as $v_content)
						@endforeach
						<th colspan="2" class="total"><?php echo number_format($total). ' VND'; ?></th>
					</tr>
					<?php 
					$coupon_number=0;
					$total_sum=0;
					$number='';
					$coupon_id=0;
					if(Session::get('coupon')){

						foreach(Session::get('coupon') as $cou){
							if($cou['coupon_condition']==1){
								$coupon_id = $cou['id'];
								$coupon_number = $cou['coupon_number'];
								$number = $coupon_number. ' %';
								$total_sum = $total-($total*$cou['coupon_number'])/100;
							}
							else if($cou['coupon_condition']==2){
								$coupon_id = $cou['id'];
								$coupon_number=$cou['coupon_number'];
								$number=$coupon_number. ' VND';
								$total_sum=$total-$coupon_number;
							}
						}
					}else(
						$total_sum = $total 
					)
					?>
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
					@else
					<tr>
						<td colspan="5" style="text-align: center;" ><h4 style="color: green">Chưa Có Sản Phẩm Để Thanh Toán</h4></td>
						
					</tr>
					@endif
				</tfoot>
			</table>
			@if($content->count()!=0)
			<input type="hidden" name="order_total" value="{{$total_sum}}">
			<input type="hidden" name="coupon_id" value="{{$coupon_id}}">
			<div class="pull-right">
				<button type="submit" class="primary-btn">Đặt hàng</button>
			</div>
			@endif
			
		</div>

	</div>
</form>
@if($content->count()==0)
<div class="col-md-12">
	<div class="pull-right">
		<button class="btn btn-danger"><a href="{{route('trang-chu')}}">Về Trang Chủ</a></button>
	</div>
</div>
@endif

@endsection