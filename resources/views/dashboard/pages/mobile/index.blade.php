@extends('dashboard.layouts.main')

@section('content')
<div class="row m-0 p-3" style="height: 100%; overflow: auto;">
	<p class="main-title text-center mt-4 mb-5"><b><i class="fas fa-columns mr-2"></i>Welcome to Sunny DVG Control Panel!</b></p>

	<div id="accordion" class="main-links-block row m-0">

		<div class="card col-12 p-0">
			<div class="card-header">
				<h5 class="mb-0">
					<button class="btn btn-link">Contact forms</button>
				</h5>
			</div>
			<div class="card-body">
				<a class="btn btn-primary link-btn" href="{{route('dashboard.orders')}}">Contact forms</a>
			</div>
		</div>


	</div>
</div>
@stop
