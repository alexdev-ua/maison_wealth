@extends('layouts.main')

@section('content')
<!-- top screen -->
<div class="page-screen active-screen opened start-invest-screen">
    <img src="/images/im_blog_banner.jpg" class="page-screen-bg-image full-height" />
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
<div class="page-screen auto-height blog-articles-screen" id="blogArticlesScreen">
    <div class="animated-block slide-from-bottom white-bg top-padding">
        <div class="wraper">
            <p class="page-screen-heading"><span class="gray-text">Pay when you want and get</span> your income <span class="gray-text">immediately.</span></p>

            @if($articles)
            <div class="blog-articles mt-4">
                @foreach($articles as $article)
                <div class="blog-aticle">
                    <div class="blog-article-heading"><a href="/blog/{{$article->url}}"><span class="arrow-icon"></span> {{$article->translate($activeLang)->title}}</a></div>
                    <div class="blog-article-description">{{$article->translate($activeLang)->description}}</div>
                    <span class="blog-article-date">{{$article->date()}}</span>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
<!-- end blog articles screen -->

<!-- footer -->
@include('includes.mobile.footer')
<!-- end footer -->

@endsection
