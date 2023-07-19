<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
	@if($platform == 'mobile')
		@include('dashboard.includes.desktop.head')
	@else
		@include('dashboard.includes.desktop.head')
	@endif
	</head>
	<body>
		@if($platform == 'mobile')
			@include('dashboard.includes.desktop.header')
		@else
			@include('dashboard.includes.desktop.header')
		@endif
		<div class="page">
			<!-- content -->
			<div class="page-container">
				@if(Auth::guard('admin')->user() && $platform == 'desktop')
				<div class="content-block">
					@include('dashboard.includes.desktop.menu_sidebar')
				</div>
				@endif
				<div class="content-block main-content">
					@yield('content')
				</div>
				@if(Auth::guard('admin')->user() && $platform == 'desktop')
				<div class="content-block">
					@include('dashboard.includes.desktop.profile_sidebar')
				</div>
				@endif
			</div>
			<!-- end content -->
		</div>
	</body>
</html>
