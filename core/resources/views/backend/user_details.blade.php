@extends('backend.layout.master')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ __(@$pageTitle) }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">{{ __('Dashboard') }}</a>
                </div>
                <div class="breadcrumb-item">{{ __(@$pageTitle) }}</div>
            </div>
        </div>

        <div class="section-body ">
            <div class="row">


                <div class="col-md-12">
                    <div class="p-4">                       
                        <div class="container my-3">
                            @if($user->image)
                            <img src="{{ getFile('user',@$user->image)}}" alt="img" class="img-fluid rounded" width="180px"
                                height="180px">
                            @else
                            <img src="{{ getFile('default',@$general->default_image) }}" alt="img" class="img-fluid rounded"
                                width="180px" height="180px">
                            @endif
                            <h4 class="py-2">{{ @$user->fullname }}</h4>
                            <h4 class="title py-2">{{ @$user->phone }}</h4>
                            <h4 class="title py-2">{{ @$user->email }}</h4>
                            <h4 class="title py-2">{{ @$user->address }}</h4>
                            <a href="javascript:void(0)" class="btn btn-primary sendMail">{{ __('Send Mail To user') }}</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>



<div class="modal fade" tabindex="-1" role="dialog" id="mail">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.user.mail', $user->id) }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Send Mail to user') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">

                        <label for="">{{ __('Subject') }}</label>

                        <input type="text" name="subject" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="">{{ __('Message') }}</label>

                        <textarea name="message" id="" cols="30" rows="10" class="form-control summernote"></textarea>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{ __('Send Mail') }}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection


@push('script')

    <script>
        'use strict'
        $(function() {
            $('.sendMail').on('click', function(e) {
                e.preventDefault();
                const modal = $('#mail');
                modal.modal('show');
            })            
        })
    </script>

@endpush