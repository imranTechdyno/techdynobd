@extends('backend.auth.master')

@section('content')
    <section>
        <div class="container">

            <div class="background">
                <div class="shape"></div>
                <div class="shape"></div>
            </div>

            <form action="{{ route('admin.password.change') }}" method="POST" class="login">
                @csrf

                <input type="hidden" name="email" value="{{ $email }}">
                <input type="hidden" name="token" value="{{ $token }}">


                <h3>{{ __('Reset Your Password') }}</h3>
                <div class="form-group">
                    <label>{{ __('New Password') }}</label>
                    <input type="password" name="password" id="password" placeholder="New password">

                </div>
                <div class="form-group">
                    <label>{{ __('Confirm Password') }}</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Confirm password">

                </div>

                <div class="forget"><a href="{{ route('admin.login') }}" class="mt-2">
                        <i class="fas fa-lock mr-1"></i>{{ __('Login Here') }}?
                    </a></div>

                <button class="btn-login" type="submit">{{ __('Reset Password') }}</button>
            </form>
        </div>
    </section>
@endsection
