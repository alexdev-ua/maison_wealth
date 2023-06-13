@extends('layouts.main')

@section('content')
<!-- top screen -->
<div class="page-screen active-screen opened article-screen">
    <img src="{{$article['page']['banner']}}" class="page-screen-bg-image" />
    <div class="wraper">
        <div class="fixed-block left-block">
            <p class="fixed-block-title white-text">{!! $article['title'] !!}</p>
        </div>
    </div>
</div>
<div class="page-screen article-screen">
    <div class="animated-block slide-from-bottom gray-bg top-padding pb-5">
        <div class="wraper">
            <p class="page-screen-heading red-text article-subtitle with-border">{!! $article['page']['title'] !!}</p>
            <p class="page-block-description light-weight font-normal text-left">{!! $article['page']['description'] !!}</p>
        </div>
    </div>
</div>
<!-- end top screen -->

<!-- why screen -->
<div class="page-screen @if(count($article['page']['options']['list']) > 2){{'auto-height'}}@endif why-screen">
    <div class="animated-block slide-from-bottom white-bg top-padding pb-4">
        <div class="wraper">
            <p class="page-screen-heading red-text">{{ $article['page']['options']['title']}}</p>

            <div class="why-list mt-5">
                @foreach($article['page']['options']['list'] as $articleOption)
                <div class="why-item">
                    <div class="why-item-heading">{{$articleOption['title']}}</div>
                    <div class="why-item-description">{{$articleOption['description']}}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- end why screen -->

<!-- screens -->
@foreach($article['page']['screens'] as $pageScreen)
<div class="page-screen @if(!isset($pageScreen['fixed']))auto-height @endif article-screen-content">
    <div class="animated-block slide-from-bottom white-bg pb-4">
        <img src="{{$pageScreen['image']}}" class="page-screen-bg-image @if(isset($pageScreen['fixed'])){{'full-height'}}@endif" />
        <div class="wraper">
            @if(isset($pageScreen['heading']))
            <div class="fixed-block left-block">
                <p class="fixed-block-title article-subtitle white-text">{!!$pageScreen['heading']!!}</p>
            </div>
            @endif

            @if(isset($pageScreen['title']))
            <p class="page-screen-heading text-left mb-2 pt-4">{!! $pageScreen['title'] !!}</p>
            @endif

            @if(isset($pageScreen['description']))
            <p class="page-block-description font-normal light-weight mt-4 mb-2 text-left">{!! $pageScreen['description'] !!}</p>
            @endif

            @if(isset($pageScreen['list']))
            <ul class="custom-list mt-4 pl-3">
                @foreach($pageScreen['list'] as $pageScreenListItem)
                <li><img src="/images/ic_arrow_right.svg" class="list-icon" /> {{$pageScreenListItem}}</li>
                @endforeach
            </ul>
            @endif

        </div>
    </div>
</div>
@endforeach
<!-- end screens -->

<!-- footer -->
@include('includes.mobile.footer')
<!-- end footer -->

@endsection
