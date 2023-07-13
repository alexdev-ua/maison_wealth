<div class="col-12">
    <hr>
</div>
@if($properties)
    @foreach($properties as $url=>$property)
        <div class="col-4 p-3">
            <div class="property-item @if($partial){{'hidden-property'}}@endif">
                <img src="{{$property['image']}}" class="property-image" />
                <div class="property-info">
                    <span class="property-location">{{$property['location']}}</span>
                    <p class="property-title">{{$property['title']}}</p>
                    <span class="d-inline"><img src="/images/ic_arrow_right.svg" class="link-icon" /></span>
                </div>
                <div class="property-description">
                    @if(isset($property['page']))
                    <a href="/property/{{$url}}" class="custom-link">More Info<img src="/images/ic_arrow_right_white.svg"></a>
                    @endif
                    <p class="property-heading">
                        {{$property['country']}}<br><span class="property-city">{{$property['city']}}</span>
                    </p>

                    <div class="row m-0" style="height: calc(100% - 68px);">
                        <div class="col-6 p-1">
                            <p class="property-desc-item">
                                <span class="property-desc-label">Location</span> {{$property['location_full']}}
                            </p>
                        </div>

                        <div class="col-6 p-1">
                            @if(is_array($property['type']))
                                <p class="property-desc-item">
                                    <span class="property-desc-label">Type</span>
                                    @foreach($property['type'] as $type)
                                    {{$type}}
                                    @endforeach
                                </p>
                            @else
                            <p class="property-desc-item">
                                <span class="property-desc-label">Type</span> {{$property['type']}}
                            </p>
                            @endif
                        </div>

                        <div class="col-6 p-1">
                            @if(is_array($property['price']))
                                <p class="property-desc-item">
                                    <span class="property-desc-label">Price</span>
                                    @foreach($property['price'] as $price)
                                    {{$price}}
                                    @endforeach
                                </p>
                            @else
                            <p class="property-desc-item">
                                <span class="property-desc-label">Price</span> {{$property['price']}}
                            </p>
                            @endif
                        </div>

                        @if($property['square'])
                        <div class="col-6 p-1">
                            <p class="property-desc-item">
                                <span class="property-desc-label">Square</span>
                                {{$property['square']}}
                            </p>
                        </div>
                        @endif

                        @if($property['price_per_square'])
                        <div class="col-6 p-1">
                            <p class="property-desc-item">
                                <span class="property-desc-label">Price per Square</span>
                                {{$property['price_per_square']}}
                            </p>
                        </div>
                        @endif

                        <div class="col-6 p-1">
                            <p class="property-desc-item">
                                <span class="property-desc-label">Completion date</span> {{$property['completion_date']}}
                            </p>
                        </div>


                        @if(isset($property['offer']))
                        <div class="col-6 p-1">
                            <p class="property-desc-item red-desc-item">
                                <span class="property-desc-label">Offer</span> {{$property['offer']}}
                            </p>
                        </div>
                        @endif

                        @if(isset($property['payment_plan']))
                        <div class="col-6 p-1">
                            <p class="property-desc-item">
                                <span class="property-desc-label">Payment plan</span> {{$property['payment_plan']}}
                            </p>
                        </div>
                        @endif

                        @if(isset($property['rent_out']))
                        <div class="col-6 p-1">
                            <p class="property-desc-item red-desc-item">
                                <span class="property-desc-label">Rent out</span> {{$property['rent_out']}}
                            </p>
                        </div>
                        @endif

                        @if(isset($property['buy_out']))
                        <div class="col-6 p-1">
                            <p class="property-desc-item">
                                <span class="property-desc-label">Buy out</span> {{$property['buy_out']}}
                            </p>
                        </div>
                        @endif

                        @if(isset($property['payback']))
                        <div class="col-6 p-1">
                            <p class="property-desc-item">
                                <span class="property-desc-label underlined-label">Payback</span> {{$property['payback']}}
                            </p>
                        </div>
                        @endif

                        <div class="col-12 p-1">
                            <p class="property-desc-item last-desc-item">
                                {{$property['for']}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
<h4 class="col-12 text-center pt-5 pb-5">Properties by price {{$investPrice}}$ not found</h4>
@endif
<hr class="col-12">
