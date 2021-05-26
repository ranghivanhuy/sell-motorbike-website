@extends('user.layout.master')
@section('titleuser')
Motor Cycle | Thông Tin Khách Hàng
@endsection
@section('banner-route')
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="{{route('trang-chu')}}">Trang Chủ</a></li>
			<li class="active">Thông Tin Của Khách Hàng</li>
		</ul>
	</div>
</div>
@endsection

@section('mcontent')
<div id="aside" class="col-md-4">
	<img style="width:100%; border-radius: 50%;" src="{{asset('frontend/img/avtar.jpg')}}" alt="Ảnh đại diện">
	<div style="text-align: center; margin-top:5%;">
		<h3>Xin Chào {{$user['name']}}</h3>
	</div>
	<div class="form-group">
		<div class="input-checkbox">
			<input type="checkbox" id="changepassword" >
			<label class="font-weak" for="changepassword">Bạn có muốn thay đổi password?</label>
			<div class="caption">
				<form action="{{route('change-password',Auth::user()->id)}}" method="post">
					@csrf
					@method('put')
					
					<div class="wrap-input100">
						<input class="input100" type="password" name="password_old" placeholder="Nhập Mật Khẩu Cũ"  >					
					</div>
					<div class="wrap-input100">
						<input class="input100" type="password" name="password_new" placeholder="Nhập Mật Khẩu Mới">
					</div>

					<div class="wrap-input100">
						<input class="input100" type="password" name="repassword_new" placeholder="Xác nhận Mật Khẩu Mới">
					</div>
					<div class="container-contact100-form-btn">
						<div class="wrap-contact100-form-btn">
							<div class="contact100-form-bgbtn"></div>
							<button type="submit" class="contact100-form-btn">
								Thay Đổi Mật Khẩu
							</button>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div>
<div id="aside" class="col-md-8">
	<div class="container-contact100">
		<div class="wrap-contact100">
			<h3 style="text-align: center;margin-bottom: 15px;">
				Thông Tin Của Bạn
			</h3>
			<form action="{{route('change-profile',Auth::user()->id)}}" method="post" class="contact100-form validate-form">
				@csrf
				@method('put')
				<div class="wrap-input100">
					<span class="label-input100">Tên Của Bạn</span>
					<input class="input100" type="text" name="name" value="{{$user['name']}}" >	
					@error('name') 
					<div class="alert alert-danger">{{$message}}</div>
					@enderror				
					
				</div>

				<div class="wrap-input100">
					<span class="label-input100">Địa Chỉ Của Bạn</span>
					<input class="input100" type="email" name="email" value="{{$user['email']}}">
				</div>

				<div class="wrap-input100">
					<span class="label-input100">Email Của Bạn</span>
					<input class="input100" type="text" name="address" value="{{$user['address']}}">
				</div>

				<div class="wrap-input100">
					<span class="label-input100">Số Điện Thoại Của Bạn</span>
					<input class="input100" type="text" name="phone" value="{{$user['phone']}}">
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button type="submit" class="contact100-form-btn">
							Thay Đổi Thông Tin
						</button>
					</div>
				</div>
			</form>
			
		</div>

	</div>
	
</div>



@endsection


