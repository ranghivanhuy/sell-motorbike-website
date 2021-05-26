@extends('user.layout.master')
@section('titleuser')
Motor Cycle | Đăng Nhập Hoặc Đăng Ký
@endsection

@section('mcontent')
<!--form-->
<div class="container">
	<div class="row">
		<div class="col-sm-5">
			<div class="container-contact100">
				<div class="wrap-contact100">
					<h3 style="text-align: center;margin-bottom: 15px;">
						Form Đăng Nhập
					</h3>
					<form class="contact100-form validate-form"action="{{route('user.login')}}" method="post">
						@csrf
						<div class="wrap-input100">
							<span class="label-input100">Email Của Bạn</span>
							<input class="input100" type="text" name="email" placeholder=" Vui lòng Nhập Email" value="{{old('email')}}">
							@error('email') 
							<div class="alert alert-danger">{{$message}}</div>
							@enderror
						</div>
						<div class="wrap-input100">
							<span class="label-input100">Mật Khẩu Của Bạn</span>
							<input class="input100" type="password" name="password" placeholder=" Vui Lòng Nhập password" value="{{old('password')}}" >
							@error('password') 
							<div class="alert alert-danger">{{$message}}</div>
							@enderror
						</div>



						<div class="container-contact100-form-btn">
							<div class="wrap-contact100-form-btn">
								<div class="contact100-form-bgbtn"></div>
								<button type="submit" class="contact100-form-btn">
									Login
								</button>
							</div>
						</div>
					</form>

				</div>

			</div>

		</div>

		<div class="col-sm-7">
				<!-- <div class="signup-form">
					<h2> Form Đăng Kí!</h2>
					<form action="{{route('user.create')}}" method="post">
						@csrf
						<input type="text" name="name" placeholder="Name" value="{{old('name')}}"/>
						<input type="email" name="email" placeholder="Email Address" value="{{old('email')}}"/>
						<input type="password" name="password" placeholder="Password" value="{{old('password')}}"/>
						<input type="text" name="address" placeholder="Address" value="{{old('address')}}"/>
						<input type="text" name="phone" placeholder="Phone" value="{{old('phone')}}"/>
						<button type="submit" class="btn btn-default">Đăng Kí</button>
					</form>
				</div> -->
				<div class="container-contact100">
					<div class="wrap-contact100">
						<h3 style="text-align: center;margin-bottom: 15px;">
							Đăng Kí Tài Khoản
						</h3>
						<form class="contact100-form validate-form" action="{{route('user.create')}}" method="post">
							@csrf
							<div class="wrap-input100">
								<span class="label-input100">Tên Của Bạn</span>
								<input class="input100" type="text" name="name" value="{{old('name')}}" placeholder="Vui lòng điền tên của bạn" >	
								@error('name') 
								<div class="alert alert-danger">{{$message}}</div>
								@enderror				
							</div>
							<div class="wrap-input100">
								<span class="label-input100">Email Của Bạn</span>
								<input class="input100" type="email" name="re_email" value="{{old('re_email')}}" placeholder="Vui lòng nhập địa chỉ email">
								@error('re_email') 
								<div class="alert alert-danger">{{$message}}</div>
								@enderror
							</div>
							<div class="wrap-input100">
								<span class="label-input100">Mật Khẩu</span>
								<input class="input100" type="password" name="re_password" value="{{old('re_password')}}" placeholder="Vui lòng nhập password">
								@error('re_password') 
								<div class="alert alert-danger">{{$message}}</div>
								@enderror
							</div>

							<div class="wrap-input100">
								<span class="label-input100">Địa Chỉ</span>
								<input class="input100" type="text" name="address" value="{{old('address')}}" placeholder="Vui lòng nhập địa chỉ">
								@error('address') 
								<div class="alert alert-danger">{{$message}}</div>
								@enderror
							</div>

							<div class="wrap-input100">
								<span class="label-input100">Số Điện Thoại</span>
								<input class="input100" type="text" name="phone" value="{{old('phone')}}" placeholder="Vui lòng nhập số điện thoại">
								@error('phone') 
								<div class="alert alert-danger">{{$message}}</div>
								@enderror
							</div>

							<div class="container-contact100-form-btn">
								<div class="wrap-contact100-form-btn">
									<div class="contact100-form-bgbtn"></div>
									<button type="submit" class="contact100-form-btn">
										Đăng Ký
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

@endsection



