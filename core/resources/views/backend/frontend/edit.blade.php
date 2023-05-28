@extends('backend.layout.master')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __($pageTitle) }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.frontend.section.manage', request()->name) }}">{{ __('Manage ' . @$pageTitle . ' Section') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __($pageTitle) }}</div>
                </div>
            </div>

            <div class="section-body ">
                <div class="row">

                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form method="post" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($section as $key => $sec)
                                            @if ($sec == 'text')
                                                <div class="form-group col-md-12">

                                                    <label for="">{{ __(frontendFormatter($key)) }}</label>
                                                    <input type="{{ $sec }}" name="{{ $key }}"
                                                        class="form-control" value="{{ $element->data->$key }}">

                                                </div>
                                            @elseif($sec == 'link')
                                                <div class="form-group col-md-12">
                                                    <label for="">{{ __(frontendFormatter($key)) }}</label>
                                                    <input type="{{ $sec }}" name="{{ $key }}"
                                                        class="form-control" value="{{ $element->data->$key }}">

                                                </div>
                                                
                                            @elseif($sec == 'file')
                                                <div class="form-group col-md-6 mb-3">
                                                    <label class="col-form-label">{{ __(frontendFormatter($key)) }}
                                                        ({{ @$section['size'] }})</label>

                                                    <div id="image-preview" class="image-preview"
                                                        style="background-image:url({{ $element->data->$key }});">
                                                        <label for="image-upload"
                                                            id="image-label">{{ __('Choose File') }}</label>
                                                        <input type="{{ $sec }}" name="{{ $key }}"
                                                            id="image-upload" />
                                                    </div>

                                                </div>
                                            @elseif($sec == 'thumbnail')
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="col-form-label">{{ __(frontendFormatter($key)) }}
                                                            ({{ @$section['thumbnail_size'] }})</label>
                                                        <div id="image-preview1"
                                                            class="image-preview"style="background-image:url({{ @$element->data->$key }});">
                                                            <label for="image-upload1"
                                                                id="image-label1">{{ __('Choose File') }}</label>
                                                            <input type="file" name="{{ $key }}"
                                                                id="image-upload1" />
                                                        </div>

                                                    </div>
                                                </div>
                                            @elseif($sec == 'textarea')
                                                <div class="form-group col-md-12">
                                                    <label for="">{{ __(frontendFormatter($key)) }}
                                                        </label>
                                                    <textarea name="{{ $key }}" class="form-control">{{ clean($element->data->$key ?? old($key)) }}</textarea>

                                                </div>
                                            @elseif($sec == 'textarea_nic')
                                                <div class="form-group col-md-12">

                                                    <label for="">{{ __(frontendFormatter($key)) }}</label>
                                                    <textarea name="{{ $key }}" class="form-control summernote">{{ clean($element->data->$key ?? old($key)) }}</textarea>

                                                </div>
                                            @elseif($sec == 'icon')
                                                <div class="form-group col-md-6">
                                                    <div class="input-group">
                                                        <label for=""
                                                            class="w-100">{{ __(frontendFormatter($key)) }}</label>
                                                        <input type="text" class="form-control icon-value"
                                                            name="{{ $key }}" value="{{ $element->data->$key }}">
                                                        <span class="input-group-append">
                                                            <button class="btn btn-outline-secondary iconpicker"
                                                                data-icon="fas fa-home" role="iconpicker"></button>
                                                        </span>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>
                                    <div class="form-group float-right w-25 mt-3">
                                        <button type="submit"
                                            class="form-control btn btn-primary">{{ __('Update') }}</button>

                                    </div>
                                </div>

                            </form>

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
            $('.iconpicker').iconpicker();

            $('.iconpicker').on('change', function(e) {
                $('.icon-value').val(e.icon)
            })

            $.uploadPreview({
                input_field: "#image-upload", // Default: .image-upload
                preview_box: "#image-preview", // Default: .image-preview
                label_field: "#image-label", // Default: .image-label
                label_default: "{{ __('Choose File') }}", // Default: Choose File
                label_selected: "{{ __('Upload File') }}", // Default: Change File
                no_label: false, // Default: false
                success_callback: null // Default: null
            });

            $.uploadPreview({
                input_field: "#image-upload1", // Default: .image-upload
                preview_box: "#image-preview1", // Default: .image-preview
                label_field: "#image-label1", // Default: .image-label
                label_default: "{{ __('Choose File') }}", // Default: Choose File
                label_selected: "{{ __('Upload File') }}", // Default: Change File
                no_label: false, // Default: false
                success_callback: null // Default: null
            });
        })
    </script>
@endpush
