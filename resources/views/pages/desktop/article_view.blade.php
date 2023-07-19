@extends('layouts.main')

@section('content')
<!-- top screen -->
<div class="page-screen active-screen opened article-screen">
    <div class="wraper">
        <p class="article-title page-screen-heading top-padding">{{$article->translate($activeLang)->title}}</p>
        <div class="row mb-5">
            <div class="col-6 offset-6">
                <p class="page-screen-heading article-subtitle red-text">{{$article->translate($activeLang)->page_title}}</p>
                <p class="page-block-description light-weight font-normal text-left">{{$article->translate($activeLang)->page_description}}</p>
            </div>
        </div>
    </div>
</div>
<div class="page-screen">
    <div class="row">
        <div class="col-6 animated-block slide-from-top pr-0">
            <div class="page-block-content p-0">
                <img src="{{$article->bannerImage()}}" class="page-screen-bg-image animated-image left-animated-image" />
            </div>
        </div>
        <div class="col-6 animated-block slide-from-bottom pl-0">
            <div class="page-block-content p-0">
                <img src="{{$article->bannerImage()}}" class="page-screen-bg-image animated-image right-animated-image" />
            </div>
        </div>
    </div>
</div>
<!-- end top screen -->

@if($article->options->count())
<!-- why screen -->
<div class="page-screen @if($article->options->count() > 2){{'auto-height'}}@endif why-screen">
    <div class="animated-block slide-from-bottom gray-bg">
        <div class="wraper top-padding">
            <div class="row">
                <div class="col-12 mb-4 pb-3"><hr></div>
                <div class="col-6">
                    <p class="page-screen-heading red-text">{{ $article->translate($activeLang)->page_options_title}}</p>
                </div>
                <div class="col-6 offset-6">
                    <div class="why-list row">
                        @foreach($article->options as $articleOption)
                        <div class="col-6">
                            <div class="why-item">
                                <div class="why-item-heading">{{$articleOption->translate($activeLang)->title}}</div>
                                <div class="why-item-description">{{$articleOption->translate($activeLang)->description}}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end why screen -->
@endif

@if($article->screens->count())
<!-- screens -->
@foreach($article->screens as $pageScreen)
<div class="page-screen article-screen-content">
    <div class="row">
        @if($pageScreen->align == 'right')
        <div class="col-6 pr-0 animated-block {{$pageScreen['align'] == 'right' ? 'slide-from-bottom' : 'slide-from-top' }}">
            <img src="{{$pageScreen->photo()}}" class="page-screen-bg-image" />
        </div>
        @endif
        <div class="col-6 animated-block {{$pageScreen->align == 'left' ? 'slide-from-bottom pr-0' : 'slide-from-top pl-0'}}">
            <div class="content-wraper page-block-content white-bg top-padding">

                @if($pageScreen->translate($activeLang)->heading)
                <p class="page-screen-heading mb-2">{{ $pageScreen->translate($activeLang)->heading }}</p>
                @endif

                @if($pageScreen->translate($activeLang)->title)
                <p class="page-screen-heading text-left mb-2 article-title">{{$pageScreen->translate($activeLang)->title }}</p>
                @endif

                @if($pageScreen->translate($activeLang)->description)
                <p class="page-block-description font-normal light-weight mb-2 text-left">{{ $pageScreen->translate($activeLang)->description }} </p>
                @endif

                @if($pageScreen->list())
                <ul class="custom-list">
                    @foreach($pageScreen->list()->items as $pageScreenListItem)
                    <li><img src="/images/ic_arrow_right.svg" class="list-icon" /> {{$pageScreenListItem->translate($activeLang)->title}}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
        @if($pageScreen->align == 'left')
        <div class="col-6 pl-0 animated-block {{$pageScreen->align == 'left' ? 'slide-from-top' : 'slide-from-bottom'}}">
            <img src="{{$pageScreen->photo()}}" class="page-screen-bg-image" />
        </div>
        @endif
    </div>
</div>
@endforeach
<!-- end screens -->
@endif

<!-- footer -->
@include('includes.desktop.footer')
<!-- end footer -->

@endsection
