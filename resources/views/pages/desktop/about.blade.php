@extends('layouts.main')

@section('content')
<!-- top screen -->
<div class="page-screen active-screen opened">
    <div class="row">
        <div class="col-6 text-center">
            <div class="content-wraper page-block-content">
                <p class="page-screen-heading mb-0">Meet our Company</p>
                <p class="page-screen-heading with-border">Maison Wealth</p>

                <p class="page-block-description font-normal light-weight mt-3 mb-2">An international investment company that provides individual solutions for profitable real estate investing.</p>
                <p class="page-block-description font-normal light-weight mt-1">We are always happy to help you choose the right property that meets our client's long-term needs, as well as a profitable investment plan.</p>

                <button class="main-btn black-btn inverted-btn d-inline-block mt-5 scroll-to-btn" data-scroll-to="#getInTouchScreen">Start to invest <span class="btn-icon"></span></button>
            </div>
        </div>
        <div class="col-6 pl-0">
            <img src="/images/im_main_top_bg.jpg" class="page-screen-bg-image" />
        </div>
    </div>
</div>
<!-- end top screen -->

<!-- our focus screen -->
<div class="page-screen focus-screen">
    <div class="wraper animated-block slide-from-bottom gray-bg top-padding">
        <p class="focus-heading mb-0">Our focus is on stable and secure directions with clear legislation and high profitability. We will accompany the purchase and resale of your property at the right time.</p>
        <div class="row">
            <div class="col-10 offset-2 pl-0">
                <div class="stats-block float-right">
                    <div class="stat-item">
                        <p class="stat-counter">12</p>
                        Worldwide projects
                    </div>
                    <div class="stat-item">
                        <p class="stat-counter">20</p>
                        Team members
                    </div>
                    <div class="stat-item">
                        <p class="stat-counter">10 000 000+</p>
                        Square foots
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end our focus screen -->

<!-- more options to invest screen -->
<div class="page-screen invest-options-screen">
    <div class="row">
        <div class="col-6 animated-block slide-from-top white-bg pr-0">
            <div class="content-wraper page-block-content">
                <p class="page-screen-heading text-left mb-2"><span class="red-text">More and better</span><br>options to invest</p>

                <p class="page-block-description font-normal light-weight mt-4 mb-2 text-left">We create individual investment plans for each client and provide answers to all questions related to real estate investing, to make it safe and profitable.</p>

                <ul class="custom-list">
                    <li><img src="/images/ic_arrow_right.svg" class="list-icon" /> Organize full post-sale service</li>
                    <li><img src="/images/ic_arrow_right.svg" class="list-icon" /> Identify ideal investment opportunities and select the most profitable properties</li>
                    <li><img src="/images/ic_arrow_right.svg" class="list-icon" /> Legal support of the transaction</li>
                    <li><img src="/images/ic_arrow_right.svg" class="list-icon" /> Faster and seamless invest reservation</li>
                    <li><img src="/images/ic_arrow_right.svg" class="list-icon" /> Help you to choose the right property as a profitable investment plan</li>
                </ul>
            </div>
        </div>
        <div class="col-6 pl-0 animated-block slide-from-bottom">
            <img src="/images/im_invest_options_banner.jpg" class="page-screen-bg-image" />
        </div>
    </div>
</div>
<!-- end more options to invest screen -->

<!-- financial advantages screen -->
<div class="page-screen financial-advantages-screen">
    <div class="row">
        <div class="col-6 pr-0 animated-block slide-from-bottom">
            <img src="/images/im_financial_advantages_banner.jpg" class="page-screen-bg-image" />
        </div>
        <div class="col-6 animated-block slide-from-top pl-0">
            <div class="page-block-content gray-bg">
                <p class="page-screen-heading mb-2">Financial<br><span class="red-text">Advantages</span></p>

                <p class="page-block-description font-normal light-weight mt-4 mb-2 text-left">Our experienced experts connect with you in 10 minutes to start together.</p>

                <ul class="custom-list">
                    <li><img src="/images/ic_arrow_right.svg" class="list-icon" /> Organize full post-sale service</li>
                    <li><img src="/images/ic_arrow_right.svg" class="list-icon" /> Identify ideal investment opportunities and select the most profitable properties</li>
                    <li><img src="/images/ic_arrow_right.svg" class="list-icon" /> Receive a stable passive income with maximum comfort and minimum risks</li>
                    <li><img src="/images/ic_arrow_right.svg" class="list-icon" /> Professional analysts who will conduct an in-depth study of possible risks and select the most profitable options</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end financial advantages screen -->

<!-- our clients say screen -->
<div class="page-screen our-clients-say-screen">
    <div class="animated-block slide-from-bottom red-bg">
        <div class="wraper top-padding">
            <div class="row">
                <div class="col-6">
                    <p class="page-screen-heading">What our Clients<br>say</p>
                </div>
                <div class="col-6">
                    <div class="testimonials-container">
                        <div class="carousel testimonials-carousel">
                            <div class="carousel-slide content-wraper">
                                <div class="testimonial-item">
                                    <div class="testimonial-text">During my invest in Maison Wealth company. That number alone is something to be amazed at. Other ways has helped my company is through writing copy for email campaigns and web support.</div>
                                    <p class="testimonial-author">- Mary</p>
                                </div>
                            </div>
                            <div class="carousel-slide content-wraper">
                                <div class="testimonial-item">
                                    <div class="testimonial-text">Here must be cool text about amazing company, and so on...</div>
                                    <p class="testimonial-author">- Alex</p>
                                </div>
                            </div>
                            <div class="carousel-slide content-wraper">
                                <div class="testimonial-item">
                                    <div class="testimonial-text">Investing in Maison Wealth is a good choice for own future</div>
                                    <p class="testimonial-author">- Johnny</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end our clients screen -->

<!-- get in touch screen -->
@include('includes.desktop.get_in_touch_screen')
<!-- end get in touch screen -->

<!-- footer -->
@include('includes.desktop.footer')
<!-- end footer -->

<script>
    $('.testimonials-carousel').slick({
        dots: false,
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        adaptiveHeight: true,
        fade: true,
        prevArrow: '<button id="prev" type="button" class="btn btn-prev carousel-arrow"><img src="/images/ic_arrow_right_white.svg" /></button>',
        nextArrow: '<button id="next" type="button" class="btn btn-next carousel-arrow"><img src="/images/ic_arrow_right_white.svg" /></button>'
    });
</script>

@endsection
