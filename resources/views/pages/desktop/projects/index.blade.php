@extends('layouts.main')

@section('content')
<p class="text-center pt-3 page-heading">Our projects</p>

<div class="projects-container">
    <div class="project">
        <img src="/images/projects/project_3.jpg">
        <p class="mb-0 title p-2">Project #1 description here...</p>
        <a href="/projects/sunny_villas" class="show-more-btn green-btn">See details</a>
    </div>
    <div class="project">
        <img src="/images/projects/project_1.jpg">
        <p class="mb-0 title p-2">Project #2 description here...</p>
        <a href="/projects/sunny_villas" class="show-more-btn green-btn">See details</a>
    </div>
    <div class="project">
        <img src="/images/projects/project_2.jpg">
        <p class="mb-0 title p-2">Project #3 description here...</p>
        <a href="/projects/sunny_villas" class="show-more-btn green-btn">See details</a>
    </div>
</div>
@endsection
