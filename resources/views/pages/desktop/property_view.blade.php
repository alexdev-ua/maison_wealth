@extends('layouts.main')

@section('content')
<!-- top screen -->
<div class="page-screen active-screen opened property-screen">
    <img src="{{$property->bannerImage()}}" class="page-screen-bg-image" />
    <div class="wraper">
        <div class="fixed-block right-block">
            <p class="fixed-block-title">{{$property->translate($activeLang)->title}}</p>
        </div>
        <button class="main-btn black-btn inverted-btn border-0 scroll-to-btn" data-scroll-to="#personalConsultScreen">Start to Invest <span class="btn-icon"></span></button>
        <span class="property-label">{{$property->translate($activeLang)->page_label}}</span>
    </div>
</div>
<!-- end top screen -->

<!-- features screen -->
<div class="page-screen auto-height features-screen">
    <div class="animated-block slide-from-bottom white-bg top-padding">
        <div class="row">
            <div class="col-6 offset-6">
                <div class="content-wraper">
                    <p class="page-screen-heading mb-5">{{$property->translate($activeLang)->page_description}}</p>

                    @if($property->options->count())
                    <div class="pluses-list row mt-2">
                        @foreach($property->options as $propertyOption)
                        <div class="col-6">
                            <div class="plus-item">
                                <div class="plus-item-heading">{{$propertyOption->translate($activeLang)->title}}</div>
                                <div class="plus-item-description">{{$propertyOption->translate($activeLang)->description}}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

            @if($property->features->count())
                @php
                    $index = 1
                @endphp
                @foreach($property->features as $feature)
                    @if($index <= 2)
                        @if($feature->type == 'text')
                        <div class="col-6 pr-0 animated-block slide-from-top feature-slide">
                            <div class="content-wraper red-bg page-block-content top-padding">
                                <p class="page-screen-heading white-heading text-left mb-2">{{$feature->translate($activeLang)->title}}</p>
                                @if($feature->translate($activeLang)->description)
                                <p class="page-block-description font-normal light-weight mt-4 mb-2 text-left">{{$feature->translate($activeLang)->description}}</p>
                                @endif
                            </div>
                        </div>
                        @elseif($feature->type == 'combined')
                        <div class="col-6 pr-0 animated-block slide-from-bottom">
                            <div class="content-wraper page-block-content white-bg">
                                <div class="page-screen-image-container">
                                    <img src="{{$feature->photo()}}" class="page-screen-bg-image" />
                                </div>
                                <div class="pt-2">
                                    <p class="page-screen-heading text-left mb-2 mt-1">{{$feature->translate($activeLang)->text}}</p>
                                    @if($feature->translate($activeLang)->description)
                                    <u class="page-block-description font-normal light-weight mt-4 mb-2 text-left">{{$feature->translate($activeLang)->description}}</u>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @elseif($feature->type == 'photo')
                        <div class="col-6 pr-0 animated-block slide-from-bottom">
                            <div class="page-block-content p-0">
                                <img src="{{$feature->photo()}}" class="page-screen-bg-image" />
                            </div>
                        </div>
                        @elseif($feature->type == 'offer')
                        <div class="col-6 pr-0 animated-block slide-from-bottom">
                            <div class="content-wraper gray-bg page-block-content">
                                <div class="page-block-content top-content pl-0">
                                    <p class="page-block-description text-left font-normal">About Offer</p>
                                </div>
                                <div>
                                    <p class="page-screen-heading text-left mb-2 mt-1">{{$feature->translate($activeLang)->text}}</p>
                                    @if($feature->translate($activeLang)->description)
                                    <p class="page-screen-description text-left mb-2 mt-1">{{$feature->translate($activeLang)->description}}</p>
                                    @endif
                                    @if($feature->list())
                                        <ul class="custom-list">
                                        @foreach($feature->list()->items as $listItem)
                                            <li><img src="/images/ic_arrow_right.svg" class="list-icon"> {{$listItem->translate($activeLang)->title}}</li>
                                        @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endif

                @php
                    $index++
                @endphp
            @endforeach
        @endif


        </div>
    </div>
</div>


@if($property->features->count() > 2)
    @php
        $index = 1
    @endphp
    @foreach($property->features as $feature)
        @if($index > 2)
            <div class="page-screen features-screen">
                <div class="animated-block slide-from-bottom">
                    <div class="row">
                        @if($feature->type == 'text')
                            <div class="col-6 offset-6 pl-0 animated-block slide-from-bottom">
                                <div class="content-wraper red-bg page-block-content top-padding">
                                    <p class="page-screen-heading white-heading text-left mb-2">{{$feature->translate($activeLang)->title}}</p>
                                    @if($feature->translate($activeLang)->description)
                                    <p class="page-block-description font-normal light-weight mt-4 mb-2 text-left">{{$feature->translate($activeLang)->description}}</p>
                                    @endif
                                </div>
                            </div>
                        @elseif($feature->type == 'combined')
                        <div class="col-6 offset-6 pl-0 animated-block slide-from-bottom">
                            <div class="content-wraper page-block-content white-bg">
                                <div class="page-screen-image-container">
                                    <img src="{{$feature->photo()}}" class="page-screen-bg-image" />
                                </div>
                                <div class="pt-2">
                                    <p class="page-screen-heading text-left mb-2 mt-1">{{$feature->translate($activeLang)->text}}</p>
                                    @if($feature->translate($activeLang)->description)
                                    <u class="page-block-description font-normal light-weight mt-4 mb-2 text-left">{{$feature->translate($activeLang)->description}}</u>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @elseif($feature->type == 'photo')
                        <div class="col-6 offset-6 pl-0 animated-block slide-from-bottom">
                            <div class="page-block-content p-0">
                                <img src="{{$feature->photo()}}" class="page-screen-bg-image" />
                            </div>
                        </div>
                        @elseif($feature->type == 'offer')
                        <div class="col-6 offset-6 pl-0 animated-block slide-from-bottom">
                            <div class="content-wraper gray-bg page-block-content">
                                <div class="page-block-content top-content pl-0">
                                    <p class="page-block-description text-left font-normal">About Direction</p>
                                </div>
                                <div>
                                    <p class="page-screen-heading text-left mb-2 mt-1">{{$feature->translate($activeLang)->text}}</p>
                                    @if($feature->translate($activeLang)->description)
                                    <p class="page-screen-description text-left mb-2 mt-1">{{$feature->translate($activeLang)->description}}</p>
                                    @endif
                                    @if($feature->list())
                                        <ul class="custom-list">
                                        @foreach($feature->list()->items as $listItem)
                                            <li><img src="/images/ic_arrow_right.svg" class="list-icon"> {{$listItem->translate($activeLang)->title}}</li>
                                        @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                </div>
            </div>
        </div>
        @endif

        @php
            $index++
        @endphp
    @endforeach
@endif
<!-- end features screen -->

<!-- personal consulatation screen -->
@include('includes.desktop.personal_consult_screen')
<!-- end personal consultation screen -->

<!-- footer -->
@include('includes.desktop.footer')
<!-- end footer -->

@endsection
