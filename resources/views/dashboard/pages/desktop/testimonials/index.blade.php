@extends('dashboard.layouts.main')

@section('content')
<div class="dash-table" data-model="testimonials">
    <div class="dash-table-heading">
        <div class="dash-table-controls">
            <span class="dash-table-title">Testimonials</span>
            <button class="dash-table-btn dash-btn blue-btn dash-control-btn float-right" data-mode="add">Add testimonial</button>
        </div>

        <div class="dash-table-columns row">
            <div class="dash-table-column col-1 pr-0"><i class="far fa-eye"></i></div>
            <div class="dash-table-column col-7">Text</div>
            <div class="dash-table-column col-2">Author</div>
            <div class="dash-table-column options-column col-2"><i class="far fa-edit"></i></div>
        </div>
    </div>
    <div class="dash-table-body">
        @include('dashboard.includes.desktop.testimonials.list')
    </div>
</div>

@include('dashboard.includes.modals.custom')

@stop
