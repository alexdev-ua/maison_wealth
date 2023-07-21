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

@if($directions)
<!-- plots screen -->
<div class="page-screen auto-height plots-screen" id="homePlotsScreen">
    <div class="animated-block slide-from-bottom">
        <div class="plots-block">
            <div class="plots-container">
                <p class="plots-title top-padding mt-0">What do we offer</p>
                <div class="banners-block">
                    @foreach($directions as $key=>$direction)
                    <img src="{{$direction->bannerImage()}}" class="page-screen-bg-image banner-image @if($key == 0)active-banner @endif" id="plotsBanner{{$direction->id}}" />
                    @endforeach
                </div>
            </div>
        </div>
        <div class="plots-block white-bg">
            <div class="plots-container wraper">
                <div class="plots-list pt-3">
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
            @foreach($facilities as $key=>$facility)
            <div class="col-6 @if($key % 2) pl-0 @else pr-0 @endif">
                <div class="facility-block">
                    <img src="{{$facility->previewImage()}}" class="facility-bg-image" />
                    <div class="facility-info">
                        <div class="bottom-block">
                            <a href="/property/{{$facility->url}}">
                                <p class="facility-title">{{$facility->translate($activeLang)->title}}</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end facilities screen -->
@endif

<!-- invest screen -->
@include('includes.mobile.invest_screen')
<!-- end invest screen -->

@if($directions)
<!-- why invest screen -->
<div class="page-screen auto-height invest-screen" id="whyInvestScreen">
    <div class="animated-block slide-from-bottom white-bg top-padding">
        <div class="wraper">
            <p class="page-screen-heading">Why invest in these<br>countries/ cities?</p>
        </div>
        <div class="banners-block">
            @foreach($directions as $key=>$direction)
            <img src="{{$direction->bannerImage()}}" class="banner-image @if($key == 0)active-banner @endif" id="investBanner{{$direction->id}}" />
            @endforeach
        </div>
        <div class="wraper mt-4 pt-3">
            <div class="invest-block row">
                @foreach($directions as $direction)
                <div class="col-6">
                    <div class="invest-item opened">
                        <p class="invest-name">{{$direction->country($activeLang)}} <span class="invest-city">({{$direction->translate($activeLang)->title}})</span></p>
                        <div class="invest-description">{{$direction->translate($activeLang)->description}}</div>
                        <a href="/direction/{{$direction->url}}" class="custom-link mt-3" data-banner="#investBanner{{$direction->id}}">Details <img src="/images/ic_arrow_right_white.svg"></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- end why invest screen -->
@endif

<!-- get in touch screen -->
@include('includes.mobile.get_in_touch_screen')
<!-- end get in touch screen -->

<!-- footer screen -->
@include('includes.mobile.footer')
<!-- end footer screen -->

@endsection
