@extends('layouts.main')

@section('content')
<!-- carousel screen -->
<div class="page-screen active-screen opened carousel-screen">
    <div class="carousel country-carousel">
        @foreach($directions as $url=>$direction)
        <div class="carousel-slide">
            <div class="carousel-image" style="background-image: url(..{{$direction['image']}})">
                <div class="wraper">
                    <a href="/direction/{{$url}}" class="carousel-slide-text">{!! $direction['description'] !!}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- end carousel screen -->

<!-- popular countries screen -->
<div class="page-screen auto-height directions-screen">
    <div class="animated-block slide-from-bottom white-bg top-padding">
        <div class="wraper">
            <p class="page-screen-heading">MAISON W.<br>Directions</p>

            <p class="page-block-description text-left font-normal mt-5">We create individual investment plans for each client and provide answers to all questions related to real estate investing, to make it safe and profitable.</p>
            <p class="page-block-description text-left font-normal mt-5">We are always happy to help you choose the right property that meets our client's long-term needs, as well as a profitable investment plan.</p>

            <div class="invest-block row mt-5">
                <div class="col-6">
                    <div class="invest-item opened">
                        <p class="invest-name">UAE <span class="invest-city">(Dubai)</span></p>
                        <div class="invest-description">Real estate in Dubai is one of the best assets for investment. The growth in property prices is at least 10-15% per year, guaranteeing high profits for your investments.</div>
                        <a href="/direction/dubai" class="custom-link details-btn mt-3" data-banner="#investBanner1">Details <img src="/images/ic_arrow_right_white.svg"></a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="invest-item opened">
                        <p class="invest-name">USA <span class="invest-city">(Miami)</span></p>
                        <div class="invest-description">In Miami, dreams of stable and profitable investments come true with an annual rental occupancy rate of over 85% and a growing demand for short-term rentals.</div>
                        <a href="/direction/miami" class="custom-link details-btn mt-3" data-banner="#investBanner2">Details <img src="/images/ic_arrow_right_white.svg"></a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="invest-item opened">
                        <p class="invest-name">Indonesia<br><span class="invest-city">(Bali)</span></p>
                        <div class="invest-description">On Bali, you will find high returns on real estate investments, thanks to the 300% increase in land value over the last 5 years.</div>
                        <a href="/direction/bali" class="custom-link details-btn mt-3" data-banner="#investBanner3">Details <img src="/images/ic_arrow_right_white.svg"></a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="invest-item opened">
                        <p class="invest-name">Mexico<br><span class="invest-city">(Riviera Maya)</span></p>
                        <div class="invest-description">The ROI ranges from 8% to 12%, and the payback period is 6-7 years.</div>
                        <a href="/direction/mexico" class="custom-link details-btn mt-3" data-banner="#investBanner4">Details <img src="/images/ic_arrow_right_white.svg"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end popular countries screen -->

<!-- footer -->
@include('includes.mobile.footer')
<!-- end footer -->

<script>
    $('.carousel').slick({
        dots: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        adaptiveHeight: true,
        speed: 500,
        fade: true,
        autoplay: true,
        prevArrow: '<button id="prev" type="button" class="btn btn-prev carousel-arrow"><img src="/images/ic_arrow_right_white.svg" /></button>',
        nextArrow: '<button id="next" type="button" class="btn btn-next carousel-arrow"><img src="/images/ic_arrow_right_white.svg" /></button>'
    });
</script>
@endsection
