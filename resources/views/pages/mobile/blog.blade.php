@extends('layouts.main')

@section('content')
<!-- top screen -->
<div class="page-screen start-invest-screen">
    <img src="/images/im_blog_banner.jpg" class="page-screen-bg-image" />
    <div class="wraper">
        <div class="fixed-block left-block">
            <p class="fixed-block-title">Start your<br>Invest with Us</p>
            <p class="fixed-block-description mt-3">It's not so scary and much easier than you think at first glance. Start today and get results tomorrow.</p>
        </div>
        <a href="" class="main-btn black-btn inverted-btn border-0">Learn more <span class="btn-icon"></span></a>
    </div>
</div>
<!-- end top screen -->

<!-- blog articles screen -->
<div class="page-screen auto-height blog-articles-screen">
    <div class="wraper">
        <p class="page-screen-heading mt-5"><span class="gray-text">Pay when you want and get</span> your income <span class="gray-text">immediately.</span></p>

        <div class="blog-articles mt-4">
            <div class="blog-aticle">
                <div class="blog-article-heading"><a href="/blog/article"><span class="arrow-icon"></span> Guide for non-residents: how to buy the best Dubai property</a></div>
                <div class="blog-article-description">Investment opportunity: property in Dubai for rent, resale, and buy-to-live options for non-residents. Maison Wealth experts with proven variants. Returns on your investment.</div>
                <span class="blog-article-date">26/01/2023</span>
            </div>
            <div class="blog-aticle">
                <div class="blog-article-heading"><a href="/blog/article"><span class="arrow-icon"></span> Risks involved in property investment: buy apartments in Dubai</a></div>
                <div class="blog-article-description">Pros and cons of buying property in Dubai. Only proven objects for life and...</div>
                <span class="blog-article-date">26/01/2023</span>
            </div>
            <div class="blog-aticle">
                <div class="blog-article-heading"><a href="/blog/article"><span class="arrow-icon"></span> Increase your capital by investing in real estate UAE—guaranteed options with high ROI.</a></div>
                <div class="blog-article-description">Invest with Maison Wealth. High level of profitability investment for foreigners and the opportunity for a non-residence visa. Fast payback...</div>
                <span class="blog-article-date">26/01/2023</span>
            </div>
        </div>
    </div>
</div>
<!-- end blog articles screen -->

@endsection
