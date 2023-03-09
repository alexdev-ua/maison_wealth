@extends('layouts.main')

@section('content')
<div class="pt-5" style="background: #2e2e2e;">
    <p class="text-center mt-5 page-heading"><b>Sunny village</b></p>

    <div class="projects-container pb-5">
        <div class="project project-view">
            <div class="photos-list photos-slider slider">
                <div class="item photo">
                    <img src="/images/projects/sunny_village/sunny_village_1.jpg">
                </div>
                <div class="item photo">
                    <img src="/images/projects/sunny_village/sunny_village_2.jpg">
                </div>
                <div class="item photo">
                    <img src="/images/projects/sunny_village/sunny_village_3.jpg">
                </div>
                <div class="item photo">
                    <img src="/images/projects/sunny_village/sunny_village_4.jpg">
                </div>
                <div class="item photo">
                    <img src="/images/projects/sunny_village/sunny_village_5.jpg">
                </div>
                <div class="item photo">
                    <img src="/images/projects/sunny_village/sunny_village_6.jpg">
                </div>
            </div>

            <img src="/images/projects/sunny_village/sunny_village_map.jpg">
            <img src="/images/projects/sunny_village/sunny_village_plan.jpg" class="mt-3">

            <div class="page-text p-3" style="color:#fff;">
                <p class="text-center">VILLA SPECIFICATIONS</p>
                <ul>
                    <li>Villa area: 206 m<sup>2</sup></li>
                    <li>Price increase after the construction is complete: 30% or more</li>
                    <li>Pool area: 32 m<sup>2</sup></li>
                    <li>Return on investment: 6 years</li>
                    <li>Ceilings: 3m</li>
                    <li>Bedrooms: 3</li>
                    <li>Bathrooms: 4</li>
                    <li>Repairs: Done</li>
                    <li>On the roof: Garden, yoga area, chill zone with bonfire</li>
                    <li>Italian furniture: Available</li>
                    <li>Appliances: Available</li>
                    <li>Cabinet: Available</li>
                    <li>Territory: Closed and guarded</li>
                </ul>
            </div>

            <div class="photos-list photos-slider slider">
                <div class="item photo">
                    <img src="/images/projects/sunny_village/sunny_village_villa_ground_floor.jpg" style="height:auto;">
                </div>
                <div class="item photo">
                    <img src="/images/projects/sunny_village/sunny_village_villa_first_floor.jpg" style="height:auto;">
                </div>
                <div class="item photo">
                    <img src="/images/projects/sunny_village/sunny_village_villa_second_floor.jpg" style="height:auto;">
                </div>
            </div>

        </div>
        <a class="text-center d-block mb-3" style="text-decoration: underline;color: #1bc0db;" href="/downloads/sunny_village_presentation.pdf" download><i class="far fa-file-pdf"></i> Download presentation</a>

    </div>
</div>

<script>
    $('.photos-slider').slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 2000,
        prevArrow: '<button id="prev" type="button" class="btn btn-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
        nextArrow: '<button id="next" type="button" class="btn btn-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>'
    });
</script>
@endsection
