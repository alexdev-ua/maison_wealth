@extends('layouts.main')

@section('content')
<!-- top screen -->
<div class="page-screen">
    <img src="/images/im_main_top_bg.jpg" class="page-screen-bg-image" />
    <div class="fixed-block centered-block">
        <div class="wraper">
            <img src="/images/ic_company_name.svg" class="company-name" />
            <p class="fixed-block-title">The right property investments</p>
        </div>
    </div>
</div>
<!-- end top screen -->

<!-- search screen -->
<div class="page-screen">
    <div class="wraper">
        <div class="page-block-content p-0 white-bg">
            <p class="page-block-description">We sell the best investment properties in the most sought-after locations in the world's most investment-attractive countries.</p>
            <div class="custom-form">
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
            </div>
        </div>
    </div>
</div>
<!-- end search screen -->

<!-- plots screen -->
<div class="page-screen auto-height plots-screen">
    <div>
        <div class="plots-block">
            <div class="plots-container">
                <p class="plots-title">Land Plots</p>
                <img src="/images/im_plots_banner.jpg" class="banner-image" />
            </div>
        </div>
        <div class="plots-block">
            <div class="plots-container wraper">
                <div class="plots-list">
                    <div class="plot-item opened">
                        <div class="plot-title"><img src="/images/ic_arrow_right_red.svg" /> Dubai</div>
                        <div class="plot-description">Land, apartments, villas, hotel residences, townhouses, commercial spaces, ultra-luxury projects</div>
                    </div>
                    <div class="plot-item">
                        <div class="plot-title"><img src="/images/ic_arrow_right_red.svg" /> Miami</div>
                        <div class="plot-description">Land, apartments, villas, hotel residences, townhouses, commercial spaces, ultra-luxury projects</div>
                    </div>
                    <div class="plot-item">
                        <div class="plot-title"><img src="/images/ic_arrow_right_red.svg" /> Bali</div>
                        <div class="plot-description">Land, apartments, villas, hotel residences, townhouses, commercial spaces, ultra-luxury projects</div>
                    </div>
                    <div class="plot-item">
                        <div class="plot-title"><img src="/images/ic_arrow_right_red.svg" /> Mexico(Riviera Maya)</div>
                        <div class="plot-description">Land, apartments, villas, hotel residences, townhouses, commercial spaces, ultra-luxury projects</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end plots screen -->

<!-- facilities screen -->
<div class="page-screen auto-height">
    <div class="facility-block auto-height">
        <div class="facility-info">
            <p class="facility-heading">TOP Facilities<br>we offer</p>

            <div class="bottom-block pl-4 pr-4 opened">
                <p class="facility-description">We are an investment company. Sunlit and expansive. </p>

                <button class="main-btn red-btn watch-btn mt-5">Watch <span class="btn-icon"></span></button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 pr-0">
            <div class="facility-block">
                <img src="/images/projects/im_edge.jpg" class="facility-bg-image" />
                <div class="facility-info">
                    <div class="bottom-block">
                        <p class="facility-title">The Edge</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 pl-0">
            <div class="facility-block">
                <img src="/images/projects/im_upper_house.jpg" class="facility-bg-image" />
                <div class="facility-info">
                    <div class="bottom-block">
                        <p class="facility-title">Upper House</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 pr-0">
            <div class="facility-block">
                <img src="/images/projects/im_bentley_residence.jpg" class="facility-bg-image" />
                <div class="facility-info">
                    <div class="bottom-block">
                        <p class="facility-title">Bentley<br>Residences</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 pl-0">
            <div class="facility-block">
                <img src="/images/projects/im_umalas_premier.jpg" class="facility-bg-image" />
                <div class="facility-info">
                    <div class="bottom-block">
                        <p class="facility-title">Umalas Premier</p>
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
<div class="page-screen auto-height invest-screen">
    <div class="mt-5 wraper">
        <p class="page-screen-heading">Why invest in these<br>countries/ cities?</p>
    </div>
    <img src="/images/im_invest_dubai_banner.jpg" class="banner-image" />
    <div class="wraper mt-4 pt-3">
        <div class="invest-block row">
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
<!-- end why invest screen -->

<!-- get in touch screen -->
@include('includes.mobile.get_in_touch_screen')
<!-- end get in touch screen -->

@endsection
