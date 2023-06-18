@extends('layouts.main')

@section('content')
<!-- top screen -->
<div class="page-screen active-screen opened direction-screen">
    <img src="{{$direction['page']['banner_image']}}" class="page-screen-bg-image" />
    <div class="wraper">
        <div class="fixed-block right-block">
            <p class="fixed-block-title">{!!$direction['title']!!}</p>
        </div>
        <button class="main-btn black-btn inverted-btn border-0 scroll-to-btn" data-scroll-to="#personalConsultScreen">Start to Invest <span class="btn-icon"></span></button>
        <span class="direction-label">{{$direction['page']['label']}}</span>
    </div>
</div>
<!-- end top screen -->

<!-- features screen -->
<div class="page-screen auto-height features-screen">
    <div class="animated-block slide-from-bottom white-bg top-padding">
        <div class="row">
            <div class="col-6 offset-6">
                <p class="page-screen-heading mb-5">{{$direction['page']['description']}}</p>

                @if(isset($direction['page']['options']))
                <div class="pluses-list row mt-2">
                    @foreach($direction['page']['options'] as $directionOption)
                    <div class="col-6">
                        <div class="plus-item">
                            <div class="plus-item-heading">{{$directionOption['title']}}</div>
                            <div class="plus-item-description">{{$directionOption['description']}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="col-6 pr-0 animated-block slide-from-top feature-slide">
                <div class="content-wraper red-bg page-block-content top-padding">
                    <p class="page-screen-heading white-heading text-left mb-2">{{$direction['page']['features']['feature1']['title']}}</p>
                    @if(isset($direction['page']['features']['feature1']['description']))
                    <p class="page-block-description font-normal light-weight mt-4 mb-2 text-left">{!!$direction['page']['features']['feature1']['description']!!}</p>
                    @endif
                </div>
            </div>
            <div class="col-6 pl-0 animated-block slide-from-bottom">
                <div class="carousel features-carousel white-bg">
                    <div class="carousel-slide feature-slide">
                        <div class="content-wraper page-block-content white-bg">
                            <div class="page-screen-image-container">
                                <img src="{{$direction['page']['features']['feature2']['image']}}" class="page-screen-bg-image" />
                            </div>
                            <div class="pt-2">
                                <p class="page-screen-heading text-left mb-2 mt-1">{{$direction['page']['features']['feature2']['text']}}</p>
                                @if(isset($direction['page']['features']['feature2']['description']))
                                <u class="page-block-description font-normal light-weight mt-4 mb-2 text-left">{!!$direction['page']['features']['feature2']['description']!!}</u>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="carousel-slide feature-slide">
                        <div class="page-block-content p-0">
                            <img src="{{$direction['page']['features']['feature3']['image']}}" class="page-screen-bg-image" />
                        </div>
                    </div>
                    <div class="carousel-slide feature-slide">
                        <div class="content-wraper gray-bg page-block-content">
                            <div class="page-block-content top-content pl-0">
                                <p class="page-block-description text-left font-normal">About Direction</p>
                            </div>
                            <div>
                                <p class="page-screen-heading text-left mb-2 mt-1">{!!$direction['page']['features']['feature4']['text']!!}</p>
                                @if(isset($direction['page']['features']['feature4']['description']))
                                <p class="page-screen-description text-left mb-2 mt-1">{!!$direction['page']['features']['feature4']['description']!!}</p>
                                @endif
                                @if(isset($direction['page']['features']['feature4']['list']))
                                    <ul class="custom-list">
                                    @foreach($direction['page']['features']['feature4']['list'] as $listItem)
                                        <li><img src="/images/ic_arrow_right.svg" class="list-icon"> {{$listItem}}</li>
                                    @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="carousel-slide feature-slide">
                        <div class="page-block-content p-0">
                            <img src="{{$direction['page']['features']['feature5']['image']}}" class="page-screen-bg-image" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end features screen -->

<!-- personal consulatation screen -->
<div class="page-screen gray-bg personal-consultation-screen" id="personalConsultScreen">
    <div class="row">
        <div class="col-6 animated-block slide-from-bottom">
            <div class="page-block-content gray-bg top-padding">
                <p class="page-screen-heading mb-2"><span class="gray-text">Start investing</span> correctly, without unnecessary risks and with the greatest benefit, <span class="gray-text">think it over and we will be there for you.</span></p>
            </div>
        </div>
        <div class="col-6 pl-0 animated-block slide-from-top white-bg">
            <div class="form-container">
                <div class="form-heading black-heading top-padding">Get a personal expert<br>consultation</div>
                <div class="form-content">
                    <form class="custom-form">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <span class="custom-label">First Name</span>
                                    <input type="text" name="firstName" class="custom-input" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <span class="custom-label">Last Name</span>
                                    <input type="text" name="lastName" class="custom-input" />
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="form-group">
                                    <span class="custom-label">Phone Number</span>
                                    <input type="text" name="phone" class="custom-input" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="checkbox" name="haveWhatsapp" class="custom-input mr-2" /><span class="custom-label">I have a WhatsApp account registered to this phone number</span>
                                </div>
                            </div>
                            <div class="col-3 mt-4 pt-2">
                                <button class="main-btn black-btn inverted-btn">Send <span class="btn-icon"></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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
