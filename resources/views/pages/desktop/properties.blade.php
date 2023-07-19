@extends('layouts.main')

@section('content')
<!-- properties screen -->
<div class="page-screen auto-height active-screen opened properties-screen" id="propertiesScreen">
    <div class="wraper animated-block slide-from-bottom pt-5 white-bg top-padding">
        <p class="page-screen-heading">Properties</p>
        @if(isset($investPrice))
        <div class="price-block">
            <p class="page-screen-description">Up to ${{$investPrice}} <button class="main-btn black-btn inverted-btn reset-price-filter-btn">See All</button></p>
        </div>
        @endif
        <div class="properties-locations text-center">
            <button class="custom-btn property-location-btn @if($location == 'all')active @endif" data-location="all">All</button>
            @foreach($directions as $direction)
            <button class="custom-btn property-location-btn @if($location == $direction->url)active @endif" data-location="{{$direction->url}}">{{ucfirst($direction->url)}}</button>
            @endforeach
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

@if(!count($properties))
    @include('includes.desktop.not_found_consult_popup')
    <script>
        setTimeout(function(){
            popUp('#notFoundConsultPopup')
        }, 1000);
    </script>
@else
    <script>
        window.consultPopUpShowed = false;
        $(document).ready(function(){
            $('#propertiesScreen').scroll(function(e){
                var scrollTop = $(this).scrollTop();

                if(!window.consultPopUpShowed){
                    if(scrollTop + window.innerHeight >= $(this).prop('scrollHeight')){
                        popUp('#personalConsultPopup')
                        window.consultPopUpShowed = true;
                    };
                }
            });
        });
    </script>
@endif

@endsection
