@extends('layouts.main')

@section('content')
<!-- properties screen -->
<div class="page-screen auto-height active-screen opened properties-screen" id="propertiesScreen">
    <div class="animated-block slide-from-bottom white-bg top-padding">
        <div class="wraper">
            <p class="page-screen-heading">Properties</p>
            @if(isset($investPrice))
            <div class="price-block">
                <p class="page-screen-description">Up to ${{$investPrice}} <button class="main-btn black-btn inverted-btn reset-price-filter-btn">See All</button></p>
            </div>
            @endif
            <div class="properties-locations text-center">
                <button class="custom-btn property-location-btn @if($location == 'all')active @endif" data-location="all">All</button>
                <button class="custom-btn property-location-btn @if($location == 'dubai')active @endif" data-location="dubai">Dubai</button>
                <button class="custom-btn property-location-btn @if($location == 'miami')active @endif" data-location="miami">Miami</button>
                <button class="custom-btn property-location-btn @if($location == 'bali')active @endif" data-location="bali">Bali</button>
                <button class="custom-btn property-location-btn @if($location == 'mexico')active @endif" data-location="mexico">Mexico</button>
            </div>
        </div>
        <div class="properties-list row m-0 mt-3">
            @include('includes.mobile.properties_list')
        </div>

        <div class="text-center p-5">
            <button class="custom-link scroll-to-btn" data-scroll-to="#propertiesScreen">Back to Top <img src="/images/ic_arrow_right_white.svg"></button>
        </div>
    </div>

</div>
<!-- end properties screen -->

<!-- invest screen -->
@include('includes.mobile.invest_screen')
<!-- end invest screen -->

<!-- footer -->
@include('includes.mobile.footer')
<!-- end footer -->

<script>
    setTimeout(function(){
        popUp('#personalConsultPopup')
    }, 10000);
</script>

@endsection
