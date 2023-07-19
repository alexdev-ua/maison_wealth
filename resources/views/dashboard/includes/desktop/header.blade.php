<header>
	<div class="logo-container">
		<a class="logo-title" href="{{route('dashboard')}}">
			<img src="/images/ic_logo_red.svg" class="logo-image" />
			<span class="brand-label">MW</span> Control panel
		</a>
	</div>
	@if(Auth::guard('admin')->check())
	<div class="user-block">
		<span class="user-name profile-sidebar-btn">{{Auth::guard('admin')->user()->name}}</span>
		<a href="/dashboard/logout" class="dash-btn orange-btn dash-logout-btn"><i class="fas fa-power-off"></i></a>
		<span class="user-avatar profile-sidebar-btn @if(!Auth::guard('admin')->user()->avatar)empty-photo @endif">
			<img src="{{Auth::guard('admin')->user()->avatar()}}" />
		</span>
	</div>
	@endif
</header>
