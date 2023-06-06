@extends('layouts.main')

@section('content')
<!-- popular countries screen -->
<div class="page-screen auto-height invest-screen">
    <div class="banners-block">
        <img src="/images/im_invest_dubai_banner.jpg" class="banner-image @if($location == 'dubai' || $location == 'all')active-banner @endif" id="investBanner1" />
        <img src="/images/projects/im_cipriani.jpg" class="banner-image @if($location == 'miami')active-banner @endif" id="investBanner2" />
        <img src="/images/projects/im_batu_bolong.jpg" class="banner-image @if($location == 'bali')active-banner @endif" id="investBanner3" />
        <img src="/images/projects/im_ceiba_paradise.jpg" class="banner-image @if($location == 'mexico')active-banner @endif" id="investBanner4" />
    </div>

    <div class="wraper">
        <div class="invest-block row mt-4">
            <div class="col-6">
                <div class="invest-item @if($location == 'dubai')opened @endif">
                    <p class="invest-name">Dubai</p>
                    <div class="invest-description">Real estate in Dubai is one of the best assets for investment. The growth in property prices is at least 10-15% per year, guaranteeing high profits for your investments.</div>
                    <a href="/properties/dubai" class="custom-link details-btn mt-3" data-banner="#investBanner1">Details <img src="/images/ic_arrow_right_white.svg"></a>
                </div>
            </div>
            <div class="col-6">
                <div class="invest-item @if($location == 'miami')opened @endif">
                    <p class="invest-name">Miami</p>
                    <div class="invest-description">Miami is the place where dreams of stable and profitable investments come true. With an annual rental occupancy rate of over 85% and a growing demand for short-term rentals.</div>
                    <a href="/properties/miami" class="custom-link details-btn mt-3" data-banner="#investBanner2">Details <img src="/images/ic_arrow_right_white.svg"></a>
                </div>
            </div>
            <div class="col-6">
                <div class="invest-item @if($location == 'bali')opened @endif">
                    <p class="invest-name">Bali</p>
                    <div class="invest-description">On Bali, you will find high returns on real estate investments, thanks to the 300% increase in land value over the last 5 years.</div>
                    <a href="/properties/bali" class="custom-link details-btn mt-3" data-banner="#investBanner3">Details <img src="/images/ic_arrow_right_white.svg"></a>
                </div>
            </div>
            <div class="col-6">
                <div class="invest-item @if($location == 'mexico')opened @endif">
                    <p class="invest-name">Riviera Maya</p>
                    <div class="invest-description">The ROI ranges from 8% to 12%, and the payback period is 6-7 years.</div>
                    <a href="/properties/mexico" class="custom-link details-btn mt-3" data-banner="#investBanner4">Details <img src="/images/ic_arrow_right_white.svg"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end popular countries screen -->

<!-- properties screen -->
<div class="page-screen auto-height properties-screen pt-5">
    <div class="wraper">
        <p class="page-screen-heading">Properties</p>
        <div class="properties-locations text-center">
            <button class="custom-btn property-location-btn @if($location == 'all')active @endif" data-location="all">All</button>
            <button class="custom-btn property-location-btn @if($location == 'dubai')active @endif" data-location="dubai">Dubai</button>
            <button class="custom-btn property-location-btn @if($location == 'miami')active @endif" data-location="miami">Miami</button>
            <button class="custom-btn property-location-btn @if($location == 'bali')active @endif" data-location="bali">Bali</button>
            <button class="custom-btn property-location-btn @if($location == 'mexico')active @endif" data-location="mexico">Mexico</button>
        </div>
    </div>
    <div class="properties-list row mt-3">
        @include('includes.mobile.properties_list')
    </div>

    <div class="text-center p-5">
        <button class="custom-link back-to-top-btn">Back to Top <img src="/images/ic_arrow_right_white.svg"></button>
    </div>

</div>
<!-- end properties screen -->

<!-- invest screen -->
@include('includes.mobile.invest_screen')
<!-- end invest screen -->

<script>
    setTimeout(function(){
        $('#personalConsultPopup').fadeIn();
    }, 10000);
</script>

@endsection
