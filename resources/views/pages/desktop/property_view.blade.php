@extends('layouts.main')

@section('content')
<!-- top screen -->
<div class="page-screen active-screen opened property-screen">
    <img src="{{$property['page']['banner_image']}}" class="page-screen-bg-image" />
    <div class="wraper">
        <div class="fixed-block right-block">
            <p class="fixed-block-title">{{$property['title']}}</p>
        </div>
        <button class="main-btn black-btn inverted-btn border-0 scroll-to-btn" data-scroll-to="#personalConsultScreen">Start to Invest <span class="btn-icon"></span></button>
        <span class="property-label">{{$property['page']['label']}}</span>
    </div>
</div>
<!-- end top screen -->

<!-- features screen -->
<div class="page-screen auto-height features-screen">
    <div class="animated-block slide-from-bottom white-bg top-padding">
        <div class="row">
            <div class="col-6 offset-6">
                <p class="page-screen-heading mb-5">{{$property['page']['description']}}</p>

                @if(isset($property['page']['options']))
                <div class="pluses-list row mt-2">
                    @foreach($property['page']['options'] as $propertyOption)
                    <div class="col-6">
                        <div class="plus-item">
                            <div class="plus-item-heading">{{$propertyOption['title']}}</div>
                            <div class="plus-item-description">{{$propertyOption['description']}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="col-6 pr-0 animated-block slide-from-top feature-slide">
                <div class="content-wraper red-bg page-block-content top-padding">
                    <p class="page-screen-heading white-heading text-left mb-2">{{$property['page']['features']['feature1']['title']}}</p>
                    @if(isset($property['page']['features']['feature1']['description']))
                    <p class="page-block-description font-normal light-weight mt-4 mb-2 text-left">{!!$property['page']['features']['feature1']['description']!!}</p>
                    @endif
                </div>
            </div>
            <div class="col-6 pl-0 animated-block slide-from-bottom">
                <div class="carousel features-carousel white-bg">
                    <div class="carousel-slide feature-slide">
                        <div class="content-wraper page-block-content white-bg">
                            <div class="page-screen-image-container">
                                <img src="{{$property['page']['features']['feature2']['image']}}" class="page-screen-bg-image" />
                            </div>
                            <div class="pt-2">
                                <p class="page-screen-heading text-left mb-2 mt-1">{{$property['page']['features']['feature2']['text']}}</p>
                                @if(isset($property['page']['features']['feature2']['description']))
                                <u class="page-block-description font-normal light-weight mt-4 mb-2 text-left">{!!$property['page']['features']['feature2']['description']!!}</u>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="carousel-slide feature-slide">
                        <div class="page-block-content p-0">
                            <img src="{{$property['page']['features']['feature3']['image']}}" class="page-screen-bg-image" />
                        </div>
                    </div>
                    <div class="carousel-slide feature-slide">
                        <div class="content-wraper gray-bg page-block-content">
                            <div class="page-block-content top-content pl-0">
                                <p class="page-block-description text-left font-normal">About Offer</p>
                            </div>
                            <div>
                                <p class="page-screen-heading text-left mb-2 mt-1">{{$property['page']['features']['feature4']['text']}}</p>
                                @if(isset($property['page']['features']['feature4']['description']))
                                <p class="page-screen-description text-left mb-2 mt-1">{!!$property['page']['features']['feature4']['description']!!}</p>
                                @endif
                                @if(isset($property['page']['features']['feature4']['list']))
                                    <ul class="custom-list">
                                    @foreach($property['page']['features']['feature4']['list'] as $listItem)
                                        <li><img src="/images/ic_arrow_right.svg" class="list-icon"> {{$listItem}}</li>
                                    @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="carousel-slide feature-slide">
                        <div class="page-block-content p-0">
                            <img src="{{$property['page']['features']['feature5']['image']}}" class="page-screen-bg-image" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end features screen -->

<!-- personal consulatation screen -->
@include('includes.desktop.personal_consult_screen')
<!-- end personal consultation screen -->

<!-- footer -->
@include('includes.desktop.footer')
<!-- end footer -->

<script>
    $('.features-carousel').slick({
        dots: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 3000,
        fade: false,
        speed: 1500
    });
</script>

@endsection
