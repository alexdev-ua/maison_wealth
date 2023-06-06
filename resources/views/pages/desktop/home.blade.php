@extends('layouts.main')

@section('content')
<!-- top screen -->
<div class="page-screen active-screen opened" id="homeTopScreen">
    <img src="/images/im_main_top_bg.jpg" class="page-screen-bg-image" />
    <div class="fixed-block centered-block">
        <img src="/images/ic_company_name.svg" class="company-name" />
        <p class="fixed-block-title">The right property investments</p>
    </div>
</div>
<!-- end top screen -->

<!-- search screen -->
<div class="page-screen" id="homeSearchScreen">
    <div class="row m-0">
        <div class="col-6 offset-6 pr-0 pl-0">
            <div class="page-block-content white-bg animated-block slide-from-bottom">
                <p class="page-block-description">We sell the best investment properties in the most sought-after locations in the world's most investment-attractive countries.</p>
                <form class="custom-form" action="/properties/all">
                    <hr>
                    <div class="row mt-5">
                        <div class="col-10 offset-1 mb-2">
                            <p class="custom-form-text uppercase text-center mb-0">The amount you would like to invest</p>
                        </div>
                        <div class="col-6 pr-0 offset-1 mt-4">
                            <input type="number" inputmode="numeric" pattern="\d*" class="custom-input bordered" name="price" placeholder="Enter your sum" autocomplete="off" />
                        </div>
                        <div class="col-4 mt-4">
                            <button class="main-btn black-btn">Search <span class="btn-icon"></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end search screen -->

<!-- plots screen -->
<div class="page-screen plots-screen" id="homePlotsScreen">
        <div class="row m-0">
            <div class="col-6 p-0 animated-block slide-from-bottom white-bg">
                <div class="wraper">
                    <div class="plots-block"></div>
                    <div class="plots-block">
                        <div class="plots-container">
                            <p class="plots-title mt-4 mb-0">Our mission</p>
                            <p class="plots-description">It is time for your right real estate investment</p>
                            <a href="" class="custom-link"><u>Learn more</u></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 animated-block slide-from-top white-bg p-0">
                <div class="wraper">
                    <div class="plots-block">
                        <div class="banners-block">
                            <img src="/images/im_invest_dubai_banner.jpg" class="banner-image active-banner" id="plotsBanner1" style="max-height: calc(100vh - 210px);" />
                            <img src="/images/projects/im_cipriani.jpg" class="banner-image" id="plotsBanner2" style="max-height: calc(100vh - 210px);" />
                            <img src="/images/projects/im_batu_bolong.jpg" class="banner-image" id="plotsBanner3" style="max-height: calc(100vh - 210px);" />
                            <img src="/images/projects/im_ceiba_paradise.jpg" class="banner-image" id="plotsBanner4" style="max-height: calc(100vh - 210px);" />
                        </div>
                    </div>
                    <div class="plots-list white-bg">
                        <div class="plot-item opened">
                            <div class="plot-title" data-banner="#plotsBanner1"><img src="/images/ic_arrow_right_red.svg" /> Dubai</div>
                            <div class="plot-description">Land, apartments, villas, hotel residences, townhouses, commercial spaces, ultra-luxury projects</div>
                        </div>
                        <div class="plot-item">
                            <div class="plot-title" data-banner="#plotsBanner2"><img src="/images/ic_arrow_right_red.svg" /> Miami</div>
                            <div class="plot-description">Land, apartments, villas, hotel residences, townhouses, commercial spaces, ultra-luxury projects</div>
                        </div>
                        <div class="plot-item">
                            <div class="plot-title" data-banner="#plotsBanner3"><img src="/images/ic_arrow_right_red.svg" /> Bali</div>
                            <div class="plot-description">Land, apartments, villas, hotel residences, townhouses, commercial spaces, ultra-luxury projects</div>
                        </div>
                        <div class="plot-item">
                            <div class="plot-title" data-banner="#plotsBanner4"><img src="/images/ic_arrow_right_red.svg" /> Mexico(Riviera Maya)</div>
                            <div class="plot-description">Land, apartments, villas, hotel residences, townhouses, commercial spaces, ultra-luxury projects</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</div>
<!-- end plots screen -->

