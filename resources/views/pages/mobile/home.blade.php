@extends('layouts.main')

@section('content')

<div class="home-page">
    <div class="one-screen main-screen p-0">

        <div class="screen-info-block">
            <div class="block-title text-center"><span class="info-line"></span> Our projects</div>
            <div class="info-container">
                <span class="link-divider"></span>
                <a href="/projects/sunny_village" class="link-item">SUNNY VILLAGE</a>
                <span class="link-divider"></span>
                <a href="/projects/sunny_apartments" class="link-item">SUNNY APARTMENTS</a>
                <span class="link-divider"></span>
            </div>
        </div>

        <div class="social-links">
            <a href="" class="social-link"><img src="/images/ic_fb.svg" /></a>
            <a href="" class="social-link"><img src="/images/ic_insta.svg" /></a>
        </div>

    </div>

    <div class="one-screen black-screen pt-5" style="min-height:50vh;padding-bottom:50px;height:auto;">
        <div class="screen-content">
            <p class="screen-title">About company</p>
            <p class="screen-text">Maison Wealth modern company with experienced specialists. Our main specialization is real estate construction in Indonesia. We build only on ocean frontline and most popular touristic places...</p>
        </div>
    </div>

    <div class="one-screen about-screen black-screen p-0" style="height:auto;">
        <div class="photos-list photos-slider slider mb-0">
            <div class="item photo">
                <img src="/images/home_slider/slide_1.jpg">
            </div>
            <div class="item photo">
                <img src="/images/home_slider/slide_2.jpg">
            </div>
            <div class="item photo">
                <img src="/images/home_slider/slide_3.jpg">
            </div>
            <div class="item photo">
                <img src="/images/home_slider/slide_4.jpg">
            </div>
            <div class="item photo">
                <img src="/images/home_slider/slide_5.jpg">
            </div>
        </div>

        <img src="/images/team/SekarWarni.png" style="width:100%;"/>

        <div class="screen-content pt-5 pb-5" style="padding: 0 30px;">
            <p class="screen-title" style="font-size:24px;">Architecture by Sekar Warni</p>
            <p class="screen-text">Inspired by London`s architecture, Singapoure and Dubai, indonesian architect Sekar Warni and doing something amazing...</p>
        </div>
    </div>

    <div class="one-screen links-screen">
        <span class="link-divider"></span>
        <a href="{{route('team')}}" class="link-item">Team</a>
        <span class="link-divider"></span>
        <a href="{{route('projects')}}" class="link-item">Projects</a>
        <span class="link-divider"></span>
        <a href="{{route('gallery')}}" class="link-item">Gallery</a>
        <span class="link-divider"></span>
    </div>

</div>

<script>
    $('.photos-slider').slick({
        dots: true,
        infinite: true,
        fade: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3000
    });
</script>
@endsection
