@extends('backend.auth.master')
@section('content')
<section>
    <div class="container">
        <div class="background">
            <div class="shape"></div>
            <div class="shape"></div>
        </div>

        <form action="{{ route('admin.password.verify.code') }}" method="POST" class="login">
            @csrf
            <h3>{{ __('Check email and verfiy code') }}</h3>

            <div class="form-group mt-5">
                <label>{{ __('Verification Code') }}</label>
                <input type="text" name="code" id="code" placeholder="Enter Verification Code" required>
            </div>

            <div class="d-flex justify-content-between forget mt-2">
                <a href="{{ route('admin.password.reset') }}"><i class="fa fa-paper-plane mr-1"></i>
                    {{ __('Try to send again') }}</a>
                <a href="{{ route('admin.login') }}"><i class="fas fa-lock mr-1"></i>{{ __('Login Here') }}</a>
            </div>


            <div class="mt-5 mb-0">
                <button class="btn-login" type="submit">{{ __('Verify Code') }}</button>
            </div>
        </form>

    </div>
</section>
@endsection

@push('script')
<script src="{{ asset('asset/admin/js/jquery.min.js') }}"></script>

<script>
    (function($) {
            "use strict";
            $('#code').on('input change', function() {
                var xx = document.getElementById('code').value;
                $(this).val(function(index, value) {
                    value = value.substr(0, 7);
                    return value.replace(/\W/gi, '').replace(/(.{3})/g, '$1 ');
                });
            });
        })(jQuery)
</script>
@endpush