@if($properties)
    @php($i = 1)
    @foreach($properties as $property)
        <div class="col-6 p-1 {{($i % 2 == 0) ? 'p-0' : 'p-0'}}">
            <div class="property-item">
                <img src="{{$property->previewImage()}}" class="property-image" />
                <div class="property-info">
                    <span class="property-location">{{$property->getDirection()->url}}</span>
                    <p class="property-title">{{$property->translate($activeLang)->title}}</p>
                </div>
                <div class="property-description">
                    @if($property->bannerImage())
                    <a href="/property/{{$property->url}}" class="custom-link">More Info<img src="/images/ic_arrow_right_white.svg"></a>
                    @endif
                    <p class="property-heading">
                        {{$property->getDirection()->country($activeLang)}}<br><span class="property-city">({{$property->getDirection()->translate($activeLang)->title}})</span>
                    </p>

                    <div class="row m-0" style="height: calc(100% - 48px);">
                        <div class="col-6 p-1">
                            <p class="property-desc-item">
                                <span class="property-desc-label">Location</span> {{$property->translate($activeLang)->location_full}}
                            </p>
                        </div>

                        <div class="col-6 p-1">
                            @if($property->translate($activeLang)->type)
                            <p class="property-desc-item">
                                <span class="property-desc-label">Type</span>
                                {{$property->translate($activeLang)->type}}
                            </p>
                            @endif
                        </div>

                        <div class="col-6 p-1">
                            @if($property->price)
                            <p class="property-desc-item">
                                <span class="property-desc-label">Price</span> from {{$property->price}}$
                            </p>
                            @endif
                        </div>

                        @if($property->square)
                        <div class="col-6 p-1">
                            <p class="property-desc-item">
                                <span class="property-desc-label">Square</span>
                                {{$property->square}}
                            </p>
                        </div>
                        @endif

                        @if($property->price_per_square)
                        <div class="col-6 p-1">
                            <p class="property-desc-item">
                                <span class="property-desc-label">Price per Square</span>
                                {{$property->price_per_square}}
                            </p>
                        </div>
                        @endif

                        @if($property->translate($activeLang)->completion_date)
                        <div class="col-6 p-1">
                            <p class="property-desc-item">
                                <span class="property-desc-label">Completion date</span> {{$property->translate($activeLang)->completion_date}}
                            </p>
                        </div>
                        @endif


                        @if($property->translate($activeLang)->offer)
                        <div class="col-12 p-1">
                            <p class="property-desc-item red-desc-item">
                                <span class="property-desc-label">Offer</span> {{$property->translate($activeLang)->offer}}
                            </p>
                        </div>
                        @endif

                        @if($property->translate($activeLang)->payment_plan)
                        <div class="col-6 p-1">
                            <p class="property-desc-item">
                                <span class="property-desc-label">Payment plan</span> {{$property->translate($activeLang)->payment_plan}}
                            </p>
                        </div>
                        @endif

                        @if($property->translate($activeLang)->rent_out)
                        <div class="col-6 p-1">
                            <p class="property-desc-item red-desc-item">
                                <span class="property-desc-label">Rent out</span> {{$property->translate($activeLang)->rent_out}}
                            </p>
                        </div>
                        @endif

                        @if($property->translate($activeLang)->buy_out)
                        <div class="col-6 p-1">
                            <p class="property-desc-item">
                                <span class="property-desc-label">Buy out</span> {{$property->translate($activeLang)->buy_out}}
                            </p>
                        </div>
                        @endif

                        @if($property->translate($activeLang)->payback)
                        <div class="col-6 p-1">
                            <p class="property-desc-item">
                                <span class="property-desc-label underlined-label">Payback</span> {{$property->translate($activeLang)->payback}}
                            </p>
                        </div>
                        @endif

                        <div class="col-12 p-1">
                            <p class="property-desc-item last-desc-item">
                                {{$property->forPurposes()}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php($i++)
    @endforeach
@endif
