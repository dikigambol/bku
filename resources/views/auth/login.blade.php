@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow" id="login-card">

        <div class="card-body" id="login-body">
            <div class="text-center mb-4">
                <h4 style="font-weight: 700;">BKU | Login</h4>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label" style="font-weight: 600;">{{ __('Username') }}</label>

                    <div class="col">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label" style="font-weight: 600;">{{ __('Password') }}</label>

                    <div class="col">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <!-- <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div> -->

                <div class="form-group row mb-0">
                    <div class="col offset-md-4">
                        <button type="submit" class="btn btn-primary btn-block" style="background: #4BB92E; border: 0;">
                            {{ __('LOGIN') }}
                        </button>

                        <!-- @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection