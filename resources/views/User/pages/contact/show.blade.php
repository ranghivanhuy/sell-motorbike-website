@extends('user.layout.master')
@section('titleuser')
Motor Cycle | Liên Hệ
@endsection
@section('banner-route')
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="{{route('trang-chu')}}">Home</a></li>
			<li class="active">Contact</li>
		</ul>
	</div>
</div>
@endsection
@section('mcontent')
<div class="col-md-12">
	<div class="col-md-6">
		<div class="section-title">
			<h2 class="title">Câu Hỏi Thường Gặp</h2>

		</div>
	</div>
	<div class="col-md-6">

		<div class="container-contact100">
			<div class="wrap-contact100">
				<h3 style="text-align: center;margin-bottom: 15px;">
					Thắc mắc Của Bạn
				</h3>
				<form action="{{route('send-contact')}}" method="post" class="contact100-form validate-form">
					@csrf
					<div class="wrap-input100">
						<span class="label-input100">Your Name</span>
						<input class="input100" type="text" name="name" value="{{old('name')}}" >					
					</div>
					@error('name') 
					<div class="alert alert-danger">{{$message}}</div>
					@enderror

					<div class="wrap-input100">
						<span class="label-input100">Your Email</span>
						<input class="input100" type="email" name="email" value="{{old('email')}}">
					</div>
					@error('email') 
					<div class="alert alert-danger">{{$message}}</div>
					@enderror

					<div class="wrap-input100">
						<span class="label-input100">Your Address</span>
						<input class="input100" type="text" name="address" value="{{old('address')}}">
					</div>
					@error('address') 
					<div class="alert alert-danger">{{$message}}</div>
					@enderror

					<div class="wrap-input100">
						<span class="label-input100">Your Phone</span>
						<input class="input100" type="text" name="phone" value="{{old('phone')}}">
					</div>
					@error('phone') 
					<div class="alert alert-danger">{{$message}}</div>
					@enderror

					<div class="wrap-input100">
						<span class="label-input100"> Your Message</span>
						<textarea class="input100" name="contact" value="{{old('contact')}}" placeholder="Your message here..."></textarea>
					</div>
					@error('contact') 
					<div class="alert alert-danger">{{$message}}</div>
					@enderror

					<div class="container-contact100-form-btn">
						<div class="wrap-contact100-form-btn">
							<div class="contact100-form-bgbtn"></div>
							<button type="submit" class="contact100-form-btn">
								Submit
							</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

@endsection