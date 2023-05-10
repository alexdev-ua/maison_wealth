@extends('layouts.main')

@section('content')
<!-- top screen -->
<div class="page-screen">
    <img src="/images/im_main_top_bg.jpg" class="page-screen-bg-image" />
    <div class="fixed-block centered-block">
        <img src="/images/ic_company_name.svg" class="company-name" />
        <p class="fixed-block-title">The right property investments</p>
    </div>
</div>
<!-- end top screen -->

<!-- search screen -->
<div class="page-screen">
    <img src="/images/im_main_top_bg.jpg" class="page-screen-bg-image" />
    <div class="page-block">
        <div class="row m-0">
            <div class="col-6 offset-6 pr-0">
                <div class="page-block-content white-bg">
                    <p class="page-block-description">We sell the best investment properties in the most sought-after locations in the world's most investment-attractive countries.</p>
                    <div class="custom-form">
                        <hr>
                        <div class="row mt-5">
                            <div class="col-10 offset-1 mb-2">
                                <p class="custom-form-text uppercase text-center mb-0">The amount you would like to invest</p>
                            </div>
                            <div class="col-6 pr-0 offset-1 mt-4">
                                <input type="text" class="custom-input bordered" placeholder="Enter your sum" />
                            </div>
                            <div class="col-4 mt-4">
                                <button class="main-btn black-btn pop-up-btn" data-pop-up="#personalConsultPopup">Search <span class="btn-icon"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end search screen -->

<!-- plots screen -->
<div class="page-screen plots-screen">
    <div class="page-block-content wraper">
        <div class="row plots-block m-0">
            <div class="col-6 offset-6 plots-container">
                <img src="/images/im_plots_banner.jpg" class="banner-image" />
            </div>
        </div>
        <div class="row plots-block m-0">
            <div class="col-6 pr-0 plots-container">
                <div class="">
                    <p class="plots-title">Land Plots</p>
                    <p class="plots-description">We are an investment company.<br>Sunlit and expansive. </p>
                    <a href="" class="custom-link"><u>Learn more</u></a>
                </div>
            </div>
            <div class="col-6 plots-container">
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
<div class="page-screen">
        <div class="row m-0">
            <div class="col-4 p-0">
                <div class="facility-block">
                    <div class="facility-info">
                        <p class="facility-heading">TOP Facilities<br>we offer</p>

                        <div class="bottom-block opened">
                            <p class="facility-description">We are an investment company. Sunlit and expansive. </p>
                            <button class="main-btn red-btn watch-btn mt-3">Watch <span class="btn-icon"></span></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 p-0">
                <div class="facility-block">
                    <img src="/images/projects/im_edge.jpg" class="facility-bg-image" />
                    <div class="facility-info">
                        <div class="bottom-block">
                            <p class="facility-title">The Edge <img src="/images/ic_arrow_right.svg" class="link-icon" /></p>
                            <p class="facility-description">Some description can be here</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 p-0">
                <div class="facility-block">
                    <img src="/images/projects/im_upper_house.jpg" class="facility-bg-image" />
                    <div class="facility-info">
                        <div class="bottom-block">
                            <p class="facility-title">Upper House <img src="/images/ic_arrow_right.svg" class="link-icon" /></p>
                            <p class="facility-description">Some description can be here</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="page-screen">
        <div class="row m-0">
            <div class="col-4 p-0">
                <div class="facility-block">
                    <img src="/images/projects/im_bentley_residence.jpg" class="facility-bg-image" />
                    <div class="facility-info">
                        <div class="bottom-block">
                            <p class="facility-title">Bentley<br>Residences <img src="/images/ic_arrow_right.svg" class="link-icon" /></p>
                            <p class="facility-description">The project why you should invest in Miami in 2023.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 p-0">
                <div class="facility-block">
                    <img src="/images/projects/im_umalas_premier.jpg" class="facility-bg-image" />
                    <div class="facility-info">
                        <div class="bottom-block">
                            <p class="facility-title">Umalas Premier <img src="/images/ic_arrow_right.svg" class="link-icon" /></p>
                            <p class="facility-description">Some description can be here</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 p-0">
                <div class="facility-block">
                    <img src="/images/projects/im_batu_bolong_2.jpg" class="facility-bg-image" />
                    <div class="facility-info">
                        <div class="bottom-block">
                            <p class="facility-title">Batu Bolong <img src="/images/ic_arrow_right.svg" class="link-icon" /></p>
                            <p class="facility-description">Some description can be here</p>
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
<div class="page-screen auto-height invest-screen">
    <div class="wraper">
        <div class="row">
            <div class="col-12 mb-4 mt-4 pt-2">
                <p class="page-screen-heading">Why invest in these<br>countries/ cities?</p>
            </div>
            <div class="col-6">
                <img src="/images/im_invest_banner.jpg" class="banner-image" />
            </div>
            <div class="col-6">
                <div class="invest-block row">
                    <div class="col-6">
                        <div class="invest-item">
                            <p class="invest-name">UAE <span class="invest-city">(Dubai)</span></p>
                            <div class="invest-description">A leading world-class residential destination. A city with a high level of security, progressive infrastructure...</div>
                            <button class="custom-link details-btn mt-3">Details <img src="/images/ic_arrow_right_white.svg"></button>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="invest-item">
                            <p class="invest-name">USA <span class="invest-city">(Miami)</span></p>
                            <div class="invest-description">A leading world-class residential destination. A city with a high level of security, progressive infrastructure...</div>
                            <button class="custom-link details-btn mt-3">Details <img src="/images/ic_arrow_right_white.svg"></button>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="invest-item">
                            <p class="invest-name">Indonesia<br><span class="invest-city">(Bali)</span></p>
                            <div class="invest-description">A leading world-class residential destination. A city with a high level of security, progressive infrastructure...</div>
                            <button class="custom-link details-btn mt-3">Details <img src="/images/ic_arrow_right_white.svg"></button>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="invest-item">
                            <p class="invest-name">Mexico<br><span class="invest-city">(Riviera Maya)</span></p>
                            <div class="invest-description">A leading world-class residential destination. A city with a high level of security, progressive infrastructure...</div>
                            <button class="custom-link details-btn mt-3">Details <img src="/images/ic_arrow_right_white.svg"></button>
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

<!-- pop-ups -->
<div class="pop-up" id="personalConsultPopup">
    <div class="wraper">
        <div class="pop-up-header">
            <button class="close-pop-up-btn pop-up-btn" data-pop-up="#personalConsultPopup"><img src="/images/ic_arrow_right_white.svg"> Back to Maison W.</button>
        </div>
        <div class="pop-up-content">
            <div class="row">
                <div class="col-6 offset-6">
                    <form class="custom-form">
                        <p class="pop-up-heading mb-0">Get a personal expert<br>consultation</p>
                        <div class="row mt-5 pt-3">
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
<!-- end pop-ups -->

@endsection
