@extends('layouts.main')

@section('content')
<!-- top screen -->
<div class="page-screen active-screen opened" id="homeTopScreen">
    <img src="/images/im_main_top_bg.jpg" class="page-screen-bg-image full-height" />
    <div class="fixed-block centered-block">
        <div class="wraper">
            <img src="/images/ic_company_name.svg" class="company-name" />
            <p class="fixed-block-title">The right property investments</p>
        </div>
    </div>
</div>
<!-- end top screen -->

<!-- search screen -->
<div class="page-screen auto-height" id="homeSearchScreen">
    <div class="page-block-content p-0 white-bg animated-block slide-from-bottom pt-5 pb-5">
        <div class="wraper">
            <p class="page-block-description">We sell the best investment properties in the most sought-after locations in the world's most investment-attractive countries.</p>
            <form class="custom-form" action="/properties/all">
                <hr>
                <div class="row">
                    <div class="col-12 mb-2">
                        <p class="custom-form-text uppercase text-center mb-0">The amount you would like to invest</p>
                    </div>
                    <div class="col-6 pr-0 mt-5">
                        <input type="number" inputmode="numeric" pattern="\d*" class="custom-input bordered" name="price" placeholder="Enter your sum" autocomplete="off" />
                    </div>
                    <div class="col-6 pl-0 mt-5">
                        <button class="main-btn black-btn">Search <span class="btn-icon"></span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end search screen -->

<!-- plots screen -->
<div class="page-screen auto-height plots-screen" id="homePlotsScreen">
    <div class="animated-block slide-from-bottom">
        <div class="plots-block">
            <div class="plots-container">
                <p class="plots-title top-padding mt-0">What do we offer</p>
                <div class="banners-block">
                    <img src="/images/im_invest_dubai_banner.jpg" class="page-screen-bg-image banner-image active-banner" id="plotsBanner1" />
                    <img src="/images/im_invest_miami_banner.jpg" class="page-screen-bg-image banner-image" id="plotsBanner2" />
                    <img src="/images/im_invest_bali_banner.jpg" class="page-screen-bg-image banner-image" id="plotsBanner3" />
                    <img src="/images/im_invest_mexico_banner.jpg" class="page-screen-bg-image banner-image" id="plotsBanner4" />
                </div>
            </div>
        </div>
        <div class="plots-block white-bg">
            <div class="plots-container wraper">
                <div class="plots-list pt-3">
                    <div class="plot-item opened">
                        <div class="plot-title" data-banner="#plotsBanner1"><img src="/images/ic_arrow_right_red.svg" /> Dubai</div>
                        <div class="plot-description">Land plots, apartments, villas, hotel residences, townhouses, commercial spaces, ultra-luxury projects</div>
                    </div>
                    <div class="plot-item">
                        <div class="plot-title" data-banner="#plotsBanner2"><img src="/images/ic_arrow_right_red.svg" /> Miami</div>
                        <div class="plot-description">Land plots, apartments, villas, hotel residences, townhouses, commercial spaces, ultra-luxury projects</div>
                    </div>
                    <div class="plot-item">
                        <div class="plot-title" data-banner="#plotsBanner3"><img src="/images/ic_arrow_right_red.svg" /> Bali</div>
                        <div class="plot-description">Land plots, apartments, villas, hotel residences, townhouses, commercial spaces, ultra-luxury projects</div>
                    </div>
                    <div class="plot-item">
                        <div class="plot-title" data-banner="#plotsBanner4"><img src="/images/ic_arrow_right_red.svg" /> Mexico(Riviera Maya)</div>
                        <div class="plot-description">Land plots, apartments, villas, hotel residences, townhouses, commercial spaces, ultra-luxury projects</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end plots screen -->

