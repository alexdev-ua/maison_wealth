@extends('dashboard.layouts.main')

@section('content')
<div class="dash-table" data-model="requests">
    <div class="dash-table-heading">
        <div class="dash-table-controls">
            <span class="dash-table-title">Form Requests</span>
        </div>

        <div class="dash-table-columns row">
            <div class="dash-table-column col-1">#</div>
            <div class="dash-table-column col-2">Date</div>
            <div class="dash-table-column col-2">Name</div>
            <div class="dash-table-column col-3">Email</div>
            <div class="dash-table-column col-2">Phone</div>
            <div class="dash-table-column col-1"><i class="fab fa-whatsapp"></i></div>
            <div class="dash-table-column options-column col-1"><i class="far fa-edit"></i></div>
        </div>
    </div>
    <div class="dash-table-body">
        @include('dashboard.includes.desktop.requests.list')
    </div>
</div>

@include('dashboard.includes.modals.custom')

@stop
