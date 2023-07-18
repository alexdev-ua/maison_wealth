@extends('dashboard.layouts.main')

@section('content')

<div class="modal dash-modal dash-login-modal with-bg">
    <div class="dash-login-header">
        <img src="/images/ic_company_name.svg" class="dash-login-logo" />
        <p class="dash-login-text text-right">Dashboard</p>
    </div>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title"><span class="modal-title-label">Sign In</span></div>
            </div>
            <div class="modal-body">
                <div class="dash-form-container">
                    <form class="dash-form" method="POST" action="{{ route('dashboard.login.submit') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input id="email" type="email" class="form-control dash-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="form-group mt-3">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control dash-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-4 text-center">
                            <button type="submit" class="dash-btn blue-btn dash-large-btn">
                                Log In
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