<!-- facilities screen -->
<div class="page-screen auto-height" id="homeFacilitiesScreen">
    <div class="animated-block slide-from-bottom">
        <div class="facility-block auto-height">
            <div class="facility-info top-padding">
                <p class="facility-heading">TOP Facilities<br>we offer</p>

                <div class="bottom-block pl-4 pr-4 opened">
                    <p class="facility-description">We are an investment company. Sunlit and expansive. </p>

                    <a href="/properties/all" class="main-btn red-btn watch-btn mt-5 d-inline-block">Watch <span class="btn-icon"></span></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 pr-0">
                <div class="facility-block">
                    <img src="/images/projects/the-edge/preview.jpg" class="facility-bg-image" />
                    <div class="facility-info">
                        <div class="bottom-block">
                            <a href="/property/the-edge">
                                <p class="facility-title">The Edge</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 pl-0">
                <div class="facility-block">
                    <img src="/images/projects/upper-house/preview.jpg" class="facility-bg-image" />
                    <div class="facility-info">
                        <div class="bottom-block">
                            <a href="/property/upper-house">
                                <p class="facility-title">Upper House</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 pr-0">
                <div class="facility-block">
                    <img src="/images/projects/bentley-residences/preview.jpg" class="facility-bg-image" />
                    <div class="facility-info">
                        <div class="bottom-block">
                            <a href="/property/bentley-residences">
                                <p class="facility-title">Bentley<br>Residences</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 pl-0">
                <div class="facility-block">
                    <img src="/images/projects/umalas-premier/preview.jpg" class="facility-bg-image" />
                    <div class="facility-info">
                        <div class="bottom-block">
                            <a href="/property/umalas-premier">
                                <p class="facility-title">Umalas Premier</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end facilities screen -->

<!-- invest screen -->
@include('includes.mobile.invest_screen')
<!-- end invest screen -->

<!-- why invest screen -->
<div class="page-screen auto-height invest-screen" id="whyInvestScreen">
    <div class="animated-block slide-from-bottom white-bg top-padding">
        <div class="wraper">
            <p class="page-screen-heading">Why invest in these<br>countries/ cities?</p>
        </div>
        <div class="banners-block">
            <img src="/images/im_invest_dubai_banner.jpg" class="banner-image active-banner" id="investBanner1" />
            <img src="/images/im_invest_miami_banner.jpg" class="banner-image" id="investBanner2" />
            <img src="/images/im_invest_bali_banner.jpg" class="banner-image" id="investBanner3" />
            <img src="/images/im_invest_mexico_banner.jpg" class="banner-image" id="investBanner4" />
        </div>
        <div class="wraper mt-4 pt-3">
            <div class="invest-block row">
                <div class="col-6">
                    <div class="invest-item opened">
                        <p class="invest-name">UAE <span class="invest-city">(Dubai)</span></p>
                        <div class="invest-description">Real estate in Dubai is one of the best assets for investment. The growth in property prices is at least 10-15% per year, guaranteeing high profits for your investments.</div>
                        <a href="/direction/dubai" class="custom-link mt-3" data-banner="#investBanner1">Details <img src="/images/ic_arrow_right_white.svg"></a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="invest-item opened">
                        <p class="invest-name">USA <span class="invest-city">(Miami)</span></p>
                        <div class="invest-description">In Miami, dreams of stable and profitable investments come true with an annual rental occupancy rate of over 85% and a growing demand for short-term rentals.</div>
                        <a href="/direction/miami" class="custom-link mt-3" data-banner="#investBanner2">Details <img src="/images/ic_arrow_right_white.svg"></a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="invest-item opened">
                        <p class="invest-name">Indonesia<br><span class="invest-city">(Bali)</span></p>
                        <div class="invest-description">On Bali, you will find high returns on real estate investments, thanks to the 300% increase in land value over the last 5 years.</div>
                        <a href="/direction/bali" class="custom-link mt-3" data-banner="#investBanner3">Details <img src="/images/ic_arrow_right_white.svg"></a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="invest-item opened">
                        <p class="invest-name">Mexico<br><span class="invest-city">(Riviera Maya)</span></p>
                        <div class="invest-description">The ROI ranges from 8% to 12%, and the payback period is 6-7 years.</div>
                        <a href="/direction/mexico" class="custom-link mt-3" data-banner="#investBanner4">Details <img src="/images/ic_arrow_right_white.svg"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end why invest screen -->

<!-- get in touch screen -->
@include('includes.mobile.get_in_touch_screen')
<!-- end get in touch screen -->

<!-- footer screen -->
@include('includes.mobile.footer')
<!-- end footer screen -->

@endsection
