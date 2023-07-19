@extends('layouts.main')

@section('content')

@if($directions->count())
    <!-- carousel screen -->
    <div class="page-screen active-screen opened carousel-screen">
        <div class="carousel">
            @foreach($directions as $direction)
            <div class="carousel-slide">
                <div class="carousel-image" style="background-image: url({{$direction->previewImage()}})">
                    <div class="wraper">
                        <a href="/direction/{{$direction->url}}" class="carousel-slide-text">Welcome to <u>{!! $direction->translate($activeLang)->title !!}</u></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- end carousel screen -->
@endif

<!-- popular countries screen -->
<div class="page-screen invest-screen white-bg">
    <div class="wraper top-padding">
        <div class="row">
            <div class="col-6 animated-block slide-from-top">
                <p class="page-screen-heading">MAISON W.<br>Directions</p>
                <p class="page-block-description text-left font-normal">We create individual investment plans for each client and provide answers to all questions related to real estate investing, to make it safe and profitable.</p>
                <p class="page-block-description text-left font-normal">We are always happy to help you choose the right property that meets our client's long-term needs, as well as a profitable investment plan.</p>
            </div>
            <div class="col-6 animated-block slide-from-bottom">
                <div class="invest-block row">
                    @if($directions->count())
                        @foreach($directions as $direction)
                            <div class="col-6">
                                <div class="invest-item opened">
                                    <p class="invest-name">{{$direction->country($activeLang)}} <span class="invest-city">({{$direction->translate($activeLang)->title}})</span></p>
                                    <div class="invest-description">{{$direction->translate($activeLang)->description}}</div>
                                    <a href="/direction/{{$direction->url}}" class="custom-link details-btn mt-3" data-banner="#investBanner1">Details <img src="/images/ic_arrow_right_white.svg"></a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end popular countries screen -->

<!-- footer -->
@include('includes.desktop.footer')
<!-- end footer -->

@if($directions->count())
    <script>
        $('.carousel').slick({
            dots: false,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            adaptiveHeight: true,
            speed: 800,
            fade: true,
            autoplay: true,
            pauseOnHover: false,
            prevArrow: '<button id="prev" type="button" class="btn btn-prev carousel-arrow"><img src="/images/ic_arrow_right_white.svg" /></button>',
            nextArrow: '<button id="next" type="button" class="btn btn-next carousel-arrow"><img src="/images/ic_arrow_right_white.svg" /></button>'
        });
    </script>
@endif

@endsection
