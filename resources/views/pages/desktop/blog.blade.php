@extends('layouts.main')

@section('content')
<!-- top screen -->
<div class="page-screen active-screen opened start-invest-screen">
    <img src="/images/im_blog_banner.jpg" class="page-screen-bg-image" />
    <div class="wraper">
        <div class="fixed-block left-block">
            <p class="fixed-block-title">Start your<br>Invest with Us</p>
            <p class="fixed-block-description mt-3">It's not so scary and much easier than you think at first glance. Start today and get results tomorrow.</p>
        </div>
        <button class="main-btn black-btn inverted-btn border-0 scroll-to-btn" data-scroll-to="#blogArticlesScreen">Learn more <span class="btn-icon"></span></button>
    </div>
</div>
<!-- end top screen -->

<!-- blog articles screen -->
<div class="page-screen auto-height blog-articles-screen mb-5" id="blogArticlesScreen">
    <div class="animated-block slide-from-bottom white-bg">
        <div class="wraper top-padding">
            <div class="row">
                <div class="col-6">
                    <p class="page-screen-heading"><span class="gray-text">Pay when you want and get</span> your income <span class="gray-text">immediately.</span></p>
                </div>
                <div class="col-6 offset-6">
                    <div class="blog-articles row">
                        <div class="col-6">
                            <div class="blog-aticle">
                                <div class="blog-article-heading"><a href="/blog/article">Guide for non-residents: how to buy the best Dubai property <span class="arrow-icon"></span></a></div>
                                <div class="blog-article-description">Investment opportunity: property in Dubai for rent, resale, and buy-to-live options for non-residents. Maison Wealth experts with proven variants. Returns on your investment.</div>
                                <span class="blog-article-date">26/01/2023</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="blog-aticle">
                                <div class="blog-article-heading"><a href="/blog/article">Risks involved in property investment: buy apartments in Dubai <span class="arrow-icon"></span></a></div>
                                <div class="blog-article-description">Pros and cons of buying property in Dubai. Only proven objects for life and...</div>
                                <span class="blog-article-date">26/01/2023</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="blog-aticle">
                                <div class="blog-article-heading"><a href="/blog/article">Increase your capital by investing in real estate UAE—guaranteed options with high ROI. <span class="arrow-icon"></span></a></div>
                                <div class="blog-article-description">Invest with Maison Wealth. High level of profitability investment for foreigners and the opportunity for a non-residence visa. Fast payback...</div>
                                <span class="blog-article-date">26/01/2023</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end blog articles screen -->

<!-- footer -->
@include('includes.desktop.footer')
<!-- end footer -->

@endsection
