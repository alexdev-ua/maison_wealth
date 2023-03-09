@extends('layouts.main')

@section('content')
<p class="text-center pt-3 page-heading"><b>Sunny village</b></p>

<div class="projects-container">
    <div class="project project-view">
        <img src="/images/projects/sunny_village/sunny_village_plan.jpg">
    </div>

    @for($i = 1; $i <= 10; $i++)
    <div class="project">
        <img src="/images/projects/sunny_village/sunny_village_4.jpg">
        <p class="mb-0 title p-2 text-center">Villa #{{$i}}</p>
        <a href="{{route('contact-form')}}" class="show-more-btn blue-btn">BUY</a>
    </div>
    @endfor
</div>
@endsection
