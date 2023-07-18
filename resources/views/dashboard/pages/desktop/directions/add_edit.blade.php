@extends('dashboard.layouts.main')

@section('content')
    <div class="dash-table" data-model="directions">
        @include('dashboard.includes.forms.directions.create_update')
    </div>

    @include('dashboard.includes.modals.custom')

    @include('dashboard.includes.modals.select_photo')

    @include('dashboard.includes.modals.list')
@stop
