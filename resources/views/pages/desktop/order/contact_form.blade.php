@extends('layouts.main')

@section('content')
<form class="contact-form p-5" method="post" action="{{route('contact-form.save')}}">
    @csrf
    <p class="text-center"><b>Contact form</b></p>
    <p>
        <small>Leave your contacts and we contact with you as soon as possible</small>
    </p>
    <label>Name*</label>
    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name')}}">
    @error('name')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror

    <label class="mt-3">Phone*</label>
    <input class="form-control @error('phone') is-invalid @enderror" type="phone" name="phone" value="{{old('phone')}}">
    @error('phone')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror

    <label class="mt-3">Email</label>
    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{old('email')}}">

    <p class="mt-3"><small>* required fields</small></p>

    <button class="blue-btn mt-4">Send</button>
</form>
@endsection
