@extends('layouts.main')

@section('content')
<!-- top screen -->
<div class="page-screen active-screen opened direction-screen">
    <img src="{{$direction['page']['banner_image']}}" class="page-screen-bg-image full-height" />
    <div class="wraper">
        <div class="fixed-block left-block">
            <p class="fixed-block-title white-text">{!!$direction['title']!!}</p>
            <span class="property-label">{{$direction['page']['label']}}</span>
        </div>
        <button class="main-btn black-btn inverted-btn border-0 scroll-to-btn" data-scroll-to="#personalConsultScreen">Start to Invest <span class="btn-icon"></span></button>
    </div>
</div>
<!-- end top screen -->

<!-- pluses screen -->
<div class="page-screen auto-height pluses-screen">
    <div class="animated-block resized-block white-bg pt-4 pb-4">
        <div class="wraper">
            <p class="page-screen-heading">{{$direction['page']['description']}}</p>

            @if(isset($direction['page']['options']))
            <div class="pluses-list mt-5">
                @foreach($direction['page']['options'] as $directionOption)
                <div class="plus-item">
                    <div class="plus-item-heading">{{$directionOption['title']}}</div>
                    <div class="plus-item-description">{{$directionOption['description']}}</div>
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
    <div class="animated-block slide-from-bottom red-bg pt-4 pb-4">
        <div class="wraper">
            <p class="page-screen-heading white-text text-left">{{$direction['page']['features']['feature1']['title']}}</p>

            <p class="page-block-description font-normal light-weight mt-4 mb-2 text-left">{!!$direction['page']['features']['feature1']['description']!!}</p>
        </div>
    </div>
</div>

<div class="page-screen auto-height features-screen">
    <div class="animated-block slide-from-bottom white-bg feature-slide">
        <div class="page-block-content p-0">
            <div>
                <img src="{{$direction['page']['features']['feature2']['image']}}" class="page-screen-bg-image" style="height: 60vh;" />
            </div>
            <div class="wraper pt-2">
                <p class="page-screen-heading text-left mb-2 mt-1 pt-3 pb-3">{{$direction['page']['features']['feature2']['text']}}</p>
                @if(isset($direction['page']['features']['feature2']['description']))
                <u class="page-block-description text-left font-normal mt-1 pb-4 d-block">{!!$direction['page']['features']['feature2']['description']!!}</u>
                @endif

            </div>
        </div>
    </div>
</div>

<div class="page-screen auto-height features-screen">
    <div class="animated-block slide-from-bottom white-bg feature-slide">
        <div class="page-block-content p-0">
            <img src="{{$direction['page']['features']['feature3']['image']}}" class="page-screen-bg-image" />
        </div>
    </div>
</div>

<div class="page-screen auto-height features-screen">
    <div class="animated-block slide-from-bottom gray-bg feature-slide pb-4">
        <div class="wraper page-block-content">
            <div class="page-block-content top-content pl-0 pb-0">
                <p class="page-block-description text-left font-normal pt-4">About Direction</p>
            </div>
            <div>
                <p class="page-screen-heading text-left mb-2 mt-1">{!!$direction['page']['features']['feature4']['text']!!}</p>
                @if(isset($direction['page']['features']['feature4']['description']))
                <p class="page-block-description text-left font-normal">{!!$direction['page']['features']['feature4']['description']!!}</p>
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
</div>

<div class="page-screen auto-height features-screen">
    <div class="animated-block slide-from-bottom white-bg feature-slide">
        <div class="page-block-content p-0">
            <img src="{{$direction['page']['features']['feature5']['image']}}" class="page-screen-bg-image" />
        </div>
    </div>
</div>
<!-- end features screen -->

<!-- personal consulatation screen -->
@include('includes.mobile.personal_consult_screen')
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
