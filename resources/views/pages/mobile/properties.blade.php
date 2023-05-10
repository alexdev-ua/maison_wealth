@extends('layouts.main')

@section('content')
<!-- popular countries screen -->
<div class="page-screen auto-height invest-screen">
    <img src="/images/im_plots_banner.jpg" class="banner-image" />

    <div class="wraper">
        <div class="invest-block row mt-4">
            <div class="col-6">
                <div class="invest-item @if($location == 'dubai')opened @endif">
                    <p class="invest-name">Dubai</p>
                    <div class="invest-description">A leading world-class residential destination...</div>
                    <button class="custom-link details-btn mt-3">Details <img src="/images/ic_arrow_right_white.svg"></button>
                </div>
            </div>
            <div class="col-6">
                <div class="invest-item @if($location == 'miami')opened @endif">
                    <p class="invest-name">Miami</p>
                    <div class="invest-description">A leading world-class residential destination...</div>
                    <button class="custom-link details-btn mt-3">Details <img src="/images/ic_arrow_right_white.svg"></button>
                </div>
            </div>
            <div class="col-6">
                <div class="invest-item @if($location == 'bali')opened @endif">
                    <p class="invest-name">Bali</p>
                    <div class="invest-description">A leading world-class residential destination...</div>
                    <button class="custom-link details-btn mt-3">Details <img src="/images/ic_arrow_right_white.svg"></button>
                </div>
            </div>
            <div class="col-6">
                <div class="invest-item @if($location == 'mexico')opened @endif">
                    <p class="invest-name">Riviera Maya</p>
                    <div class="invest-description">A leading world-class residential destination...</div>
                    <button class="custom-link details-btn mt-3">Details <img src="/images/ic_arrow_right_white.svg"></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end popular countries screen -->

<!-- properties screen -->
<div class="page-screen auto-height properties-screen pt-5">
    <div class="wraper">
        <p class="page-screen-heading">Properties</p>
        <div class="properties-locations text-center">
            <a href="/properties/all" class="custom-btn property-location-btn @if($location == 'all')active @endif" data-location="all">All</a>
            <a href="/properties/dubai" class="custom-btn property-location-btn @if($location == 'dubai')active @endif" data-location="dubai">Dubai</a>
            <a href="/properties/miami" class="custom-btn property-location-btn @if($location == 'miami')active @endif" data-location="miami">Miami</a>
            <a href="/properties/bali" class="custom-btn property-location-btn @if($location == 'bali')active @endif" data-location="bali">Bali</a>
            <a href="/properties/mexico" class="custom-btn property-location-btn @if($location == 'mexico')active @endif" data-location="mexico">Mexico</a>
        </div>
    </div>
    <div class="properties-list row mt-3">
        @if($properties)
            @php($i = 1)
            @foreach($properties as $url=>$property)
                <div class="col-6 pt-2 {{($i % 2 == 0) ? 'pl-1' : 'pr-1'}}">
                    <div class="property-item">
                        <img src="/images/projects/{{$property['image']}}" class="property-image" />
                        <div class="property-info">
                            <span class="property-location">{{$property['location']}}</span>
                            <p class="property-title">{{$property['title']}}</p>
                        </div>
                        <!--<div class="property-description">
                            <hr>
                            <p class="property-heading">
                                {{$property['country']}}<br><span class="property-city">({{$property['city']}})</span>
                            </p>

                            <p class="property-desc-item">
                                <span class="property-desc-label">Location:</span> {{$property['location_full']}}
                            </p>

                            @if(is_array($property['type']))
                                @foreach($property['type'] as $type)
                                <p class="property-desc-item">
                                    <span class="property-desc-label">Type:</span> {{$type}}
                                </p>
                                @endforeach
                            @else
                            <p class="property-desc-item">
                                <span class="property-desc-label">Type:</span> {{$property['type']}}
                            </p>
                            @endif

                            @if(is_array($property['price']))
                                @foreach($property['price'] as $price)
                                <p class="property-desc-item">
                                    <span class="property-desc-label">Price:</span> {{$price}}
                                </p>
                                @endforeach
                            @else
                            <p class="property-desc-item">
                                <span class="property-desc-label">Price:</span> {{$property['price']}}
                            </p>
                            @endif

                            <p class="property-desc-item">
                                {{$property['for']}}
                            </p>

                            <p class="property-desc-item">
                                <span class="property-desc-label">Completion date:</span> {{$property['completion_date']}}
                            </p>

                            @if(isset($property['offer']))
                            <p class="property-desc-item red-desc-item">
                                <span class="property-desc-label">Offer:</span> {{$property['offer']}}
                            </p>
                            @endif

                            @if(isset($property['payment_plan']))
                            <p class="property-desc-item">
                                <span class="property-desc-label">Payment plan:</span> {{$property['payment_plan']}}
                            </p>
                            @endif

                            @if(isset($property['rent_out']))
                            <p class="property-desc-item red-desc-item">
                                <span class="property-desc-label">Rent out:</span> {{$property['rent_out']}}
                            </p>
                            @endif

                            @if(isset($property['buy_out']))
                            <p class="property-desc-item">
                                <span class="property-desc-label">Buy out:</span> {{$property['buy_out']}}
                            </p>
                            @endif

                            @if(isset($property['payback']))
                            <p class="property-desc-item">
                                <span class="property-desc-label underlined-label">Payback:</span> {{$property['payback']}}
                            </p>
                            @endif

                            <a href="/property/{{$url}}" class="custom-link">{{$property['mode'] == 'more' ? 'More Info' : 'To Invest'}} <img src="/images/ic_arrow_right_white.svg"></a>
                        </div>-->
                        <a href="/property/{{$url}}" class="custom-link">{{$property['mode'] == 'more' ? 'More Info' : 'To Invest'}} <img src="/images/ic_arrow_right_white.svg"></a>
                    </div>
                </div>
                @php($i++)
            @endforeach
        @endif
    </div>

    <div class="text-center p-5">
        <button class="custom-link back-to-top-btn">Back to Top <img src="/images/ic_arrow_right_white.svg"></button>
    </div>

</div>
<!-- end properties screen -->

<!-- invest screen -->
@include('includes.mobile.invest_screen')
<!-- end invest screen -->

@endsection
