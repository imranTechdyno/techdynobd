@extends('backend.layout.master')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ __($pageTitle) }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">{{ __('Dashboard') }}</a>
                </div>
                <div class="breadcrumb-item">{{ __($pageTitle) }}</div>
            </div>
        </div>

        


        <div class="section-body ">

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.sendgroupEmail') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <select class="form-control selectric" name="select">
                                        <option selected disabled>{{ __('Select') }}</option>
                                        <option value="1">{{ __('Subscribers') }}</option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="">{{ __('Subject') }}</label>
                                    <input type="text" class="form-control" placeholder="subject"name="subject">
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Message') }}</label>
                                    <textarea name="message" class="form-control summernote"></textarea>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-primary">{{ __('Send') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </div>
@endsection
@push('script')
    <script>
        $(function() {
            'use strict'
            $('.summernote').summernote();
        })
    </script>
@endpush
