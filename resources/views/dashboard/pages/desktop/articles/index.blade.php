@extends('dashboard.layouts.main')

@section('content')
<div class="dash-table" data-model="articles">
    <div class="dash-table-heading">
        <div class="dash-table-controls">
            <span class="dash-table-title">Blog Articles</span>
            <a href="/dashboard/articles/add" class="dash-table-btn dash-btn blue-btn float-right">Add article</a>
        </div>

        <div class="dash-table-columns row">
            <div class="dash-table-column col-1 pr-0"><i class="far fa-eye"></i></div>
            <div class="dash-table-column col-3">Title</div>
            <div class="dash-table-column col-6">Description</div>
            <div class="dash-table-column options-column col-2"><i class="far fa-edit"></i></div>
        </div>
    </div>
    <div class="dash-table-body">
        @include('dashboard.includes.desktop.articles.list')
    </div>
</div>

@include('dashboard.includes.modals.custom')

@stop
