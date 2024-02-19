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
			@endif
			<!-- end sidebar menu -->

			<!-- content -->
			<div class="content">
				@yield('content')
			</div>
			<!-- end content -->

			<!-- pop-ups -->
			@if($platform == 'mobile')
				@include('includes.mobile.consult_popup')
			@else
				@include('includes.desktop.consult_popup')
			@endif
			<!-- end pop-ups -->

		</div>

		@if($platform == 'desktop')
			@if($showCookies)
			<div class="cookies-panel">
				<div class="row">
					<div class="col-6 offset-6 pl-0">
						<div class="cookies-content">
							<button class="close-cookies-btn"><img src="/images/ic_close.svg" /></button>
							<p class="cookies-message mb-0">To improve your experience on our site and to show you relevant advertising.<br>To find out more, read our <a href="" class="custom-link">Privacy Policy</a> and <a href="" class="custom-link">Cookie Policy</a>.</p>
							<button class="main-btn black-btn accept-cookies-btn">Accept</button>
						</div>
					</div>
				</div>
			</div>
			@endif
		@endif

		<script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl=en' async defer></script>
	</body>
</html>
