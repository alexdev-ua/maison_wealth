@extends('dashboard.layouts.main')

@section('content')
<div class="dash-table">
    <div class="row dash-main-block-container m-0">
        <div class="col-7 p-0">
            <div class="dash-main-block properties-main-block half-height">
                @if($dashStats['properties']['image'])
                <img src="{{$dashStats['properties']['image']}}" class="dash-block-image" />
                @endif

                <div class="dash-block-content">
                    <span class="dash-block-count">{{$dashStats['properties']['count']}}</span>
                    <p class="dash-block-title">Properties</p>

                    <div class="text-center">
                        @if(!$dashStats['properties']['count'])
                            <a href="/dashboard/properties/add" class="dash-btn blue-btn mt-3">Create</a>
                        @else
                            <a href="/dashboard/properties" class="dash-btn blue-btn dash-show-all-btn mt-3">See all <i class="fas fa-arrow-right"></i></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row half-height m-0">
                <div class="col-6 p-0">
                    <div class="dash-main-block directions-main-block">
                        @if($dashStats['directions']['image'])
                        <a href="/dashboard/directions">
                            <img src="{{$dashStats['directions']['image']}}" class="dash-block-image" />
                        </a>
                        @endif
                        <div class="dash-block-content">
                            <span class="dash-block-count">{{$dashStats['directions']['count']}}</span>
                            <p class="dash-block-title">Directions</p>

                            <div class="text-center">
                                @if(!$dashStats['directions']['count'])
                                    <a href="/dashboard/directions/add" class="dash-btn blue-btn mt-3">Create</a>
                                @else
                                    <a href="/dashboard/directions" class="dash-btn blue-btn dash-show-all-btn mt-3">See all <i class="fas fa-arrow-right"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 p-0">
                    <div class="dash-main-block articles-main-block">
                        @if($dashStats['articles']['image'])
                        <a href="/dashboard/articles">
                            <img src="{{$dashStats['articles']['image']}}" class="dash-block-image" />
                        </a>
                        @endif
                        <div class="dash-block-content">
                            <span class="dash-block-count">{{$dashStats['articles']['count']}}</span>
                            <p class="dash-block-title">Articles</p>

                            <div class="text-center">
                                @if(!$dashStats['articles']['count'])
                                    <a href="/dashboard/articles/add" class="dash-btn blue-btn mt-3">Create</a>
                                @else
                                    <a href="/dashboard/articles" class="dash-btn blue-btn dash-show-all-btn mt-3">See all <i class="fas fa-arrow-right"></i></a>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5 p-0">
            <div class="dash-main-block dash-main-requests-block">
                <div class="dash-main-block-heading">
                    <span class="dash-block-count">
                        {{count($dashStats['formRequests']['list'])}}
                        @if(isset($dashStats['formRequests']['new']))
                            @if($dashStats['formRequests']['new'])
                                <span class="dash-block-new-label">+ {{$dashStats['formRequests']['new']}} <small>today</small></span>
                            @endif
                        @endif
                    </span>
                    <p class="dash-block-title">Requests</p>
                </div>
                <div class="dash-main-block-content dash-main-requests-content">
                    @if(count($dashStats['formRequests']['list']))
                        @foreach($dashStats['formRequests']['list'] as $formRequest)
                        <div class="dash-request-item @if($formRequest->isNew()) dash-new-request @endif">
                            @if($formRequest->isNew())
                            <span class="dash-request-new">new</span>
                            @endif
                            <div class="dash-request-date">{{$formRequest->date()}}</div>
                            <div class="dash-request-data row">
                                <div class="col-1 pr-0">
                                    @if($formRequest->country_code)
                                    <img src="/images/flags/{{$formRequest->country_code}}.png" />
                                    @endif
                                </div>
                                <div class="col-6">
                                    <span class="dash-request-username mb-1">{{$formRequest->fullname()}}</span>
                                </div>
                                <div class="col-5 pl-0">
                                    <span class="dash-request-phone">
                                        @if($formRequest->has_whatsapp)
                                        <span class="dash-status status-active"><i class="fab fa-whatsapp"></i></span>
                                        @endif
                                        {{$formRequest->phone}}
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                    <div class="dash-empty-block">
                        We don't receive any request yet
                    </div>
                    @endif
                </div>
                @if(count($dashStats['formRequests']['list']))
                <div class="dash-more-btn-block">
                    <a href="/dashboard/requests" class="dash-btn blue-btn d-inline-block">See more <i class="fas fa-chevron-right ml-2"></i></a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@stop
