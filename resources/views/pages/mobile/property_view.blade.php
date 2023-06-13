@extends('layouts.main')

@section('content')
<!-- top screen -->
<div class="page-screen active-screen opened property-screen">
    <img src="{{$property['page']['banner_image']}}" class="page-screen-bg-image" />
    <div class="wraper">
        <div class="fixed-block left-block">
            <p class="fixed-block-title white-text">{{$property['title']}}</p>
            <span class="property-label">{{$property['page']['label']}}</span>
        </div>
        <button class="main-btn black-btn inverted-btn border-0 scroll-to-btn" data-scroll-to="#personalConsultScreen">Start to Invest <span class="btn-icon"></span></button>
    </div>
</div>
<!-- end top screen -->

<!-- pluses screen -->
<div class="page-screen auto-height pluses-screen">
    <div class="animated-block slide-from-bottom white-bg top-padding pb-4">
        <div class="wraper">
            <p class="page-screen-heading">{{$property['page']['description']}}</p>

            @if(isset($property['page']['options']))
            <div class="pluses-list mt-5">
                @foreach($property['page']['options'] as $propertyOption)
                <div class="plus-item">
                    <div class="plus-item-heading">{{$propertyOption['title']}}</div>
                    <div class="plus-item-description">{{$propertyOption['description']}}</div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
<!-- end pluses screen -->

<!-- features screen -->
<div class="page-screen auto-height features-screen">
    <div class="animated-block slide-from-bottom red-bg pb-4">
        <div class="wraper">
            <p class="page-screen-heading white-text top-padding text-left">{{$property['page']['features']['feature1']['title']}}</p>

            <p class="page-block-description font-normal light-weight mt-4 mb-2 text-left">{!!$property['page']['features']['feature1']['description']!!}</p>
        </div>
    </div>
</div>

<div class="page-screen auto-height features-screen">
    <div class="animated-block slide-from-bottom white-bg feature-slide">
        <div class="page-block-content p-0">
            <div>
                <img src="{{$property['page']['features']['feature2']['image']}}" class="page-screen-bg-image" style="height: 60vh;" />
            </div>
            <div class="wraper pt-2">
                <p class="page-screen-heading text-left mb-2 mt-1">{{$property['page']['features']['feature2']['text']}}</p>
                @if(isset($property['page']['features']['feature2']['description']))
                <u class="page-block-description text-left font-normal mt-1">{!!$property['page']['features']['feature2']['description']!!}</u>
                @endif

            </div>
        </div>
    </div>
</div>

<div class="page-screen auto-height features-screen">
    <div class="animated-block slide-from-bottom white-bg feature-slide">
        <div class="page-block-content p-0">
            <img src="{{$property['page']['features']['feature3']['image']}}" class="page-screen-bg-image" />
        </div>
    </div>
</div>

<div class="page-screen auto-height features-screen">
    <div class="animated-block slide-from-bottom gray-bg feature-slide pb-4">
        <div class="wraper page-block-content">
            <div class="page-block-content top-content pl-0">
                <p class="page-block-description text-left font-normal top-padding">About Offer</p>
            </div>
            <div>
                <p class="page-screen-heading text-left mb-2 mt-1">{{$property['page']['features']['feature4']['text']}}</p>
                @if(isset($property['page']['features']['feature4']['description']))
                <p class="page-block-description text-left font-normal">{!!$property['page']['features']['feature4']['description']!!}</p>
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
</div>

<div class="page-screen auto-height features-screen">
    <div class="animated-block slide-from-bottom white-bg feature-slide">
        <div class="page-block-content p-0">
            <img src="{{$property['page']['features']['feature5']['image']}}" class="page-screen-bg-image" />
        </div>
    </div>
</div>
<!-- end features screen -->

<!-- personal consulatation screen -->
<div class="page-screen auto-height personal-consultation-screen" id="personalConsultScreen">
    <div class="animated-block slide-from-bottom gray-bg top-padding pb-4">
        <div class="wraper">
            <p class="page-screen-heading"><span class="gray-text">Start investing</span> correctly, without unnecessary risks and with the greatest benefit, <span class="gray-text">think it over and we will be there for you.</span></p>
        </div>

        <div class="form-container">
            <div class="form-heading black-heading pl-4 pr-4 pt-5 pb-5">Get a personal expert<br>consultation</div>
            <div class="form-content pl-4 pr-4 pt-3 pb-5">
                <form class="custom-form">
                    <div class="form-group mt-4">
                        <span class="custom-label">First Name</span>
                        <input type="text" name="firstName" class="custom-input" />
                    </div>
                    <div class="form-group mt-4">
                        <span class="custom-label">Last Name</span>
                        <input type="text" name="lastName" class="custom-input" />
                    </div>
                    <div class="form-group mt-4">
                        <span class="custom-label">Phone Number</span>
                        <input type="text" name="phone" class="custom-input" />
                    </div>
                    <div class="form-group mt-4">
                        <input type="checkbox" name="haveWhatsapp" class="custom-input mr-2" /><span class="custom-label">I have a WhatsApp account registered to this phone number</span>
                    </div>

                    <div class="mt-5 pt-4 text-center">
                        <button class="main-btn black-btn inverted-btn">Send <span class="btn-icon"></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- end personal consultation screen -->

<!-- footer -->
@include('includes.mobile.footer')
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
        fade: true,
        speed: 1500
    });
</script>

@endsection
