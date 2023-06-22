@extends('layouts.main')

@section('content')
<!-- properties screen -->
<div class="page-screen auto-height active-screen opened properties-screen" id="propertiesScreen">
    <div class="wraper animated-block slide-from-bottom pt-5 white-bg top-padding">
        <p class="page-screen-heading">Properties</p>
        <div class="properties-locations text-center">
            <button class="custom-btn property-location-btn @if($location == 'all')active @endif" data-location="all">All</button>
            <button class="custom-btn property-location-btn @if($location == 'dubai')active @endif" data-location="dubai">Dubai</button>
            <button class="custom-btn property-location-btn @if($location == 'miami')active @endif" data-location="miami">Miami</button>
            <button class="custom-btn property-location-btn @if($location == 'bali')active @endif" data-location="bali">Bali</button>
            <button class="custom-btn property-location-btn @if($location == 'mexico')active @endif" data-location="mexico">Mexico</button>
        </div>
        <div class="properties-list row">
            @include('includes.desktop.properties_list')
        </div>

        <div class="text-center p-4">
            <button class="custom-link scroll-to-btn" data-scroll-to="#propertiesScreen">Back to Top <img src="/images/ic_arrow_right_white.svg"></button>
        </div>
    </div>
</div>
<!-- end properties screen -->

<!-- invest screen -->
@include('includes.desktop.invest_screen')
<!-- end invest screen -->

<!-- footer -->
@include('includes.desktop.footer')
<!-- end footer -->

<script>
    setTimeout(function(){
        $('#personalConsultPopup').fadeIn();
    }, 10000);
</script>

@endsection
