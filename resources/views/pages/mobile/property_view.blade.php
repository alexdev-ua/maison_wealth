@extends('layouts.main')

@section('content')
<!-- top screen -->
<div class="page-screen active-screen opened property-screen">
    <img src="{{$property->bannerImage()}}" class="page-screen-bg-image full-height" />
    <div class="wraper">
        <div class="fixed-block left-block">
            <p class="fixed-block-title white-text">{{$property->translate($activeLang)->title}}</p>
            <span class="property-label">{{$property->translate($activeLang)->page_label}}</span>
        </div>
        <button class="main-btn black-btn inverted-btn border-0 scroll-to-btn" data-scroll-to="#personalConsultScreen">Start to Invest <span class="btn-icon"></span></button>
    </div>
</div>
<!-- end top screen -->

<!-- pluses screen -->
<div class="page-screen auto-height pluses-screen">
    <div class="animated-block resized-block white-bg pt-4 pb-4">
        <div class="wraper">
            <p class="page-screen-heading">{{$property->translate($activeLang)->page_description}}</p>

            @if($property->options->count())
            <div class="pluses-list mt-5">
                @foreach($property->options as $propertyOption)
                <div class="plus-item">
                    <div class="plus-item-heading">{{$propertyOption->translate($activeLang)->title}}</div>
                    <div class="plus-item-description">{{$propertyOption->translate($activeLang)->description}}</div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
<!-- end pluses screen -->

@if($property->features->count())
<!-- features screen -->
@foreach($property->features as $feature)
<div class="page-screen auto-height features-screen">
    @if($feature->type == 'text')
    <div class="animated-block slide-from-bottom red-bg pt-4 pb-4">
        <div class="wraper">
            <p class="page-screen-heading white-text text-left">{{$feature->translate($activeLang)->title}}</p>

            @if($feature->translate($activeLang)->description)
            <p class="page-block-description font-normal light-weight mt-4 mb-2 text-left">{{$feature->translate($activeLang)->description}}</p>
            @endif
        </div>
    </div>
    @elseif($feature->type == 'combined')
    <div class="animated-block slide-from-bottom white-bg feature-slide">
        <div class="page-block-content p-0">
            <div>
                <img src="{{$feature->photo()}}" class="page-screen-bg-image" style="height: 60vh;" />
            </div>
            <div class="wraper pt-2">
                <p class="page-screen-heading text-left mb-2 mt-1 pt-3 pb-3">{{$feature->translate($activeLang)->text}}</p>
                @if($feature->translate($activeLang)->description)
                <u class="page-block-description text-left font-normal mt-1 pb-4 d-block">{{$feature->translate($activeLang)->description}}</u>
                @endif

            </div>
        </div>
    </div>
    @elseif($feature->type == 'photo')
    <div class="animated-block slide-from-bottom white-bg feature-slide">
        <div class="page-block-content p-0">
            <img src="{{$feature->photo()}}" class="page-screen-bg-image" />
        </div>
    </div>
    @elseif($feature->type == 'offer')
    <div class="animated-block slide-from-bottom gray-bg feature-slide pb-4">
        <div class="wraper page-block-content">
            <div class="page-block-content top-content pl-0 pb-0">
                <p class="page-block-description text-left font-normal pt-4">About Offer</p>
            </div>
            <div>
                <p class="page-screen-heading text-left mb-2 mt-1">{{$feature->translate($activeLang)->text}}</p>
                @if($feature->translate($activeLang)->description)
                <p class="page-block-description text-left font-normal">{{$feature->translate($activeLang)->description}}</p>
                @endif

                @if($feature->list())
                    <ul class="custom-list">
                    @foreach($feature->list()->items() as $listItem)
                        <li><img src="/images/ic_arrow_right.svg" class="list-icon"> {{$listItem->translate($activeLang)->title}}</li>
                    @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
    @endif
</div>
@endforeach
<!-- end features screen -->

@endif

<!-- personal consulatation screen -->
@include('includes.mobile.personal_consult_screen')
<!-- end personal consultation screen -->

<!-- footer -->
@include('includes.mobile.footer')
<!-- end footer -->

@endsection
