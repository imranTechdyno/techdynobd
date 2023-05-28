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

                @if (isset($section['content']))
                    <div class="row">

                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <form method="post" action="" enctype="multipart/form-data">
                                    @csrf

                                    <div class="card-body custom-height">
                                        <div class="row">

                                            @foreach ($section['content'] as $key => $sec)
                                                @if ($sec == 'text')
                                                    <div class="form-group col-md-6">

                                                        <label for="">{{ __(frontendFormatter($key)) }}</label>
                                                        <input type="{{ $sec }}" name="{{ $key }}"
                                                            value="{{ $content !== null ? $content->data->$key : '' }}"
                                                            class="form-control" required>
                                                    </div>

                                                    
                                                
                                                @elseif($sec == 'file')
                                                    <div class="form-group col-md-4 mb-3">
                                                        <label class="col-form-label">{{ __(frontendFormatter($key)) }}
                                                            ({{ @$section['content']['size'] }})
                                                        </label>

                                                        <div id="image-preview" class="image-preview"
                                                            style="background-image:url({{ @$content->data->$key }});">
                                                            <label for="image-upload"
                                                                id="image-label">{{ __('Choose File') }}</label>
                                                            <input type="{{ $sec }}" name="{{ $key }}"
                                                                id="image-upload" />
                                                        </div>

                                                    </div>
                                                
                                                @elseif($sec == 'textarea')
                                                    <div class="form-group col-md-12">

                                                        <label for="">{{ __(frontendFormatter($key)) }} ({{ @$section['content']['max'] }})</label>
                                                        <textarea name="{{ $key }}" class="form-control">{{ $content !== null ? $content->data->$key : '' }}</textarea>

                                                    </div>
                                                @elseif($sec == 'textarea_nic')
                                                    <div class="form-group col-md-12">

                                                        <label for="">{{ __(frontendFormatter($key)) }}</label>
                                                        <textarea name="{{ $key }}" class="form-control summernote">{{ $content !== null ? $content->data->$key : '' }}</textarea>

                                                    </div>
                                                @elseif($sec == 'icon')
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="My house">
                                                        <span class="input-group-append">
                                                            <button class="btn btn-outline-secondary"
                                                                data-icon="fas fa-home" role="iconpicker"></button>
                                                        </span>
                                                    </div>
                                                @endif
                                            @endforeach

                                            <div class="form-group col-md-12">

                                                <button type="submit"
                                                    class="btn btn-primary float-right">{{ __('Update') }}</button>

                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>


                    </div>
                @endif

                @if (isset($section['element']))
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4> <a href="{{ route('admin.frontend.element', request()->name) }}"
                                            class="btn btn-icon icon-left btn-primary add-page"> <i class="fa fa-plus"></i>
                                            {{ __('Add Elements') }}</a></h4>
                                    <div class="card-header-form">
                                        <form method="GET"
                                            action="{{ route('admin.frontend.element.search', request()->name) }}">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search"
                                                    name="search">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                <div class="card-body p-0 custom-height">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr class="text-center">
                                                <th>{{ __('Sl') }}.</th>
                                                @php
                                                    $keys = [];
                                                @endphp

                                                @foreach ($section['element'] as $key => $sec)
                                                    @if ($sec == 'file' || $sec == 'text' || $sec == 'icon')
                                                        <th>{{ __(frontendFormatter($key)) }}</th>
                                                    @endif
                                                    @php
                                                        array_push($keys, $key);
                                                    @endphp
                                                @endforeach
                                                <th>{{ __('Action') }}</th>
                                            </tr>

                                            @forelse($elements as $element)
                                                <tr class="text-center">
                                                    <td>{{ $loop->iteration }}</td>
                                                    @foreach ($keys as $key)
                                                        @if ($key == 'size' ||$key == 'unique' )
                                                            @continue
                                                        @endif
                                                        @if ($key=='heading_icon'||$key=='percentage'||$key == 'video_cloud_link'|| $key=='social_icon'|| $key=='question' ||$key=='social_link' || $key == 'title' || $key=='name' || $key=='designation' || $key=='header' ||$key == 'button_link')
                                                            <td>{{ @$element->data->$key }}</td>
                                                        @endif

                                                        @if ($key == 'image')
                                                            <td><img src="{{ $element->data->$key }}" alt=""
                                                                    class="rounded p-2 image-fluid" width="100px">
                                                            </td>
                                                        @endif
                                                    @endforeach


                                                    <td>
                                                        <a href="{{ route('admin.frontend.element.edit', ['name' => request()->name, 'element' => $element]) }}"
                                                            class="btn btn-primary"><i class="fa fa-pen"></i></a>

                                                        <button class="btn btn-danger delete-btn-e"
                                                            data-url="{{ route('admin.frontend.element.delete', [request()->name, $element]) }}"><i
                                                                class="fa fa-trash"></i></button>

                                                    </td>

                                                </tr>

                                            @empty

                                                <tr>

                                                    <td class="text-center" colspan="100%">{{ __('No Data Found') }}</td>

                                                </tr>
                                            @endforelse

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>

    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal-e">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Delete Element') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf

                        <p>{{ __('Are You Sure To Delete Element') }}?</p>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary mr-3"
                                data-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-danger">{{ __('Delete Page') }}</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>



@endsection


@push('script')
    <script>
        $(function() {
            'use strict'
            $('.summernote').summernote();

            $('.delete-btn-e').on('click', function() {
                const modal = $('#deleteModal-e');

                modal.find('form').attr('action', $(this).data('url'))
                modal.modal('show')
            })

            $.uploadPreview({
                input_field: "#image-upload",
                preview_box: "#image-preview",
                label_field: "#image-label",
                label_default: "{{ __('Choose File') }}",
                label_selected: "{{ __('Upload File') }}",
                no_label: false,
                success_callback: null
            });
        })
    </script>
@endpush
