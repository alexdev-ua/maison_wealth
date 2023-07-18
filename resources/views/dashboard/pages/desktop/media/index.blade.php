@extends('dashboard.layouts.main')

@section('content')
<div class="dash-table" data-model="media">
    <div class="dash-table-heading">
        <div class="dash-table-controls">
            <span class="dash-table-title">Gallery</span>
            <button class="dash-table-btn dash-btn blue-btn add-photos-btn float-right">Upload photo</button>
        </div>
    </div>
    <div class="dash-table-body dash-media-container has-preloader row m-0">
        <div class="dash-preloader">
            <img src="/images/ic_preloader.svg" class="dash-preloader-icon" />
        </div>
        @include('dashboard.includes.desktop.media.list')
    </div>
</div>
<form id="uploadPhotoForm" method="POST" action="{{route('dashboard.upload')}}" enctype="multipart/form-data">
</form>
<input type="file" name="photo" accept="image/*" multiple style="display:none" id="uploadPhoto" />

@include('dashboard.includes.modals.custom')

@stop
