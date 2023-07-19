@extends('layouts.main')

@section('content')
<!-- top screen -->
<div class="page-screen active-screen opened article-screen">
    <img src="{{$article->bannerImage()}}" class="page-screen-bg-image full-height" />
    <div class="wraper">
        <div class="fixed-block left-block">
            <p class="fixed-block-title white-text">{{$article->translate($activeLang)->title}}</p>
        </div>
    </div>
</div>
<div class="page-screen auto-height article-screen">
    <div class="animated-block slide-from-bottom gray-bg pt-4 pb-4">
        <div class="wraper">
            <p class="page-screen-heading red-text article-subtitle with-border">{{$article->translate($activeLang)->page_title}}</p>
            <p class="page-block-description light-weight font-normal text-left">{{$article->translate($activeLang)->page_description}}</p>
        </div>
    </div>
</div>
<!-- end top screen -->

@if($article->options->count())
<!-- why screen -->
<div class="page-screen auto-height why-screen">
    <div class="animated-block slide-from-bottom white-bg pt-4 pb-4">
        <div class="wraper">
            <p class="page-screen-heading red-text">{{ $article->translate($activeLang)->page_options_title}}</p>

            <div class="why-list mt-5">
                @foreach($article->options as $articleOption)
                <div class="why-item mt-5">
                    <div class="why-item-heading">{{$articleOption->translate($activeLang)->title}}</div>
                    <div class="why-item-description">{{$articleOption->translate($activeLang)->description}}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- end why screen -->
@endif

@if($article->screens->count())
<!-- screens -->
@foreach($article->screens as $pageScreen)
<div class="page-screen article-screen-content auto-height">
    <div class="animated-block slide-from-bottom white-bg pb-4">
        <img src="{{$pageScreen->photo()}}" class="page-screen-bg-image" />
        <div class="wraper">
            @if($pageScreen->translate($activeLang)->heading)
            <div class="fixed-block left-block">
                <p class="fixed-block-title article-subtitle white-text">{{ $pageScreen->translate($activeLang)->heading }}</p>
            </div>
            @endif

            @if($pageScreen->translate($activeLang)->title)
            <p class="page-screen-heading text-left mb-2 pt-4">{{$pageScreen->translate($activeLang)->title }}</p>
            @endif

            @if($pageScreen->translate($activeLang)->description)
            <p class="page-block-description font-normal light-weight mt-4 mb-2 text-left">{{ $pageScreen->translate($activeLang)->description }}</p>
            @endif

            @if($pageScreen->list())
            <ul class="custom-list mt-4 pl-3">
                @foreach($pageScreen->list()->items as $pageScreenListItem)
                <li><img src="/images/ic_arrow_right.svg" class="list-icon" /> {{$pageScreenListItem->translate($activeLang)->title}}</li>
                @endforeach
            </ul>
            @endif

        </div>
    </div>
</div>
@endforeach
<!-- end screens -->
@endif

<!-- footer -->
@include('includes.mobile.footer')
<!-- end footer -->

@endsection
