@extends('dashboard.layouts.main')

@section('content')
<div class="dash-table" data-model="directions">
    <div class="dash-table-heading">
        <div class="dash-table-controls">
            <span class="dash-table-title">Directions</span>
            <a href="/dashboard/directions/add" class="dash-table-btn dash-btn blue-btn float-right" data-mode="add">Add direction</a>
        </div>

        <div class="dash-table-columns row">
            <div class="dash-table-column col-1 pr-0"><i class="far fa-eye"></i></div>
            <div class="dash-table-column col-5">Title</div>
            <div class="dash-table-column col-4">Country</div>
            <div class="dash-table-column options-column col-2"><i class="far fa-edit"></i></div>
        </div>
    </div>
    <div class="dash-table-body">
        @include('dashboard.includes.desktop.directions.list')
    </div>
</div>

@include('dashboard.includes.modals.custom')

@stop
