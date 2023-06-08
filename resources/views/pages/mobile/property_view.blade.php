@extends('layouts.main')

@section('content')
<!-- top screen -->
<div class="page-screen active-screen opened property-screen">
    <img src="/images/projects/{{$property['image']}}" class="page-screen-bg-image" />
    <div class="wraper">
        <div class="fixed-block left-block">
            <p class="fixed-block-title white-text">{{$property['title']}}</p>
        </div>
        <a href="" class="main-btn black-btn inverted-btn border-0">Start to Invest <span class="btn-icon"></span></a>
    </div>
</div>
<!-- end top screen -->

<!-- pluses screen -->
<div class="page-screen auto-height pluses-screen">
    <div class="animated-block slide-from-bottom white-bg top-padding pb-4">
        <div class="wraper">
            <p class="page-screen-heading">We offer properties on the Mexican Caribbean coast from Cancun to Tulum. Today, Puerto Aventuras is experiencing an investment boom, and practically no properties are left for purchase.</p>
            <div class="pluses-list mt-5">
                <div class="plus-item">
                    <div class="plus-item-heading">Top location</div>
                    <div class="plus-item-description">Puerto Aventuras is a small resort town on the coast of the Caribbean Sea with a perfect location.</div>
                </div>
                <div class="plus-item">
                    <div class="plus-item-heading">Reselling</div>
                    <div class="plus-item-description">The real estate market on the Mexican Riviera provides high investment returns, with starting prices at just $200,000 and average prices at $500,000. </div>
                </div>
                <div class="plus-item">
                    <div class="plus-item-heading">High return</div>
                    <div class="plus-item-description">The shortage of land in this village will lead to the cost of land steadily increasing. Analysts promise a return on investments from 10% to 15%.</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end pluses screen -->

<!-- features screen -->
<div class="page-screen auto-height features-screen">
    <div class="animated-block slide-from-bottom red-bg pb-4">
        <div class="wraper">
            <p class="page-screen-heading white-text top-padding text-left">NÁLU Luxury Beachfront Residences consists of 12 exclusive luxury apartments, making it the most attractive development in Puerto Morelos.</p>

            <p class="page-block-description font-normal light-weight mt-4 mb-2 text-left">At NÁLU Luxury Beachfront Residences, you will live sweet and mystical experiences through proximity to the sea. You will create unparalleled stories by being surrounded by the majestic mangrove swamp, its magical cenotes, and the imposing beauty of its coral reefs.</p>
        </div>
    </div>
</div>

<div class="page-screen auto-height features-screen">
    <div class="animated-block slide-from-bottom white-bg feature-slide">
        <div class="page-block-content p-0">
            <div>
                <img src="/images/im_features_photo_1.jpg" class="page-screen-bg-image" style="height: 60vh;" />
            </div>
            <div class="wraper pt-2">
                <p class="page-screen-heading text-left mb-2 mt-1">Fall in love with Puerto Morelos’ magic and unique lifestyle</p>
                <u class="page-block-description text-left font-normal mt-1">18 months interest free</u>
            </div>
        </div>
    </div>
</div>

<div class="page-screen auto-height features-screen">
    <div class="animated-block slide-from-bottom white-bg feature-slide">
        <div class="page-block-content p-0">
            <img src="/images/im_features_photo_2.jpg" class="page-screen-bg-image" />
        </div>
    </div>
</div>

<div class="page-screen auto-height features-screen">
    <div class="animated-block slide-from-bottom gray-bg feature-slide pb-4">
        <div class="wraper page-block-content">
            <div class="page-block-content top-content pl-0">
                <p class="page-block-description text-left font-normal top-padding">About Location</p>
            </div>
            <div>
                <p class="page-screen-heading text-left mb-2 mt-1">The land area is 7000 sq.m.</p>
                <p class="page-block-description text-left font-normal">Puerto Morelos is the Mayan Riviera’s hidden. Its beautiful and paradisiacal beaches, with a wonderful blue sea, create an enigmatic and mystical atmosphere that evokes profound peace and tranquility.</p>
                <p class="page-block-description text-left font-normal">The dreamlike sunrises and sunsets in Puerto Morelos generate an energy that reminds us of our connection to life, making it the ideal place to find yourself again.</p>
            </div>
        </div>
    </div>
</div>

<div class="page-screen auto-height features-screen">
    <div class="animated-block slide-from-bottom white-bg feature-slide">
        <div class="page-block-content p-0">
            <img src="/images/im_features_photo_3.jpg" class="page-screen-bg-image" />
        </div>
    </div>
</div>
<!-- end features screen -->

<!-- personal consulatation screen -->
<div class="page-screen auto-height personal-consultation-screen">
    <div class="animated-block slide-from-bottom gray-bg top-padding pb-4">
        <div class="wraper">
            <p class="page-screen-heading"><span class="gray-text">Start investing</span> correctly, without unnecessary risks and with the greatest benefit, <span class="gray-text">think it over and we will be there for you.</span></p>
        </div>

        <div class="form-container">
            <div class="form-heading black-heading pl-4 pr-4 pt-5 pb-5">Get a personal expert<br>consultation</div>
            <div class="form-content pl-4 pr-4 pt-3 pb-5">
                <form class="custom-form">
                    <div class="form-group mt-4">
                        <span class="custom-label">First Name</span>
                        <input type="text" name="firstName" class="custom-input" />
                    </div>
                    <div class="form-group mt-4">
                        <span class="custom-label">Last Name</span>
                        <input type="text" name="lastName" class="custom-input" />
                    </div>
                    <div class="form-group mt-4">
                        <span class="custom-label">Phone Number</span>
                        <input type="text" name="phone" class="custom-input" />
                    </div>
                    <div class="form-group mt-4">
                        <input type="checkbox" name="haveWhatsapp" class="custom-input mr-2" /><span class="custom-label">I have a WhatsApp account registered to this phone number</span>
                    </div>

                    <div class="mt-5 pt-4 text-center">
                        <button class="main-btn black-btn inverted-btn">Send <span class="btn-icon"></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- end personal consultation screen -->

<!-- footer -->
@include('includes.mobile.footer')
<!-- end footer -->

<script>
    $('.features-carousel').slick({
        dots: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 3000,
        fade: true,
        speed: 1500
    });
</script>

@endsection
