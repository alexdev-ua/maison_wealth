<div class="header">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<span class="navbar-brand" href="#"></span>
		<a class="site-title" href="{{route('dashboard')}}">Sunny DVG - Control panel</a>
		@if(Auth::guard('admin')->check())
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto row">
				<li class="nav-item active col-4">
					<a class="nav-link" href="{{route('dashboard')}}"><i class="fas fa-columns mr-1"></i> Home <span class="sr-only">(current)</span></a>
				</li>

				<li class="nav-item active col-4">
					<a class="nav-link" href="{{route('dashboard.orders')}}"><i class="far fa-address-card mr-1"></i> Contact forms </a>
				</li>

				<li class="nav-item col-4">
					<a class="nav-link" href="{{route('dashboard.logout')}}"><i class="fas fa-sign-out-alt mr-1"></i>
					Выйти
					</a>
				</li>

			</ul>
		</div>
		@endif
	</nav>
</div>
