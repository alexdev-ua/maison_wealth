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

@if($directions)
<!-- plots screen -->
<div class="page-screen plots-screen" id="homePlotsScreen">
        <div class="row m-0">
            <div class="col-6 p-0 animated-block slide-from-bottom white-bg">
                <div class="wraper">
                    <div class="plots-block d-flex">
                        <p class="mt-4 mb-0 page-screen-heading">What do<br>we offer</p>
                    </div>
                    <div class="plots-block">
                        <div class="plots-container">

                            <a href="/properties/all" class="custom-link"><u>Learn more</u></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 animated-block slide-from-top white-bg p-0">
                <div class="wraper">
                    <div class="plots-block">
                        <div class="banners-block">
                            @foreach($directions as $key=>$direction)
                            <img src="{{$direction->bannerImage()}}" class="banner-image @if($key == 0)active-banner @endif" id="plotsBanner{{$direction->id}}" style="max-height: calc(100vh - 210px);" />
                            @endforeach
                        </div>
                    </div>
                    <div class="plots-list white-bg">
                        @foreach($directions as $key=>$direction)
                        <div class="plot-item @if($key == 0)opened @endif">
                            <div class="plot-title" data-banner="#plotsBanner{{$direction->id}}"><img src="/images/ic_arrow_right_red.svg" /> {{$direction->translate($activeLang)->title}}</div>
                            <div class="plot-description">Land plots, apartments, villas, hotel residences, townhouses, commercial spaces, ultra-luxury projects</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- end plots screen -->
@endif

@if($facilities->count() > 1)
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
            @foreach($facilities as $key=>$facility)
                @if($key < 2)
                <div class="col-4 p-0">
                    <div class="facility-block animated-block @if($key % 2 == 0)slide-from-bottom @else slide-from-top @endif">
                        <img src="{{$facility->previewImage()}}" class="facility-bg-image" />
                        <div class="facility-info">
                            <div class="bottom-block">
                                <a href="/property/{{$facility->url}}">
                                    <p class="facility-title">{{$facility->translate($activeLang)->title}} <img src="/images/ic_arrow_right.svg" class="link-icon" /></p>
                                    <p class="facility-description"></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>

    @if($facilities->count() >= 5)
    <div class="page-screen" id="homeFacilities2Screen">
        <div class="row m-0">
            @foreach($facilities as $key=>$facility)
                @if($key > 1 && $key < 5)
                <div class="col-4 p-0">
                    <div class="facility-block animated-block @if($key % 2 == 0)slide-from-top @else slide-from-bottom @endif">
                        <img src="{{$facility->previewImage()}}" class="facility-bg-image" />
                        <div class="facility-info">
                            <div class="bottom-block">
                                <a href="/property/{{$facility->url}}">
                                    <p class="facility-title">{{$facility->translate($activeLang)->title}} <img src="/images/ic_arrow_right.svg" class="link-icon" /></p>
                                    <p class="facility-description"></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
    @endif
<!-- end facilities screen -->
@endif

<!-- invest screen -->
@include('includes.desktop.invest_screen')
<!-- end invest screen -->

@if($directions)
<!-- why invest screen -->
<div class="page-screen invest-screen white-bg" id="whyInvestScreen">
    <div class="wraper top-padding">
        <div class="row">
            <div class="col-6 animated-block slide-from-top">
                <div class="mb-4">
                    <p class="page-screen-heading">Why invest in these<br>countries/ cities?</p>
                </div>
                <div class="banners-block">
                    @foreach($directions as $key=>$direction)
                    <img src="{{$direction->bannerImage()}}" class="banner-image @if($key == 0)active-banner @endif" id="investBanner{{$direction->id}}" />
                    @endforeach
                </div>
            </div>
            <div class="col-6">
                <div class="invest-block animated-block slide-from-bottom row">
                    @foreach($directions as $direction)
                    <div class="col-6">
                        <div class="invest-item opened">
                            <p class="invest-name">{{$direction->country($activeLang)}} <span class="invest-city">({{$direction->translate($activeLang)->title}})</span></p>
                            <div class="invest-description">{{$direction->translate($activeLang)->description}}</div>
                            <a href="/direction/{{$direction->url}}" class="custom-link details-btn" data-banner="#investBanner{{$direction->id}}">Details <img src="/images/ic_arrow_right_white.svg"></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end why invest screen -->
@endif

<!-- get in touch screen -->
@include('includes.desktop.get_in_touch_screen')
<!-- end get in touch screen -->

<!-- footer -->
@include('includes.desktop.footer')
<!-- end footer -->

@endsection
