@extends('dashboard.layouts.main')

@section('content')
    <div class="dash-table" data-model="articles">
        @include('dashboard.includes.forms.articles.create_update')
    </div>

    @include('dashboard.includes.modals.custom')

    @include('dashboard.includes.modals.select_photo')

    @include('dashboard.includes.modals.list')
@stop
