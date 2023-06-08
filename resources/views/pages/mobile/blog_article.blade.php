@extends('layouts.main')

@section('content')
<!-- top screen -->
<div class="page-screen active-screen opened article-screen">
    <img src="/images/im_blog_article_banner.jpg" class="page-screen-bg-image" />
    <div class="wraper">
        <div class="fixed-block left-block">
            <p class="fixed-block-title white-text">Property in<br>Dubai</p>
        </div>
    </div>
</div>
<div class="page-screen article-screen auto-height">
    <div class="animated-block slide-from-bottom gray-bg top-padding pb-5">
        <div class="wraper">
            <p class="page-screen-heading red-text with-border">Guide to income investing</p>
            <p class="page-block-description light-weight font-normal text-left">Dubai has been one of the most attractive regions for investment for the last few years because Dubai was the first to develop the United Arab Emirates. The most stable way to profit from investments in real estate is in Dubai since this market is relatively stable and even.</p>
        </div>
    </div>
</div>
<!-- end top screen -->

<!-- why screen -->
<div class="page-screen auto-height why-screen">
    <div class="animated-block slide-from-bottom white-bg top-padding">
        <div class="wraper">
            <p class="page-screen-heading red-text">Why Dubai?</p>

            <div class="why-list mt-5 mb-5">
                <div class="why-item">
                    <div class="why-item-heading">Regular rest</div>
                    <div class="why-item-description">Possibility to regular rest in the big city with all types of facilities and sea without the exhausting search for a hotel or apartment to live in.</div>
                </div>
                <div class="why-item">
                    <div class="why-item-heading">Official documents</div>
                    <div class="why-item-description">You can get a resident visa in Dubai five years after buying.</div>
                </div>
                <div class="why-item">
                    <div class="why-item-heading">Profit guarantee</div>
                    <div class="why-item-description">Guaranteed profit investment because Dubai is a popular holiday and business destination.</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end why screen -->

<!-- more options to invest screen -->
<div class="page-screen auto-height invest-options-screen">
    <div class="animated-block slide-from-bottom white-bg pb-4">
        <img src="/images/im_invest_options_banner.jpg" class="page-screen-bg-image" />
        <div class="wraper auto-height mt-4">
            <p class="page-screen-heading text-left mb-2"><span class="red-text">More and better</span><br>options to invest</p>

            <p class="page-block-description font-normal light-weight mt-4 mb-2 text-left">We create individual investment plans for each client and provide answers to all questions related to real estate investing, to make it safe and profitable.</p>

            <ul class="custom-list mt-4 pl-3">
                <li><img src="/images/ic_arrow_right.svg" class="list-icon" /> Buying a real estate in Dubai is not difficult</li>
                <li><img src="/images/ic_arrow_right.svg" class="list-icon" /> The city is constantly being built and growing, so you won't have problems with the choice</li>
                <li><img src="/images/ic_arrow_right.svg" class="list-icon" /> Investing in property under construction, you will receive real estate in an excellent respectable area in a few years</li>
                <li><img src="/images/ic_arrow_right.svg" class="list-icon" /> Foreign investors feel supported and protected by the UAE government </li>
                <li><img src="/images/ic_arrow_right.svg" class="list-icon" /> Prices for apartments and houses in Dubai have decreased by 3.6% recently, which caused a surge of interest from foreign investors</li>
            </ul>
        </div>
    </div>
</div>
<!-- end more options to invest screen -->

<!-- commercial properties screen -->
<div class="page-screen auto-height financial-advantages-screen">
    <div class="animated-block slide-from-bottom gray-bg pb-4">
        <img src="/images/im_financial_advantages_banner.jpg" class="page-screen-bg-image" />
        <div class="wraper gray-bg auto-height mt-4">
            <p class="page-screen-heading mb-2">Financial<br><span class="red-text">Advantages</span></p>

            <p class="page-block-description font-normal light-weight mt-4 mb-2 text-left">Our experienced experts connect with you in 10 minutes to start together.</p>

            <ul class="custom-list mt-4 pl-3">
                <li><img src="/images/ic_arrow_right.svg" class="list-icon" /> One of the most attractive and promising investment types for investors</li>
                <li><img src="/images/ic_arrow_right.svg" class="list-icon" /> There are no taxes on the purchase or sale of real estate in the UAE, and you should only pay a registration fee and no additional costs</li>
                <li><img src="/images/ic_arrow_right.svg" class="list-icon" /> Many local and foreign companies invest in renting housing in Dubai for employees and leasing commercial premises to run their businesses</li>
            </ul>
        </div>
    </div>
</div>
<!-- end commercial properties screen -->

<!-- start investing screen -->
<div class="page-screen start-investing-screen">
    <div class="animated-block slide-from-bottom">
        <img src="/images/im_start_invest_banner.jpg" class="page-screen-bg-image" />

        <div class="wraper">
            <div class="fixed-block left-block">
                <p class="fixed-block-title white-text">Start investing in Dubai (UAE), think it over and we will be there for you.</p>
            </div>
        </div>
    </div>
</div>
<!-- end start investing screen -->

<!-- footer -->
@include('includes.mobile.footer')
<!-- end footer -->

@endsection
