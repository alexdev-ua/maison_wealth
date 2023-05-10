@extends('layouts.main')

@section('content')
<!-- carousel screen -->
<div class="page-screen carousel-screen">
    <div class="carousel">
        <div class="carousel-slide">
            <div class="carousel-image" style="background-image: url(../images/projects/im_edge.jpg)">
                <div class="wraper">
                    <p class="carousel-slide-text">Welcome to <u>DUBAI</u></p>
                </div>
            </div>
        </div>
        <div class="carousel-slide">
            <div class="carousel-image" style="background-image: url(../images/projects/im_district_11.jpg)">
                <div class="wraper">
                    <p class="carousel-slide-text">Welcome to <u>DUBAI</u></p>
                </div>
            </div>
        </div>
        <div class="carousel-slide">
            <div class="carousel-image" style="background-image: url(../images/projects/im_sea_heaven.jpg)">
                <div class="wraper">
                    <p class="carousel-slide-text">Welcome to <u>DUBAI</u></p>
                </div>
            </div>
        </div>
        <div class="carousel-slide">
            <div class="carousel-image" style="background-image: url(../images/projects/im_damac_bay.jpg)">
                <div class="wraper">
                    <p class="carousel-slide-text">Welcome to <u>DUBAI</u></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end carousel screen -->

<!-- popular countries screen -->
<div class="page-screen auto-height directions-screen pt-5">
    <div class="wraper">
        <p class="page-screen-heading">MAISON W.<br>Directions</p>

        <p class="page-block-description text-left font-normal mt-5">We create individual investment plans for each client and provide answers to all questions related to real estate investing, to make it safe and profitable.</p>
        <p class="page-block-description text-left font-normal mt-5">We are always happy to help you choose the right property that meets our client's long-term needs, as well as a profitable investment plan.</p>

        <div class="invest-block row mt-5">
            <div class="col-6">
                <div class="invest-item">
                    <p class="invest-name">UAE <span class="invest-city">(Dubai)</span></p>
                    <div class="invest-description">A leading world-class residential destination...</div>
                    <button class="custom-link details-btn mt-3">Details <img src="/images/ic_arrow_right_white.svg"></button>
                </div>
            </div>
            <div class="col-6">
                <div class="invest-item">
                    <p class="invest-name">USA <span class="invest-city">(Miami)</span></p>
                    <div class="invest-description">A leading world-class residential destination...</div>
                    <button class="custom-link details-btn mt-3">Details <img src="/images/ic_arrow_right_white.svg"></button>
                </div>
            </div>
            <div class="col-6">
                <div class="invest-item">
                    <p class="invest-name">Indonesia<br><span class="invest-city">(Bali)</span></p>
                    <div class="invest-description">A leading world-class residential destination...</div>
                    <button class="custom-link details-btn mt-3">Details <img src="/images/ic_arrow_right_white.svg"></button>
                </div>
            </div>
            <div class="col-6">
                <div class="invest-item">
                    <p class="invest-name">Mexico<br><span class="invest-city">(Riviera Maya)</span></p>
                    <div class="invest-description">A leading world-class residential destination...</div>
                    <button class="custom-link details-btn mt-3">Details <img src="/images/ic_arrow_right_white.svg"></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end popular countries screen -->

<script>
    $('.carousel').slick({
        dots: false,
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        adaptiveHeight: true,
        speed: 1500,
        prevArrow: '<button id="prev" type="button" class="btn btn-prev carousel-arrow"><img src="/images/ic_arrow_right_white.svg" /></button>',
        nextArrow: '<button id="next" type="button" class="btn btn-next carousel-arrow"><img src="/images/ic_arrow_right_white.svg" /></button>'
    });
</script>
@endsection
