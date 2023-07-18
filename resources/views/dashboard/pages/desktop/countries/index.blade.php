@extends('dashboard.layouts.main')

@section('content')
<div class="dash-table" data-model="countries">
    <div class="dash-table-heading">
        <div class="dash-table-controls">
            <span class="dash-table-title">Countries</span>
            <button class="dash-table-btn dash-btn blue-btn dash-control-btn float-right" data-mode="add">Add country</button>
        </div>

        <div class="dash-table-columns row">
            <div class="dash-table-column col-10">Title</div>
            <div class="dash-table-column options-column col-2"><i class="far fa-edit"></i></div>
        </div>
    </div>
    <div class="dash-table-body">
        @include('dashboard.includes.desktop.countries.list')
    </div>
</div>

@include('dashboard.includes.modals.custom')

@stop
