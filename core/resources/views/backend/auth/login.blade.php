@extends('backend.auth.master')

@section('content')
    <section>
        <div class="container">

            <div class="background">
                <div class="shape"></div>
                <div class="shape"></div>
            </div>

            <form action="{{ route('admin.login') }}" method="POST" class="login">
                @csrf
                <h3>{{ __('Login To Continue') }}</h3>
                <div class="form-group">
                    <label for="username">{{ __('Email') }}</label>
                    <input type="text" placeholder="Enter email" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input type="password" name="password" placeholder="Password">
                    <div class="forget"><a href="{{ route('admin.password.reset') }}">
                            <i class="fa fa-key mr-1"></i>{{ __('Forgot Password') }}?
                        </a></div>
                </div>


                <button class="btn-login" type="submit">{{ __('Log In') }}</button>
            </form>

        </div>
    </section>
@endsection
