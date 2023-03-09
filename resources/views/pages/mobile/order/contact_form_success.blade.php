@extends('layouts.main')

@section('content')
<p class="text-center mt-5"><b>Your request was sent!</b></p>
<p class="text-center">
<small>We contact you soon</small>

<a href="{{route('home')}}" class="blue-btn mt-4">Home page</a>
</p>
@endsection
