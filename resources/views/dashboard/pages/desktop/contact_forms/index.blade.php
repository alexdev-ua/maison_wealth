@extends('dashboard.layouts.main')

@section('content')
<p class="dash-title">Contact forms</p>

@if($contactForms)
  <div class="dash-table" style="height:calc(100vh - 120px - 160px - 70px);">
    <div class="dash-table-heading row ml-0 mr-0 mb-2">
        <div class="dash-table-column col-4 pt-2 pl-0 pr-0">Name</div>
        <div class="dash-table-column col-4 pt-2 pl-0 pr-0">Phone</div>
        <div class="dash-table-column col-4 pt-2 pl-0 pr-0">Email</div>
    </div>
    <div class="dash-table-body">
    @foreach($contactForms as $contact)
      <div class="dash-table-row row ml-0 mr-0 mb-2">
        <div class="dash-table-column col-4 pt-2 pl-0 pr-0">{{$contact->name}}</div>
        <div class="dash-table-column col-4 pt-2 pl-0 pr-0">{{$contact->phone}}</div>
        <div class="dash-table-column col-4 pt-2 pl-0 pr-0">{{$contact->email}}</div>
      </div>
    @endforeach
    </div>
</div>
@endif

@stop
