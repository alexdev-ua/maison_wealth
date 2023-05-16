@extends('layouts.main')

@section('content')
<!-- top screen -->
<div class="page-screen active-screen property-screen">
    <img src="/images/projects/{{$property['image']}}" class="page-screen-bg-image" />
    <div class="wraper">
        <div class="fixed-block right-block">
            <p class="fixed-block-title">{{$property['title']}}</p>
        </div>
        <a href="" class="main-btn black-btn inverted-btn border-0">Start to Invest <span class="btn-icon"></span></a>
    </div>
</div>
<!-- end top screen -->

<!-- pluses screen -->
<div class="page-screen auto-height white-bg pluses-screen">
    <div class="wraper">
        <div class="row">
            <div class="col-6 offset-6">
                <p class="page-screen-heading mt-5 mb-5">We offer properties on the Mexican Caribbean coast from Cancun to Tulum. Today, Puerto Aventuras is experiencing an investment boom, and practically no properties are left for purchase.</p>
                <div class="pluses-list row mt-2">
                    <div class="col-6">
                        <div class="plus-item">
                            <div class="plus-item-heading">Top location</div>
                            <div class="plus-item-description">Puerto Aventuras is a small resort town on the coast of the Caribbean Sea with a perfect location.</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="plus-item">
                            <div class="plus-item-heading">Reselling</div>
                            <div class="plus-item-description">The real estate market on the Mexican Riviera provides high investment returns, with starting prices at just $200,000 and average prices at $500,000. </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="plus-item">
                            <div class="plus-item-heading">High return</div>
                            <div class="plus-item-description">The shortage of land in this village will lead to the cost of land steadily increasing. Analysts promise a return on investments from 10% to 15%.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end pluses screen -->

<!-- features screen -->
<div class="page-screen features-screen">
    <div class="row">
        <div class="col-6 pr-0">
            <div class="content-wraper red-bg page-block-content">
                <p class="page-screen-heading text-left mb-2">NÁLU Luxury Beachfront Residences consists of 12 exclusive luxury apartments, making it the most attractive development in Puerto Morelos.</p>

                <p class="page-block-description font-normal light-weight mt-4 mb-2 text-left">At NÁLU Luxury Beachfront Residences, you will live sweet and mystical experiences through proximity to the sea. You will create unparalleled stories by being surrounded by the majestic mangrove swamp, its magical cenotes, and the imposing beauty of its coral reefs.</p>
            </div>
        </div>
        <div class="col-6 pl-0">
            <div class="carousel features-carousel">
                <div class="carousel-slide feature-slide">
                    <div class="content-wraper page-block-content white-bg">
                        <div>
                            <img src="/images/im_features_photo_1.jpg" class="page-screen-bg-image" />
                        </div>
                        <div class="pt-2">
                            <p class="page-screen-heading text-left mb-2 mt-1">Fall in love with Puerto Morelos’ magic and unique lifestyle</p>
                            <u class="page-block-description text-left font-normal mt-1">18 months interest free</u>
                        </div>
                    </div>
                </div>
                <div class="carousel-slide feature-slide">
                    <div class="page-block-content p-0">
                        <img src="/images/im_features_photo_2.jpg" class="page-screen-bg-image" />
                    </div>
                </div>
                <div class="carousel-slide feature-slide">
                    <div class="content-wraper gray-bg page-block-content">
                        <div class="page-block-content top-content pl-0">
                            <p class="page-block-description text-left font-normal">About Location</p>
                        </div>
                        <div>
                            <p class="page-screen-heading text-left mb-2 mt-1">The land area is 7000 sq.m.</p>
                            <p class="page-block-description text-left font-normal">Puerto Morelos is the Mayan Riviera’s hidden. Its beautiful and paradisiacal beaches, with a wonderful blue sea, create an enigmatic and mystical atmosphere that evokes profound peace and tranquility.</p>
                            <p class="page-block-description text-left font-normal">The dreamlike sunrises and sunsets in Puerto Morelos generate an energy that reminds us of our connection to life, making it the ideal place to find yourself again.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-slide feature-slide">
                    <div class="page-block-content p-0">
                        <img src="/images/im_features_photo_3.jpg" class="page-screen-bg-image" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end features screen -->

<!-- personal consulatation screen -->
<div class="page-screen auto-height gray-bg personal-consultation-screen">
    <div class="row">
        <div class="col-6">
            <div class="page-block-content gray-bg">
                <p class="page-screen-heading mb-2"><span class="gray-text">Start investing</span> correctly, without unnecessary risks and with the greatest benefit, <span class="gray-text">think it over and we will be there for you.</span></p>
            </div>
        </div>
        <div class="col-6 pl-0">
            <div class="form-container">
                <div class="form-heading black-heading">Get a personal expert<br>consultation</div>
                <div class="form-content">
                    <form class="custom-form">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <span class="custom-label">First Name</span>
                                    <input type="text" name="firstName" class="custom-input" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <span class="custom-label">Last Name</span>
                                    <input type="text" name="lastName" class="custom-input" />
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="form-group">
                                    <span class="custom-label">Phone Number</span>
                                    <input type="text" name="phone" class="custom-input" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="checkbox" name="haveWhatsapp" class="custom-input mr-2" /><span class="custom-label">I have a WhatsApp account registered to this phone number</span>
                                </div>
                            </div>
                            <div class="col-3 mt-4 pt-2">
                                <button class="main-btn black-btn inverted-btn">Send <span class="btn-icon"></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end personal consultation screen -->

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
