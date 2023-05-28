@extends('backend.layout.master')

@section('content')
    <div class="main-content">
        <section class="section">
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

                <div class="row">

                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form method="post" action="" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">

                                    <input type="hidden" name="section" value="{{ request()->name }}">

                                    <div class="row">

                                        @foreach ($section as $key => $sec)
                                            @if ($sec == 'text')
                                                <div class="form-group col-md-6">

                                                    <label for="">{{ __(frontendFormatter($key)) }}</label>
                                                    <input type="{{ $sec }}" name="{{ $key }}"
                                                        class="form-control">

                                                </div>                                            
                                            @elseif($sec == 'file')
                                                <div class="col-md-12">
                                                    <div class="form-group w-25">
                                                        <label class="col-form-label">{{ __(frontendFormatter($key)) }}
                                                            ({{ @$section['size'] }})</label>

                                                        <div id="image-preview" class="image-preview">
                                                            <label for="image-upload"
                                                                id="image-label">{{ __('Choose File') }}</label>
                                                            <input type="{{ $sec }}" name="{{ $key }}"
                                                                id="image-upload" />
                                                        </div>

                                                    </div>
                                                </div>                                        
                                            @elseif($sec == 'textarea')
                                                <div class="form-group col-md-12">

                                                    <label for="">{{ __(frontendFormatter($key)) }}
                                                        </label>
                                                    <textarea name="{{ $key }}" class="form-control">{{ old($key) }}</textarea>

                                                </div>
                                            @elseif($sec == 'textarea_nic')
                                                <div class="form-group col-md-12">

                                                    <label for="">{{ __(frontendFormatter($key)) }}</label>
                                                    <textarea name="{{ $key }}" class="form-control summernote">{{ old($key) }}</textarea>

                                                </div>
                                            @elseif($sec == 'icon')
                                                <div class="form-group col-md-6">
                                                    <div class="input-group">
                                                        <label for=""
                                                            class="w-100">{{ __(frontendFormatter($key)) }}</label>
                                                        <input type="text" class="form-control icon-value"
                                                            name="{{ $key }}">
                                                        <span class="input-group-append">
                                                            <button class="btn btn-outline-secondary iconpicker"
                                                                data-icon="fas fa-home" role="iconpicker"></button>
                                                        </span>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                        <div class="form-group col-md-12">

                                            <button type="submit"
                                                class="btn btn-primary float-right">{{ __('Create') }}</button>

                                        </div>
                                    </div>
                                </div>

                            </form>

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

            $('.iconpicker').iconpicker({
                align: 'center', // Only in div tag
                arrowClass: 'btn-danger',
                arrowPrevIconClass: 'fas fa-angle-left',
                arrowNextIconClass: 'fas fa-angle-right',
                cols: 10,
                footer: true,
                header: true,
                icon: 'fas fa-bomb',
                iconset: 'fontawesome5',
                labelHeader: '{0} of {1} pages',
                labelFooter: '{0} - {1} of {2} icons',
                placement: 'bottom', // Only in button tag
                rows: 5,
                search: true,
                searchText: 'Search',
                selectedClass: 'btn-success',
                unselectedClass: ''
            });

            $('.iconpicker').on('change', function(e) {
                $('.icon-value').val(e.icon)
            });


            $.uploadPreview({
                input_field: "#image-upload", // Default: .image-upload
                preview_box: "#image-preview", // Default: .image-preview
                label_field: "#image-label", // Default: .image-label
                label_default: "{{ __('Choose File') }}", // Default: Choose File
                label_selected: "{{ __('Upload File') }}", // Default: Change File
                no_label: false, // Default: false
                success_callback: null // Default: null
            });

            
        })
    </script>
@endpush
