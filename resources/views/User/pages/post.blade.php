@extends('user.layout.master')
@section('titleuser')
Motor Cycle | Tất Cả Bài Viết
@endsection
@section('banner-route')
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
			<li><a href="{{route('news')}}">Bài viết</a></li>
		</ul>
	</div>
</div>

@endsection

@section('mcontent')
<h3>Tất Cả Bài Viết</h3>
<ul class="list-links">
	@foreach($listPost as $lPost)
	<li><a href="{{route('news-post',$lPost->id)}}"><h5>{{$lPost->title}}</h5></a></li>
	@endforeach
</ul>	
{{$listPost->links()}}



@endsection