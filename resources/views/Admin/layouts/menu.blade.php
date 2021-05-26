<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fa fa-user-circle"></i>
		</div>
		<div class="sidebar-brand-text mx-3">Moto Shop</div>
	</a>

	{{-- uses config menuAdmin --}}
	@php
	$menus = config('menu');
	// print_r($menus);
	@endphp

		@foreach($menus as $m)	
		
				@php
				$class = !empty($m['item'])?'collapse':'';
				@endphp

				<li class="nav-item">
				<a class="nav-link collapsed" href=" {{Route::has($m['route'])? route($m['route']): '#'}}" data-toggle="{{$class}}" data-target="#collapse{{$m['name']}}" aria-expanded="true" aria-controls="collapse{{$m['name']}}">
					<i class="fa {{ $m['icon'] }}" aria-hidden="true"></i>
					<span>{{ $m['name'] }}</span>
				</a>

				@if(!empty($m['item']))

				<div id="collapse{{$m['name']}}" class="collapse" aria-labelledby="heading{{$m['name']}}" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">

					@foreach($m['item'] as $mitem)
						<a class="collapse-item" href="{{Route::has($mitem['route'])? route($mitem['route']): '#' }}">
						{{$mitem['name']}}</a>
					@endforeach

				</div>
				</div>

				@endif

			</li>
		@endforeach

				<div class="text-center d-none d-md-inline">
					<button class="rounded-circle border-0" id="sidebarToggle"></button>
				</div>

			</ul>