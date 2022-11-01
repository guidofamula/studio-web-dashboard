@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label class="small mb-1" for="input_login_email">Email</label>
            <input name="email" class="form-control py-4 @error('email') is-invalid @enderror" id="input_login_email"
                type="email name="email" value="{{ old('email') }}" required autofocus" placeholder="Enter email address"
                autocomplete="email" />
            <!-- todo: show message validation (email) -->
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="small mb-1" for="input_login_password">Password</label>
            <input name="password" class="form-control py-4 @error('password') is-invalid @enderror"
                id="input_login_password" type="password" name="password" required placeholder="Enter password"
                autocomplete="current-password" />
            <!-- todo: show message validation (password) -->
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="row mb-3">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
            @if (Route::has('password.request'))
                <a class="small" href="{{ route('password.request') }}">
                    {{ __('Forgot Password?') }}
                </a>
            @endif
            <button class="btn btn-primary px-4" type="submit">Login</button>
        </div>
    </form>
@endsection
