@extends('dashboard.layouts.main')

@section('content')
<div class="dash-table" data-model="pages">
    <div class="dash-table-heading dash-fixed-heading">
        <div class="dash-table-controls">
            <span class="dash-table-title">Pages&SEO</span>
        </div>

        <div class="dash-table-columns row">
            <div class="dash-table-column col-3">Key</div>
            <div class="dash-table-column col-6">Description</div>
            <div class="dash-table-column col-1">META</div>
            <div class="dash-table-column options-column col-2"><i class="far fa-edit"></i></div>
        </div>
    </div>
    <div class="dash-table-body">
        @include('dashboard.includes.desktop.pages.list')
    </div>
</div>

@include('dashboard.includes.modals.custom')

@stop