<!-- facilities screen -->
<div class="page-screen" id="homeFacilities1Screen">
        <div class="row m-0">
            <div class="col-4 p-0">
                <div class="facility-block animated-block slide-from-bottom">
                    <div class="facility-info top-padding">
                        <p class="facility-heading">TOP Facilities<br>we offer</p>

                        <div class="bottom-block opened">
                            <p class="facility-description">We are an investment company. Sunlit and expansive. </p>
                            <a href="/properties/all" class="main-btn red-btn watch-btn mt-3 d-inline-block">Watch <span class="btn-icon"></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 p-0">
                <div class="facility-block animated-block slide-from-top">
                    <img src="/images/projects/im_edge.jpg" class="facility-bg-image" />
                    <div class="facility-info">
                        <div class="bottom-block">
                            <a href="/property/the-edge">
                                <p class="facility-title">The Edge <img src="/images/ic_arrow_right.svg" class="link-icon" /></p>
                                <p class="facility-description">Some description can be here</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 p-0">
                <div class="facility-block animated-block slide-from-bottom">
                    <img src="/images/projects/im_upper_house.jpg" class="facility-bg-image" />
                    <div class="facility-info">
                        <div class="bottom-block">
                            <a href="/property/upper-house">
                                <p class="facility-title">Upper House <img src="/images/ic_arrow_right.svg" class="link-icon" /></p>
                                <p class="facility-description">Some description can be here</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="page-screen" id="homeFacilities2Screen">
        <div class="row m-0">
            <div class="col-4 p-0">
                <div class="facility-block animated-block slide-from-top">
                    <img src="/images/projects/im_bentley_residence.jpg" class="facility-bg-image" />
                    <div class="facility-info">
                        <div class="bottom-block">
                            <a href="/property/bentley-residences">
                                <p class="facility-title">Bentley<br>Residences <img src="/images/ic_arrow_right.svg" class="link-icon" /></p>
                                <p class="facility-description">The project why you should invest in Miami in 2023.</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 p-0">
                <div class="facility-block animated-block slide-from-bottom">
                    <img src="/images/projects/im_umalas_premier.jpg" class="facility-bg-image" />
                    <div class="facility-info">
                        <div class="bottom-block">
                            <a href="/property/umalas-premier">
                                <p class="facility-title">Umalas Premier <img src="/images/ic_arrow_right.svg" class="link-icon" /></p>
                                <p class="facility-description">Some description can be here</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 p-0">
                <div class="facility-block animated-block slide-from-top">
                    <img src="/images/projects/im_batu_bolong_2.jpg" class="facility-bg-image" />
                    <div class="facility-info">
                        <div class="bottom-block">
                            <a href="/property/batu-bolong-2">
                                <p class="facility-title">Batu Bolong <img src="/images/ic_arrow_right.svg" class="link-icon" /></p>
                                <p class="facility-description">Some description can be here</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- end facilities screen -->

<!-- invest screen -->
@include('includes.desktop.invest_screen')
<!-- end invest screen -->

<!-- why invest screen -->
<div class="page-screen invest-screen white-bg" id="whyInvestScreen">
    <div class="wraper top-padding">
        <div class="row">
            <div class="col-6 animated-block slide-from-top">
                <div class="mb-4">
                    <p class="page-screen-heading">Why invest in these<br>countries/ cities?</p>
                </div>
                <div class="banners-block">
                    <img src="/images/im_invest_dubai_banner.jpg" class="banner-image active-banner" id="investBanner1" />
                    <img src="/images/projects/im_cipriani.jpg" class="banner-image" id="investBanner2" />
                    <img src="/images/projects/im_batu_bolong.jpg" class="banner-image" id="investBanner3" />
                    <img src="/images/projects/im_ceiba_paradise.jpg" class="banner-image" id="investBanner4" />
                </div>
            </div>
            <div class="col-6">
                <div class="invest-block animated-block slide-from-bottom row">
                    <div class="col-6">
                        <div class="invest-item">
                            <p class="invest-name">UAE <span class="invest-city">(Dubai)</span></p>
                            <div class="invest-description">Real estate in Dubai is one of the best assets for investment. The growth in property prices is at least 10-15% per year, guaranteeing high profits for your investments.</div>
                            <a href="/properties/dubai" class="custom-link details-btn" data-banner="#investBanner1">Details <img src="/images/ic_arrow_right_white.svg"></a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="invest-item">
                            <p class="invest-name">USA <span class="invest-city">(Miami)</span></p>
                            <div class="invest-description">Miami is the place where dreams of stable and profitable investments come true. With an annual rental occupancy rate of over 85% and a growing demand for short-term rentals.</div>
                            <a href="/properties/miami" class="custom-link details-btn" data-banner="#investBanner2">Details <img src="/images/ic_arrow_right_white.svg"></a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="invest-item">
                            <p class="invest-name">Indonesia<br><span class="invest-city">(Bali)</span></p>
                            <div class="invest-description">On Bali, you will find high returns on real estate investments, thanks to the 300% increase in land value over the last 5 years.</div>
                            <a href="/properties/bali" class="custom-link details-btn" data-banner="#investBanner3">Details <img src="/images/ic_arrow_right_white.svg"></a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="invest-item">
                            <p class="invest-name">Mexico<br><span class="invest-city">(Riviera Maya)</span></p>
                            <div class="invest-description">The ROI ranges from 8% to 12%, and the payback period is 6-7 years.</div>
                            <a href="/properties/mexico" class="custom-link details-btn" data-banner="#investBanner4">Details <img src="/images/ic_arrow_right_white.svg"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end why invest screen -->

<!-- get in touch screen -->
@include('includes.desktop.get_in_touch_screen')
<!-- end get in touch screen -->

<!-- footer -->
@include('includes.desktop.footer')
<!-- end footer -->

@endsection
