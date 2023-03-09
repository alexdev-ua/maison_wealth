@extends('layouts.main')

@section('content')
<div class="projects-container pt-5" style="min-height:100vh;">
    <div class="pb-3">
        <p class="text-center mt-5 page-heading"><b>Our projects</b></p>

        <a href="/projects/sunny_village" class="project">
            <img src="/images/projects/sunny_village/sunny_village_1.jpg">
            <p class="mb-0 title p-2 text-center">Sunny Village</p>
        </a>

        <a href="/projects/sunny_apartments" class="project">
            <img src="/images/projects/sunny_apartments/sunny_apartments_1.jpg">
            <p class="mb-0 title p-2 text-center">Sunny Apartments</p>
        </a>
    </div>
</div>
@endsection
