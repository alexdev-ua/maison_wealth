<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		@if($platform == 'mobile')
			@include('includes.mobile.head')
		@else
			@include('includes.desktop.head')
		@endif
	</head>
	<body>
		<!-- header -->
		@if($platform == 'mobile')
			@include('includes.mobile.header')
		@else
			@include('includes.desktop.header')
		@endif
		<!-- end header -->

		<div class="page">

			<!-- sidebar menu -->
			@if($platform == 'mobile')
				@include('includes.mobile.menu')
			@else
				@include('includes.desktop.user_menu')
			@endif
			<!-- end sidebar menu -->

			<!-- content -->
			<div class="content">
				@yield('content')
			</div>
			<!-- end content -->

			@if($platform == 'mobile')
				@include('includes.mobile.contact_form')
			
			@endif
		</div>

		<!-- footer -->
		@if($platform == 'mobile')
			@include('includes.mobile.footer')
		@else
			@include('includes.desktop.footer')
		@endif
		<!-- end footer -->

	</body>
</html>
