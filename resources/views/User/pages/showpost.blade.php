@extends('user.layout.master')
@section('titleuser')
Motor Cycle | Bài Viêt : {{$post->title}}
@endsection
@section('banner-route')
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="{{route('trang-chu')}}">Home</a></li>
			<li><a href="{{route('news')}}">Bài Viết</a></li>
			<li class="active">{{$post->title}}</li>
		</ul>
	</div>
</div>

@endsection

@section('aside')
<div id="aside">
	<div class="aside">
		<h3 class="aside-title"><a href="{{route('allproduct')}}">Các Bài Viết Khác</a></h3>
		<ul class="list-links">
			@foreach($listRelatePost as $lrPost)
			<li><a href="{{route('news-post',$lrPost->id)}}"><h5>{{$lrPost->title}}</h5></a></li>
			@endforeach
		</ul>	
	</div>
	
	<!-- /aside widget -->
</div>

@endsection


@section('content')
<h1>{{$post->title}}</h1>
<p>{!!$post->content!!}</p>
@endsection