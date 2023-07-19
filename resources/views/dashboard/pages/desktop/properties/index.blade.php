@extends('dashboard.layouts.main')

@section('content')
<div class="dash-table" data-model="properties">
    <div class="dash-table-heading dash-fixed-heading">
        <div class="dash-table-controls">
            <span class="dash-table-title">Properties</span>
            <a href="/dashboard/properties/add" class="dash-table-btn dash-btn blue-btn float-right">Add property</a>
        </div>

        <div class="dash-table-columns row">
            <div class="dash-table-column col-1 pr-0"><i class="far fa-eye"></i></div>
            <div class="dash-table-column col-1 pr-0"><i class="fas fa-home"></i></div>
            <div class="dash-table-column col-3">Title</div>
            <div class="dash-table-column col-2">Direction</div>
            <div class="dash-table-column col-4">For
                <div class="row">
                    <div class="col-3"><small>living</small></div>
                    <div class="col-3"><small>resale</small></div>
                    <div class="col-3"><small>long rent</small></div>
                    <div class="col-3"><small>daily rent</small></div>
                </div>
            </div>
            <div class="dash-table-column options-column col-1"><i class="far fa-edit"></i></div>
        </div>
    </div>
    <div class="dash-table-body">
        @include('dashboard.includes.desktop.properties.list')
    </div>
</div>

@include('dashboard.includes.modals.custom')

@stop
