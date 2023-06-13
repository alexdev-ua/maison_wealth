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
                        @foreach($articles as $key=>$article)
                        <div class="col-6">
                            <div class="blog-aticle">
                                <div class="blog-article-heading"><a href="/blog/{{$key}}">{!!$article['title']!!} <span class="arrow-icon"></span></a></div>
                                <div class="blog-article-description">{{$article['description']}}</div>
                                <span class="blog-article-date">{{$article['date']}}</span>
                            </div>
                        </div>
                        @endforeach
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
