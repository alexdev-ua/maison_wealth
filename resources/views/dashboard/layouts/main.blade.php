<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
	@if($platform == 'mobile')
		@include('dashboard.includes.mobile.head')
	@else
		@include('dashboard.includes.desktop.head')
	@endif
	</head>
	<body>
		@if($platform == 'mobile')
			@include('dashboard.includes.mobile.header')
		@else
			@include('dashboard.includes.desktop.header')
		@endif
		<div class="page">
			<!-- content -->
			<div id="content" class="content p-3">
				@yield('content')
			</div>
			<!-- end content -->
		</div>
	</body>
</html>
