@extends('backend.auth.master')
@section('content')
    <section>
        <div class="container">
            <div class="background">
                <div class="shape"></div>
                <div class="shape"></div>
            </div>

            <form action="{{ route('admin.password.reset') }}" method="POST" id="form" class="login">
                @csrf
                <h3>{{ __('Send reset code') }}</h3>

                <div class="form-group mt-5">
                    <label for="username">{{ __('Email') }}</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('Email') }}">

                </div>

                <div class="forget mt-2"><a href="{{ route('admin.login') }}">
                        <i class="fas fa-lock mr-1"></i>{{ __('Login Here') }}?
                    </a></div>

                <div class="text-center mt-3 d-none " id="spin">
                    <div class="spinner-border  text-spin"></div>
                </div>

                <div class="mb-0 mt-4">
                    <button class="btn-login" type="submit" id="login-btn">{{ __('Send Reset Code') }}</button>
                </div>
            </form>


        </div>

    </section>
@endsection

@push('script')
    <script>
        'use strict'
        const spin = document.getElementById("spin");
        const loginBtn = document.getElementById("login-btn");

        loginBtn.addEventListener("click", function() {
            spin.classList.remove("d-none");

            document.getElementById("form").submit();


        });
    </script>
@endpush
